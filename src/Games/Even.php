<?php

namespace BrainGames\Games\Even;

use BrainGames\Engine;

function run($gamesCount)
{
    $name = Engine\startGame(getRegulations());
    $flag = true;
    for (; $gamesCount && $flag; $gamesCount--) {
        [$task, $correctAnswer] = getTask();
        $answer = Engine\getPlayerAnswer($task);
        if (!checkAnswer($answer, $correctAnswer)) {
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
    $correctAnswer = $quest % 2 ? 'no' : 'yes';
    return [$quest, $correctAnswer];
}

function getRegulations()
{
    return "Answer \"yes\" if number even otherwise answer \"no\".";
}

function checkAnswer($answer, $correctAnswer)
{
    return $answer === $correctAnswer;
}
