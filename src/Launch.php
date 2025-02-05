<?php

namespace BrainGames\Launch;

use function cli\line;
use function cli\prompt;

function run(string $gameDescription, callable $game)
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line($gameDescription);

    $rounds = 3;
    for ($i = 0; $i < $rounds; $i++) {
        [$answer, $correctAnswer] = $game();
        if ($answer != $correctAnswer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
        line('Correct!');
    }
    line("Congratulations, {$name}!");
}
