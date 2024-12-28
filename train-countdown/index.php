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

function activateEmergencyBrake(int $maxTries, int $limit, bool $showPartialSum): void
{
    $triesLeft = $maxTries;
    $sum = 0;

    while ($triesLeft > 0) {
        $input = getValidatedInput();
        $sum += $input;
        $triesLeft--;

        if ($sum < $limit && $triesLeft > 0) {
            if ($showPartialSum) {
                echo "Partial sum is: " . $sum . ".\n";
            }
            echo "You've got " . $triesLeft . " try/tries left.\n";
        } elseif ($sum === $limit && $showPartialSum) {
            echo "Nice job! But now you have to reach 81 in order to stop the train.\n";
            activateEmergencyBrake(10, 81, false);
            break;
        } elseif ($sum === $limit && !$showPartialSum) {
            echo "You've saved your life, the train is stopping!!.\n";
            break;
        } else {
            echo "Catastrophic failure! Brake is not responding!\n";
            break;
        }
    }
}

echo "Train brakes are failing! Reach exactly 67 in 10 tries to activate the emergency brake!\n";
activateEmergencyBrake(10, 67, true);
