<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;

function run()
{
    $regulations = "Find the greatest common divisor of given numbers";
    $getTask = function () {
        $min = 1;
        $max = 100;
        $first = rand($min, $max);
        $second = rand($min, $max);
        $quest = "{$first} {$second}";
        $correctAnswer = getDivisor($first, $second);
        return [$quest, $correctAnswer];
    };
    startGame($regulations, $getTask);
}

function getDivisor($first, $second)
{
    $result = 0;
    for ($i = 1; $i < $first && $i < $second; $i++) {
        if ($first % $i == 0 && $second % $i == 0) {
            $result = $i;
        }
    }
    return $result;
}
