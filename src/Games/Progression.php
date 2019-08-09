<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;

const MIN =1;
const MAX = 9;
const LENGHT_PROGRESSION = 10;
function run()
{
    $description = 'Whath number is missing in the progression?';
    $getGameAttributs = function () {
        $multiplier = rand(MIN, MAX);
        $prog = getProgression($multiplier);
        $answerIndex = rand($min, $max);
        $correctAnswer = $prog[$answerIndex];
        $prog[$answerIndex] = '..';
        $quest = implode(' ', $prog);
        return [$question, $correctAnswer];
    };
    game($description, $getGameAttributs);
}

function getProgression($multiplier)
{
    $result = [];
    for ($i = 0; $i < LENGHT_PROGRESSION; $i++) {
        $result[] = $i * $multiplier;
    }
    return $result;
}
