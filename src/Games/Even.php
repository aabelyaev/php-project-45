<?php

namespace BrainGames\Games\Even;

use function BrainGames\Launch\run;
use function cli\line;
use function cli\prompt;

function play()
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    $getAnswer = function () {
        $number = rand(1, 100);
        $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';

        return [$number, $correctAnswer];
    };

    run($description, $getAnswer);
}
