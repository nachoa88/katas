<?php

$limit = 67;
$sum = 0;
$maxInputs = 10;
$currentInput = 0;
echo "You are in a train and the brakes are not working, you have enter reach 67 in 10 tries to make the train stop.\n";
// input to enter a number between 1 and 9
while ($currentInput < $maxInputs) {
    $input = readline("Enter a number between 1 and 9: ");
    $sum += $input;
    $currentInput++;

    switch ($sum) {
        case $sum < $limit:
            echo "The sum is: " . $sum . " and is your " . $currentInput . " try.\n";
            break;
        case $limit:
            echo "You've saved your life, the train brakes!!.\n";
            break 2;
        default:
            echo "The brake is not working!! Say goodbye to this world!!.\n";
            break 2;
    }
}
