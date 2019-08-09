<?php

namespace BrainGames\Engine;

use function \cli\line;
use function \cli\prompt;

const COUNT_GAMES = 3;

function game($description, $getGameAttributs)
{
    line("Welcome to the Brain Game!\n");
    line($description . "\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!\n", $name);
    $count = 0;
    for ($count = 0; $count < COUNT_GAMES; $count++) {
        [$question, $correctAnswer] = $getGameAttributs();
        $answer = getPlayerAnswer($question);
        if ($answer != $correctAnswer) {
            line("{$answer} is wrong answer ;(. Correct answer was {$correctAnswer}.");
            line("Let's try again, {$name}");
            return;
        }
        line("Correct!");
    }
    line("Congratulations, {$name}!");
}

function getPlayerAnswer($quest)
{
    line("Question: {$quest}");
    $playerAnswer = prompt("Your answer");
    return $playerAnswer;
}
