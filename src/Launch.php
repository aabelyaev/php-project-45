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
        ['question' => $question, 'answer' => $answer] = $buildRound();
        line('Question: %s', $question);
        $correctAnswer = prompt('Your answer');

        if ($answer !== $correctAnswer) {
            line("'{$correctAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.");
            line("Let's try again, {$name}!");
            return;
        }
        line('Correct!');
    }
    line("Congratulations, {$name}!");
}
