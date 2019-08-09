<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startGame;

const MIN = 1;
const MAX = 100;
function run()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $getGameAttributs = function () {
        $question = rand(MIN, MAX);
        $correctAnswer = checkPrime($question) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    game($description, $getGameAttributs);
}

function checkPrime($number)
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= $number / $i; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
