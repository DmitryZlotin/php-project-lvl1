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
    if ($first == 1 || $second == 1) {
        return 1;
    }
    for ($i = 2; $i <= $first / $i && $i <= $second / $i; $i++) {
        if ($first % $i == 0 && $second % $i == 0) {
            return $i * getDivisor($first / $i, $second / $i);
        }
    }
    return 1;
}
