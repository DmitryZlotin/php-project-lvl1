<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;

const MIN = 1;
const MAX = 100;

function run()
{
    $description = 'Answer "yes" if number even otherwise answer "no".';
    $getGameAttributs = function () {
        $question = rand(MIN, MAX);
        $correctAnswer = isEven($question) ? 'no' : 'yes';
        return [$question, $correctAnswer];
    };
    game($description, $getGameAttributs);
}

function isEven($num)
{
    return num % 2 == 0;
}
