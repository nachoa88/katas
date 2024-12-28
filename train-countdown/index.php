<?php

const MIN_INPUT = 1;
const MAX_INPUT = 9;
const COUNTDOWN_SECONDS = 30;

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
    echo "Reach exactly " . $limit . " in " . $maxTries . " tries!\n";
    $triesLeft = $maxTries;
    $sum = 0;
    $endTime = time() + COUNTDOWN_SECONDS;

    while ($triesLeft > 0) {
        $timeLeft = $endTime - time();
        if ($timeLeft <= 0) {
            echo "Time's up! Train crashed!\n";
            break;
        }
        echo "Time remaining: {$timeLeft} seconds\n";
        $input = getValidatedInput();
        $sum += $input;
        $triesLeft--;

        if ($sum < $limit && $triesLeft > 0) {
            if ($showPartialSum) {
                echo "Partial sum is: " . $sum . ". ";
            }
            echo "You've got " . $triesLeft . " try/tries left.\n";
        } elseif ($sum === $limit && $showPartialSum) {
            echo "Nice job! But now you have another task.\n";
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

echo "Train brakes are failing! Activate the emergency brake!\n";
activateEmergencyBrake(10, 67, true);
