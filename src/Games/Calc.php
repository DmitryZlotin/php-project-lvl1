<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;

const MIN = 1;
const MAX = 100;

function run()
{
    $description = 'What is the result of the expression?';
    $getGameAttributs = function () {
        $first = rand(MIN, MAX);
        $second = rand(MIN, MAX);
        switch (rand(0, 2)) {
            case 0:
                $sign = '+';
                $correctAnswer = $first + $second;
                break;
            case 1:
                $sign = '-';
                $correctAnswer = $first - $second;
                break;
            case 2:
                $sign = '*';
                $correctAnswer = $first * $second;
        }
        $question = "{$first} {$sign} {$second}";
        return [$question, $correctAnswer];
    };
    game($description, $getGameAttributs);
}
