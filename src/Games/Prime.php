<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startGame;

function run()
{
    $regulations = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    $getTask = function () {
        $min = 1;
        $max = 100;
        $quest = rand($min, $max);
        $correctAnswer = checkPrime($quest) ? 'yes' : 'no';
        return [$quest, $correctAnswer];
    };
    startGame($regulations, $getTask);
}

function checkPrime($number)
{
    for ($i = 2; $i <= $number / $i; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
