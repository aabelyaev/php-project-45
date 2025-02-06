<?php

namespace BrainGames\Launch;

use function cli\line;
use function cli\prompt;

function run(string $gameDescription, callable $buildRound): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line($gameDescription);

    $roundsCount = 3;
    for ($i = 0; $i < $roundsCount; $i++) {
        [$answer, $correctAnswer] = $buildRound();
        if ($answer != $correctAnswer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
        line('Correct!');
    }
    line("Congratulations, {$name}!");
}
