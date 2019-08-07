<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;

function run()
{
    $regulations = "What is the result of the expression?";
    $getTask = function () {
        $min = 1;
        $max = 100;
        $first = rand($min, $max);
        $second = rand($min, $max);
        [$sign, $correctAnswer] = getAnswer(rand(0, 2), $first, $second);
        $quest = "{$first} {$sign} {$second}";
        return [$quest, $correctAnswer];
    };
    startGame($regulations, $getTask);
}

function getAnswer($flag, $first, $second)
{
    switch ($flag) {
        case 0:
            $sign = '+';
            $answer = $first + $second;
            break;
        case 1:
            $sign = '-';
            $answer = $first - $second;
            break;
        case 2:
            $sign = '*';
            $answer = $first * $second;
            break;
    }
    return [$sign, $answer];
}
