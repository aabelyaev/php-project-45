<?php

namespace BrainGames\Games\Even;

use function BrainGames\Launch\run;

function play()
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    $getAnswer = function () {
        $question = rand(1, 100);
        $number = $question;
        $answer = $number % 2 == 0 ? 'yes' : 'no';
        return [
            'question' => $question,
            'answer'   => $answer,
        ];
    };

    run($description, $getAnswer);
}
