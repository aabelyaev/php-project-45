<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Launch\run;

function play()
{
    $description = 'What number is missing in the progression?';
    $getAnswer = function () {
        $minLength = 5;
        $maxLength = 10;
        $minStep = 1;
        $maxStep = 3;
        $minStart = 0;
        $maxStart = 20;

        $length = rand($minLength, $maxLength);
        $step = rand($minStep, $maxStep);
        $start = rand($minStart, $maxStart);

        $progression = getProgression($length, $step, $start);

        $numId = rand(0, $length - 1);
        $hiddenNum = $progression[$numId];
        $progression[$numId] = '..';
        $answer = strval($hiddenNum);
        $question = implode(' ', $progression);

        return [
            'question' => $question,
            'answer'   => $answer,
        ];
    };

    run($description, $getAnswer);
}

function getProgression(int $lenghth, int $step, int $start)
{
    $result = [$start];

    for ($i = 1; $i < $lenghth; $i++) {
        $result[$i] = $result[$i - 1] + $step;
    }

    return $result;
}
