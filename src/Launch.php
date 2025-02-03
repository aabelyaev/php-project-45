<?php

namespace BrainGames\Launch;

use function cli\line;
use function cli\prompt;


const ROUNDS = [];

function run(string $description, callable $game)
{
    $playerName = prompt('May I have your name?');
    line(PHP_EOL . 'Hello, %s! ' . PHP_EOL, $playerName);
    line($description . PHP_EOL);

    for ($i = 1; $i <= ROUNDS; $i += 1) {
        ['question' => $question, 'answer'   => $gameAnswer] = $game();
        line('Question: %s', $question);
        $playerAnswer = prompt('Your answer');

        if ($gameAnswer !== $playerAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'." . PHP_EOL, $playerAnswer, $gameAnswer);
            line("Let's try again, %s!" . PHP_EOL, $playerName);
        }
        line('Correct!');
    }
}