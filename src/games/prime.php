<?php

namespace BrainGames\Games\prime;

function getQuestion()
{
    $min = 1;
    $max = 100;
    $quest = rand($min, $max);
    $correctAnswer = checkPrime($quest) ? 'no' : 'yes';
    return ['question' => $quest, 'correctAnswer' => $correctAnswer];
}

function getSpecification()
{
    $specification = ['regulations' => "Answer \"yes\" if given number is prime. Otherwise answer \"no\".",
                        'quests' => []];
    for ($i = 0; $i < 3; $i++) {
        $fun = getQuestion();
        $specification['quests'][$i] = $fun;
    }
    return $specification;
}

function checkPrime($number)
{
    $primes = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97];
    return !in_array($number, $primes);
}
