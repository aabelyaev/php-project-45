<?php

namespace BrainGames\Games\Even;

use function BrainGames\Launch\run;
use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function play()
{
    $result = function () {
        $number = rand(1, 100);
        $answer = prompt("Question: {$number}");
        line("You answer: {$answer}");
        switch ($number % 2) {
            case 0:
                $correctAnswer = 'yes';
                break;
                default:
                $correctAnswer = 'no';
        }
        return [$answer, $correctAnswer];
    };

    run(DESCRIPTION, $result);
}
