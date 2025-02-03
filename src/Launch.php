<?php

namespace BrainGames\Launch;

use function cli\line;
use function cli\prompt;


function run(string $gameDescription, $round)
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello {$name}");
    line($gameDescription);

    $circle = [];
    for ($i = 0; $i < $circle; $i++) {
        [$answer, $correctAnswer] = $round();
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
        }
    }
    line('Correct!');
}
//Весь вывод и логика в случае правильного и неправильного ответа повторяют предыдущие шаги.Либо через цикл while 
// function run(string $gameDescription, $round) {
//     line("Welcome to the Brain Games!");
//     $name = prompt("May I have your name?");
//     line("Hello {$name}");
//     line($gameDescription);

//     while (true) { 
//         [$answer, $correctAnswer] = $round();
//         if ($answer == $correctAnswer) {
//             line('Correct!');
//         } else {
//             line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
//             line("Let's try again, {$name}!");
//         }
//     }
// }