<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Launch\run;
use function cli\line;
use function cli\prompt;

function play()
{
    $description = 'Find the greatest common divisor of given numbers.';
    $getAnswer = function () {
        $x = rand(1, 20);
        $y = rand(1, 20);

        return [prompt("Question: $x $y?"), gcd($x, $y)];
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
