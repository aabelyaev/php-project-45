<?php

namespace BrainGames\Launch;

use function cli\line;
use function cli\prompt;


const ROUNDS = 3;

function run(string $gameDescription, callable $round): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello {$name}");
    line($gameDescription);

    for ($i = 0; $i < ROUNDS; $i++) {
        [$answer, $correctAnswer] = $round();

        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }

    line("Congratulations, {$name}!");
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