<?php

function getDigitsArray(int $num): array
{
    $digits = [];
    $tempNum = $num;

    while ($tempNum > 0) {
        $digits[] = $tempNum % 10; // Get the last digit, with 153 would be: 3, 5, 1.
        $tempNum = floor($tempNum / 10); // Remove the last digit from $tempNum, with 153 would be: 15, 1.
    }

    return array_reverse($digits);
}

function calculateArmstrong(int $num): string
{
    $digits = getDigitsArray($num);
    // print_r($digits); // Uncomment this line to see the array of digits.
    $armstrong = 0;

    foreach ($digits as $digit) {
        $pow = pow($digit, count($digits));
        echo "The power of " . $digit . " multiplied by " . count($digits) . " is: " . $pow . "\n";
        $armstrong += $pow;
    }
    echo "The sum of the powers is: " . $armstrong . "\n";
    if ($armstrong === $num) {
        return "The number " . $num . " is an Armstrong number.\n\n";
    } else {
        return "The number " . $num . " is not an Armstrong number.\n\n";
    }
}

echo (calculateArmstrong(153));
echo (calculateArmstrong(204));
