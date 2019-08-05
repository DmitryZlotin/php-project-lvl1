<?php

namespace BrainGames\Games\Prime;

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
    $quest = rand($min, $max);
    $correctAnswer = checkPrime($quest) ? 'yes' : 'no';
    return [$quest, $correctAnswer];
}

function getRegulations()
{
    return "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
}

function checkPrime($number)
{
    for ($i = 2; $i < $number / $i; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
