<?php

namespace BrainGames\Engine;

use function \cli\line;
use function \cli\prompt;

const COUNT_GAMES = 3;

function startGame($regulations, $getTask)
{
    line("Welcome to the Brain Game!\n");
    line($regulations . "\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!\n", $name);
    $count = 0;
    while ($count < COUNT_GAMES) {
        [$quest, $correctAnswer] = $getTask();
        $answer = getPlayerAnswer($quest);
        if ($answer != $correctAnswer) {
            line("{$answer} is wrong answer ;(. Correct answer was {$correctAnswer}.");
            line("Let's try again, {$name}");
            return;
        }
        line("Correct!");
        $count++;
    }
    line("Congratulations, {$name}!");
}

function getPlayerAnswer($quest)
{
    line("Question: {$quest}");
    $playerAnswer = prompt("Your answer");
    return $playerAnswer;
}
