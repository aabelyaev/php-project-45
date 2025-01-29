<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Launch\run;
use function cli\line;
use function cli\prompt;

function play()
{
    $description = 'Find the greatest common divisor of given numbers.';
    $result = function() {
        $x = rand(1, 20);
        $y = rand(1, 20);

        $expression = "{$x} and {$y}";
        $answer = (int)prompt("Question: What is the greatest common divisor of $expression?");
        line('You answer: {$answer}');
        $correctAnswer = gcd($x, $y);

        return [$answer, $correctAnswer];
    };
    run ($description, $result);
}

function gcd(int $a, int $b)
{
    if ($b == 0) {
        return abs($a);
    }
    return gcd($b, abs($a) % $b);
}