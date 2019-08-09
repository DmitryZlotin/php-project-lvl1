<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\game;

const MIN = 1;
const MAX = 100;

function run()
{
    $description = 'Answer "yes" if number even otherwise answer "no".';
    $getGameAttributs = function () {
        $question = rand(MIN, MAX);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    game($description, $getGameAttributs);
}

function isEven($num)
{
    return $num % 2 == 0;
}
