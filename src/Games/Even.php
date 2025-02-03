<?php

namespace BrainGames\Games\Even;

use function BrainGames\Launch\run;
use function cli\line;
use function cli\prompt;


function play()
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
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

    run($description, $result);
}
