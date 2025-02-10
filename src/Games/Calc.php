<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Launch\run;

function play()
{
    $description = 'What is the result of the expression?';

    $getAnswer = function () {
        $operations = ['+', '-', '*'];
        $x = rand(1, 20);
        $y = rand(1, 20);
        $operationId = rand(0, count($operations) - 1);
        $question = "{$x} {$operations[$operationId]} {$y}";
        $answer = strval(getGameAnswer($x, $y, $operations[$operationId]));
        return [
            'question' => $question,
            'answer'   => $answer,
        ];
    };

    run($description, $getAnswer);
}

function getGameAnswer(int $x, int $y, string $operationId)
{
    switch ($operationId) {
        case "+":
            return $x + $y;
        case "-":
            return $x - $y;
        case "*":
            return $x * $y;
        default:
            return false;
    }
}
