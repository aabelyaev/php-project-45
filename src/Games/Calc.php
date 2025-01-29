<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Launch\run;
use function cli\line;
use function cli\prompt;

function play()
{
    $description = 'What is the result of the expression?';

    $result = function () {
        $operations = ['+', '-', '*'];
        $x = rand(1, 20);
        $y = rand(1, 20);
        $operationId = rand(0, count($operations) - 1);
        switch ($operations[$operationId]) {
            case '+':
                $output = $x + $y;
                break;
            case '-':
                $output = $x - $y;
                break;
            case '*':
                $output = $x * $y;
                break;
        }
        $expression = "{$x} {$operations[$operationId]} {$y}";
        $answer = (int)prompt("Question: $expression");
        line("You answer: {$answer}");
        $correctAnswer = eval("return $output;");

        return [$answer, $correctAnswer];
    };

    run($description, $result);
}    