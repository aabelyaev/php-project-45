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
        switch ($operations[$operationId]) {
            case '+':
                $output = $x + $y;
            case '-':
                $output = $x - $y;
                break;
            case '*':
                $output = $x * $y;
            default:
                break;
        }
        $expression = "{$x} {$operations[$operationId]} {$y}";
        echo "Question: $expression\n";
        $answer = (int)readline();

        return [$answer, $output];
    };

    run($description, $getAnswer);
}
