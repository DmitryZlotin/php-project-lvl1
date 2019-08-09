<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\game;

const MIN = 1;
const MAX = 100;
const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';
function run()
{
    $getGameAttributs = function () {
        $question = rand(MIN, MAX);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    game(DESCRIPTION, $getGameAttributs);
}

function isEven($num)
{
    return $num % 2 == 0;
}
