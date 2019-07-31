<?php

namespace BrainGames\Games\even;

function getQuestion()
{
    $min = 1;
    $max = 100;
    $quest = rand($min, $max);
    $correctAnswer = $quest % 2 ? 'no' : 'yes';
    return ['question' => $quest, 'correctAnswer' => $correctAnswer];
}

function getSpecification()
{
    return "Answer \"yes\" if number even otherwise answer \"no\".";
}
