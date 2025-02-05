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
        line($answer == $correctAnswer ? 'Correct!' : "'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'. Let's try again, {$name}!");
    }

    line("Congratulations, {$name}!");
}
