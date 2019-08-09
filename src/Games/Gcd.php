<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\game;

const MIN = 1;
const MAX = 100;
const DESCRIPTION = 'Find the greatest common divisor of given numbers';

function run()
{
    $getGameAttributs = function () {
        $first = rand(MIN, MAX);
        $second = rand(MIN, MAX);
        $question = "{$first} {$second}";
        $correctAnswer = getDivisor($first, $second);
        return [$question, $correctAnswer];
    };
    game(DESCRIPTION, $getGameAttributs);
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
