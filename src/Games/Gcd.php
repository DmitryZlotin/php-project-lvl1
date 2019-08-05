<?php

namespace BrainGames\Games\Gcd;

use BrainGames\Engine;

function run($gamesCount)
{
    $name = Engine\startGame(getRegulations());
    $flag = true;
    for (; $gamesCount && $flag; $gamesCount--) {
        [$task, $correctAnswer] = getTask();
        $answer = Engine\getPlayerAnswer($task);
        if ($answer != $correctAnswer) {
            Engine\endGame($answer, $correctAnswer, $name);
            $flag = false;
        } else {
            Engine\correct();
        }
    }
    if ($flag) {
        Engine\endGame($name);
    }
}

function getTask()
{
    $min = 1;
    $max = 100;
    $first = rand($min, $max);
    $second = rand($min, $max);
    $quest = "{$first} {$second}";
    $correctAnswer = getDivisor($first, $second);
    return [$quest, $correctAnswer];
}

function getRegulations()
{
    return "Find the greatest common divisor of given numbers";
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
