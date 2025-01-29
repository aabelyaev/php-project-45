<?php

namespace BrainGames\Prime;

use function BrainGames\Launch\run;
use function cli\line;
use function cli\prompt;

function play()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $result = function() {
        $min = 1;
        $max = 100;

        $number = rand($min, $max);
        $answer = (string)prompt('Question:' . $number);
        line("You answer: {$answer}");
        if (isPrime($number)) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
        return [$answer, $correctAnswer];
    };
    run($description, $result);
}

function isPrime(int $number)
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