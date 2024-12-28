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

function sumPowersOfDigits(array $digits): int
{
    $sum = 0;
    $power = count($digits);

    foreach ($digits as $digit) {
        $pow = pow($digit, $power);
        echo "The power of " . $digit . " multiplied by " . count($digits) . " is: " . $pow . "\n";
        $sum += $pow;
    }
    echo "The sum of the powers is: " . $sum . "\n";
    return $sum;
}

function calculateArmstrong(int $num): string
{
    if ($num <= 0) {
        return "Please provide a positive number.\n";
    }
    $digits = getDigitsArray($num);
    // print_r($digits); // Uncomment this line to see the array of digits.
    $sum = sumPowersOfDigits($digits);
  
    return sprintf(
        "The number %d %s an Armstrong number.\n\n",
        $num,
        ($sum === $num) ? "is" : "is not"
    );
}

echo (calculateArmstrong(153));
echo (calculateArmstrong(204));
