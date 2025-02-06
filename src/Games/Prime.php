<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Launch\run;
use function cli\line;
use function cli\prompt;

const MIN_NUM = 1;
const MAX_NUM = 100;

function play()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $round = function () {
        $number = rand(MIN_NUM, MAX_NUM);

        $answer = prompt("Question: {$number}");
        line("You answer: {$answer}");
        $correctAnswer = (isPrime($number)) ? 'yes' : 'no';

        return [$answer, $correctAnswer];
    };

    run($description, $round);
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
