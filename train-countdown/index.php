<?php

const MIN_INPUT = 1;
const MAX_INPUT = 9;

// Validate input
function getValidatedInput(): int 
{
    while (true) {
        $input = readline("Enter a number between 1 and 9: ");
        if (isValidInput($input)) {
            return (int) $input;
        }
        echo "Invalid input! Use numbers between 1 and 9.\n";
    }
}

function isValidInput(mixed $input): bool 
{
    return is_numeric($input) 
        && (int) $input >= MIN_INPUT 
        && (int) $input <= MAX_INPUT;
}


echo "Train brakes failed! Reach exactly 67 in 10 tries to activate the emergency brake!\n";
function activateEmergencyBrake(int $maxInputs, int $limit): void
{
    $currentInput = 0;
    $sum = 0;

    while ($currentInput < $maxInputs) {
        $input = getValidatedInput();
        $sum += $input;
        $currentInput++;
        
        if ($sum < $limit && $currentInput < $maxInputs) {
            echo "The sum is: " . $sum . " and is your " . $currentInput . " try.\n";
        } elseif ($sum === $limit) {
            echo "You've saved your life, the train is stopping!!.\n";
            break;
        } else {
            echo "Catastrophic failure! Brake is not responding!\n";
            break;
        }
    }
}

activateEmergencyBrake(10, 67);