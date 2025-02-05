<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Launch\run;
use function cli\line;
use function cli\prompt;

function play()
{
    $description = 'What is the result of the expression?';

    $getAnswer = function (): array {
        $operations = ['+', '-', '*'];
        $rand_key = array_rand($operations, 1);
        $x = rand(1, 20);
        $y = rand(1, 20);
        $operationId = $operations[$rand_key];
        $expression = "$x $operationId $y";
        $correctAnswer = 0;
        switch ($operationId) {
            case '+':
                $correctAnswer = $x + $y;
                break;
            case '-':
                $correctAnswer = $x - $y;
                break;
            case '*':
                $correctAnswer = $x * $y;
                break;
        }
        return [$expression, $correctAnswer];
    };

    run($description, $getAnswer);
}
