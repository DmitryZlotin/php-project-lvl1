<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;

function run()
{
    $regulations = "Whath number is missing in the progression?";
    $getTask = function () {
        $min = 1;
        $max = 9;
        $multiplier = rand($min, $max);
        $prog = getProgression($multiplier);
        $answerIndex = rand($min, $max);
        $correctAnswer = $prog[$answerIndex];
        $prog[$answerIndex] = '..';
        $quest = implode(' ', $prog);
        return [$quest, $correctAnswer];
    };
    startGame($regulations, $getTask);
}

function getProgression($multiplier)
{
    $result = [];
    for ($i = 0; $i < 10; $i++) {
        $result[] = $i * $multiplier;
    }
    return $result;
}
