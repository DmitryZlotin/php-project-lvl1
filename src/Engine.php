<?php

namespace BrainGames\Engine;

use function \cli\line;
use function \cli\prompt;

function startGame($regulations)
{
    line('Welcome to the Brain Game!');
    line($regulations . "\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!\n", $name);
    return $name;
}

function getPlayerAnswer($quest)
{
    line("Question: {$quest}");
    $playerAnswer = prompt("Your answer");
    return $playerAnswer;
}

function endGame(...$arguments)
{
    if (count($arguments) > 1) {
        [$answer, $correctAnswer, $name] = $arguments;
        line("{$answer} is wrong answer ;(. Correct answer was {$correctAnswer}.");
        line("Let's try again, {$name}");
    } else {
        [$name] = $arguments;
        line("Congratulations, {$name}");
    }
}

function correct()
{
    line("Correct!");
}
