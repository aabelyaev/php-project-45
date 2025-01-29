<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;


function run(string $gameDescription, $round)
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello {$name}");
    line($gameDescription);

    $circle = 3;
    for ($i = 0; $i < $circle; $i++) {
        [$answer, $correctAnswer] = $round();
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }

    line("Congratulations, {$name}!");
}