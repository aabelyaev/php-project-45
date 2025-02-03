<?php

namespace BrainGames\Launch;

use function cli\line;
use function cli\prompt;


function run(string $gameDescription, $round) {
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello {$name}");
    line($gameDescription);

    while (true) { 
        [$answer, $correctAnswer] = $round();
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
        }
    }
}