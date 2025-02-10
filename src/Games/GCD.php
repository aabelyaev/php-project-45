<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Launch\run;

function play()
{
    $description = 'Find the greatest common divisor of given numbers.';
    $getAnswer = function () {
        $x = rand(1, 20);
        $y = rand(1, 20);

        $question = "{$x} {$y}";
        $answer = strval(gcd($x, $y));
        return [
            'question' => $question,
            'answer'   => $answer,
        ];
    };

    run($description, $getAnswer);
}

function gcd(int $a, int $b)
{
    if ($b == 0) {
        return abs($a);
    }
    return gcd($b, abs($a) % $b);
}
