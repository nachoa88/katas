<?php

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

printNumbers(5);
printNumbers(3);


/*

Bonus track:

Fes també una funció recursiva que calculi i retorni el factorial d'un nombre donat.
Per últim, mostra la serie de Fibonacci d'un nombre donat.
*/