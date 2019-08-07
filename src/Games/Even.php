<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;

function run()
{
    $regulations = "Answer \"yes\" if number even otherwise answer \"no\".";
    $getTask = function () {
        $min = 1;
        $max = 100;
        $quest = rand($min, $max);
        $correctAnswer = $quest % 2 ? 'no' : 'yes';
        return [$quest, $correctAnswer];
    };
    startGame($regulations, $getTask);
}
