<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Frequency Counter</title>
</head>
<body>
    <h2>Word Frequency Counter</h2>
    <form action="index.php" method="post">
        <label for="text">Paste your text here:</label><br>
        <textarea id="text" name="text" rows="10" cols="50"></textarea><br>
        <label for="sort_order">Sort by frequency:</label>
        <select id="sort_order" name="sort_order">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select><br>
        <label for="display_limit">Number of words to display:</label>
        <input type="number" id="display_limit" name="display_limit" min="1" value="10"><br><br>
        <input type="submit" value="Calculate Word Frequency">
    </form>
    <hr>

    <?php
    function tokenizeText($text) {
        // Tokenize the text into words
        return preg_split('/[\s,.-]+/', $text, -1, PREG_SPLIT_NO_EMPTY);
    }

    function calculateWordFrequency($words) {
        // Define common stop words
        $stopWords = array("the", "and", "in", "of", "to", "a", "is", "it");

        // Remove stop words and count word frequency
        $wordFrequency = array_count_values(array_diff($words, $stopWords));

        // Sort the word frequency array by value (word count)
        arsort($wordFrequency);

        return $wordFrequency;
    }

    function displayWordFrequency($wordFrequency, $sortOrder, $displayLimit) {
        // Display word frequency based on sort order and display limit
        echo "<p>Total number of unique words: " . count($wordFrequency) . "</p>";
        echo "<table>";
        echo "<tr><th>Word</th><th>Frequency</th></tr>";
        $counter = 0;
        foreach ($wordFrequency as $word => $frequency) {
            if ($counter >= $displayLimit) break;
            echo "<tr><td>$word</td><td>$frequency</td></tr>";
            $counter++;
        }
        echo "</table>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST["text"];
        $sortOrder = $_POST["sort_order"];
        $displayLimit = (int)$_POST["display_limit"];

        // Tokenize the text
        $words = tokenizeText($text);

        // Calculate word frequency
        $wordFrequency = calculateWordFrequency($words);

        // Sort word frequency based on user's choice
        if ($sortOrder == "desc") {
            arsort($wordFrequency);
        } else {
            asort($wordFrequency);
        }

        // Display word frequency
        displayWordFrequency($wordFrequency, $sortOrder, $displayLimit);
    }
    ?>
</body>
</html>
