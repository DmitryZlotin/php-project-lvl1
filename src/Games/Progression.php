<?php

namespace BrainGames\Games\Progression;

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
    $max = 9;
    $multiplier = rand($min, $max);
    $prog = getProgression($multiplier);
    $answerIndex = rand($min, $max);
    $correctAnswer = $prog[$answerIndex];
    $prog[$answerIndex] = '..';
    $quest = implode(' ', $prog);
    return [$quest, $correctAnswer];
}

function getRegulations()
{
    return "Whath number is missing in the progression?";
}

function getProgression($multiplier)
{
    $result = [];
    for ($i = 0; $i < 10; $i++) {
        $result[] = $i * $multiplier;
    }
    return $result;
}
