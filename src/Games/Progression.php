<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Launch\run;
use function cli\line;
use function cli\prompt;

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
        $number = implode(' ', $progression);

        $answer = (int)prompt("Question: {$number}");
        line('You answer: {$answer}');

        return[$answer, $hiddenNum];
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
