<?php

namespace BrainGames\Games\progression;

function getQuestion()
{
    $min = 1;
    $max = 9;
    $multiplier = rand($min, $max);
    $prog = getProgression($multiplier);
    $answerIndex = rand($min, $max);
    $correctAnswer = $prog[$answerIndex];
    $prog[$answerIndex] = '..';
    $quest = implode(' ', $prog);
    return ['question' => $quest, 'correctAnswer' => $correctAnswer];
}

function getSpecification()
{
    $specification = ['regulations' => "Whath number is missing in the progression?",
                        'quests' => []];
    for ($i = 0; $i < 3; $i++) {
        $fun = getQuestion();
        $specification['quests'][$i] = $fun;
    }

    return $specification;
}

function getProgression($multiplier)
{
    $result = [];
    for ($i = 0; $i < 10; $i++) {
        $result[] = $i * $multiplier;
    }
    return $result;
}
