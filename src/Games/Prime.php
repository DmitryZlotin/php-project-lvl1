<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\game;

const MIN = 1;
const MAX = 100;
const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
function run()
{
    $getGameAttributs = function () {
        $question = rand(MIN, MAX);
        $correctAnswer = checkPrime($question) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    game(DESCRIPTION, $getGameAttributs);
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
