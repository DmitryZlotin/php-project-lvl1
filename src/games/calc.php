<?php

namespace BrainGames\Games\calc;

function getQuestion()
{
    $min = 1;
    $max = 100;
    $first = rand($min, $max);
    $second = rand($min, $max);
    $sign = getSign(rand(0, 2));
    $quest = "{$first} {$sign} {$second}";
    $correctAnswer = getAnswer($first, $second, $sign);
    return ['question' => $quest, 'correctAnswer' => $correctAnswer];
}
function getSpecification()
{
    $specification = ['regulations' => "What is the result of the expression?",
                        'quests' => []];
    for ($i = 0; $i < 3; $i++) {
        $fun = getQuestion();
        $specification['quests'][$i] = $fun;
    }

    return $specification;
}
function getSign($flag)
{
    $sign = "";
    switch ($flag) {
        case 0:
            $sign = '+';
            break;
        case 1:
            $sign = '-';
            break;
        case 2:
            $sign = '*';
            break;
    }
    return $sign;
}
function getAnswer($first, $second, $sign)
{
    $answer = 0;
    switch ($sign) {
        case '+':
            $answer = $first + $second;
            break;
        case '-':
            $answer = $first - $second;
            break;
        case '*':
            $answer = $first * $second;
            break;
    }
    return $answer;
}
