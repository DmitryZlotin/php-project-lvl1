<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;

const MIN = 1;
const MAX = 100;

function run()
{
    $description = 'Find the greatest common divisor of given numbers';
    $getGameAttributs = function () {
        $first = rand(MIN, MIA);
        $second = rand(MIN, MAX);
        $question = "{$first} {$second}";
        $correctAnswer = getDivisor($first, $second);
        return [$question, $correctAnswer];
    };
    game($description, $getGameAttributs);
}

function getDivisor($first, $second)
{
    for ($i = 1; $i < $first && $i < $second; $i++) {
        if ($first % $i == 0 && $second % $i == 0) {
            $result = $i;
        }
    }
    return $result;
}
