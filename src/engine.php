<?php

namespace BrainGames\engine;

use function BrainGames\games\even\getQuestion;
use function BrainGames\games\even\getSpecification;
use function \cli\line;
use function \cli\prompt;

function startGame()
{
    line('Welcome to the Brain Game!');
    $specification = getSpecification();
    line($specification . "\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!\n", $name);
    for ($i = 0; $i < 3; $i++) {
        $quest = getQuestion();
        $playerAnswer = getPlayerAnswer($quest['question']);
        $correctAnswer = $quest['correctAnswer'];
        if (!checkAnswer($correctAnswer, $playerAnswer)) {
            line("\"{$playerAnswer}\" is wrong answer;(. Correct answer was {$correctAnswer}");
            line("Let's try again, {$name}!");
            break;
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

function checkAnswer($correct, $player)
{
    return $correct == $player ? true : false;
}