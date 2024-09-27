<?php

$input1 = 5;
$input2 = 3;

// Recursive function that prints numbers from the input to 0.
function countDown(int $input): void
{
    if ($input > 0) {
        echo $input . ",";
        countDown($input - 1);
    } else {
        // PHP_EOL is a constant that represents the end of line character "/n".
        echo $input . PHP_EOL;
    }
}

countDown($input1);
countDown($input2);


// Recursive function that prints factorial of a number.
function getFactorial(int $input): int
{
    if ($input > 0) {
        $newInput = $input - 1;
        $factorial = $input * getFactorial($newInput);
        return $factorial;
    } else {
        // The factorial of 0 is 1.
        return 1;
    }
}

echo "El factorial de {$input1} es: " . getFactorial($input1) . PHP_EOL;
echo "El factorial de {$input2} es: " . getFactorial($input2) . PHP_EOL;

// Recursive function that prints Fibonacci series until the given number.
// function fibonacci(int $input): int
// {
//     if ($input <= 1) {
//         return fibonacci($input - 1) + fibonacci($input - 2);

//     } else {
//         return $input;
//     }
// }


// echo "La serie de Fibonacci hasta el elemento Nº{$input1} es: " . fibonacci($input1) . PHP_EOL;
// echo "La serie de Fibonacci hasta el elemento Nº{$input2} es: " . PHP_EOL;

/*

Bonus track:

Per últim, mostra la serie de Fibonacci d'un nombre donat.
*/