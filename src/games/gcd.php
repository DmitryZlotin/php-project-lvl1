<?php

namespace BrainGames\Games\gcd;

function getQuestion()
{
    $min = 1;
    $max = 100;
    $first = rand($min, $max);
    $second = rand($min, $max);
    $quest = "{$first} {$second}";
    $correctAnswer = getDivisor($first, $second);
    return ['question' => $quest, 'correctAnswer' => $correctAnswer];
}

function getSpecification()
{
    $specification = ['regulations' => "Find the greatest common divisor of given numbers",
                        'quests' => []];
    for ($i = 0; $i < 3; $i++) {
        $fun = getQuestion();
        $specification['quests'][$i] = $fun;
    }

    return $specification;
}

function getDivisor($first, $second)
{
    $result = 0;
    for ($i = 1; $i < $first / $i && $i < $second / $i; $i++) {
        if ($first % $i == 0 && $second % $i == 0) {
            $result = $i;
        }
    }
    return $result;
}
