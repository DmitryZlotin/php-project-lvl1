<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;

const MIN_STEP =1;
const MAX_STEP = 9;
const LENGHT_PROGRESSION = 10;
function run()
{
    $description = 'Whath number is missing in the progression?';
    $getGameAttributs = function () {
        $multiplier = rand(MIN_STEP, MAX_STEP);
        $prog = getProgression($multiplier);
        $answerIndex = rand(0, LENGHT_PROGRESSION - 1);
        $correctAnswer = $prog[$answerIndex];
        $prog[$answerIndex] = '..';
        $question = implode(' ', $prog);
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
