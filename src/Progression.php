<?php

namespace BrainGames\Progression;

use function BrainGames\Launch\run;
use function cli\line;
use function cli\prompt;

function play()
{
    $description = 'What number is missing in the progression?';
    $result = function() {
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

        $numId = rand(0, $length -1);
        $hiddenNum = $progression[$numId];
        $progression[$numId] = '..';
        $progressionString = implode(' ', $progression);

        $answer = (int)prompt("Question: {$progressionString}");
        line('You answer: {$answer}');

        return[$answer, $hiddenNum];
    };

    run($description, $result);
}

function getProgression(int $lenghth, int $step, int $start = 0)
{
    $result = [$start];

    for ($i = 1; $i < $lenghth; $i++) {
        $result[$i] = $result[$i - 1] + $step;
    }

    return $result;
}