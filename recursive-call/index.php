<?php

$intput1 = 5;
$intput2 = 3;

// Recursive function that prints numbers from the input to 0.
function printNumbers(int $input): void
{
    if ($input > 0) {
        echo $input . ",";
        printNumbers($input - 1);
    } else {
        // PHP_EOL is a constant that represents the end of line character "/n".
        echo $input . PHP_EOL;
    }
}

printNumbers($intput1);
printNumbers($intput2);


// Recursive function that prints factorial of a number.
function calculateFactorial(int $input): int
{
    if ($input > 0) {
        $newInput = $input - 1;
        $factorial = $input * calculateFactorial($newInput);
        return $factorial;
    } else {
        // The factorial of 0 is 1.
        return 1;
    }
}

echo "El factorial de {$intput1} es: " . calculateFactorial($intput1) . PHP_EOL;
echo "El factorial de {$intput2} es: " . calculateFactorial($intput2) . PHP_EOL;

/*

Bonus track:

Per últim, mostra la serie de Fibonacci d'un nombre donat.
*/