<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Launch\run;

const MIN_NUM = 1;
const MAX_NUM = 100;

function play()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $getAnswer = function () {
        $question = rand(MIN_NUM, MAX_NUM);
        $answer = (isPrime($question)) ? 'yes' : 'no';
        return [
            'question' => $question,
            'answer'   => $answer,
        ];
    };

    run($description, $getAnswer);
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
