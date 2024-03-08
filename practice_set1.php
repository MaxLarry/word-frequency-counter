<?php

/**
 * Calculates the total price of items in a shopping cart.
 *
 * @param array $items is an array of items with 'name' and 'price' keys.
 *
 * @return float the total price of items.
 */
function calculateTotal_Price(array $items): float {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'];
    }
    return $total;
}

/**
 * Performs a series of string manipulations.
 *
 * @param string $inputString The input string to be manipulated.
 *
 * @return string The modified string after removing the spaces and converting all the letters into lowercase.
 */   
function manipulateString(string $inputString): string {
    $string = str_replace(' ', '', $inputString);
    $string = strtolower($string);

    return $string;
}

/**
 * Checks if a number is even or odd.
 *
 * @param int $number The input number to be checked.
 *
 * @return string The result message indicating whether the number is even or odd hehe.
 */
function checkEvenOrOdd(int $number): string {
    if ($number % 2 === 0) {
        return "The number $number is even.";
    } else {
        return "The number $number is odd.";
    }
}


// Calculates the total price of items in a shopping cart.
$items = [
 ['name' => 'Widget A', 'price' => 10],
 ['name' => 'Widget B', 'price' => 15],
 ['name' => 'Widget C', 'price' => 20],
];

$total = calculateTotal_Price($items);
echo "Total price: $" . $total;
    
     
// Perform a series of string manipulations
$string = "This is a poorly written program with little structure and readability.";
$modified_string = manipulateString($string);
echo "\nModified string: " . $modified_string;


// Check if a number is even or odd
$number = 42;
$resultMessage = checkEvenOrOdd($number);
echo "\n". $resultMessage;

?>