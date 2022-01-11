<?php

if (!file_exists('questions.json'))
    file_put_contents('questions.json', '[]');


$questionResults = json_decode(file_get_contents("questions.json"), true);

$question = $_POST['question'];
$result = array_key_exists($question, $questionResults) ? $questionResults[$question] : [
    'correct' => 0,
    'incorrect' => 0
];

if ($_POST['correct'] == 'yes')
    $result['correct']++;
else
    $result['incorrect']++;


$questionResults[$question] = $result;

file_put_contents("questions.json", json_encode($questionResults, JSON_PRETTY_PRINT));

header("location: questions.php");