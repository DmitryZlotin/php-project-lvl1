<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\game;

const MIN_STEP = 1;
const MAX_STEP = 9;
const MIN_START = 0;
const MAX_START = 100;
const PROGRESSION_LENGHT = 10;
const DESCRIPTION = 'Whath number is missing in the progression?';

function run()
{
    $getGameAttributs = function () {
        $step = rand(MIN_STEP, MAX_STEP);
        $start = rand(MIN_START, MAX_START);
        $progression = getProgression($start, $step);
        $answerIndex = rand(0, PROGRESSION_LENGHT - 1);
        $correctAnswer = $progression[$answerIndex];
        $prog[$answerIndex] = '..';
        $question = implode(' ', $progression);
        return [$question, $correctAnswer];
    };
    game(DESCRIPTION, $getGameAttributs);
}

function getProgression($start, $step)
{
    $result = [];
    for ($i = 0; $i < PROGRESSION_LENGHT; $i++) {
        $result[] = $start + $step * $i;
    }
    return $result;
}
