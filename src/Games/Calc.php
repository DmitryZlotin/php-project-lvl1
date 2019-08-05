<?php

namespace BrainGames\Games\Calc;

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
    [$sign, $correctAnswer] = getAnswer(rand(0, 2), $first, $second);
    $quest = "{$first} {$sign} {$second}";
    return [$quest, $correctAnswer];
}

function getRegulations()
{
    return "What is the result of the expression?";
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
