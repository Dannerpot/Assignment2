<?php
function getQuestions() {
    return [
        'q1' => 'What is the capital of France?',
        'q2' => 'What is 2 + 2?'
    ];
}

function getCorrectAnswers() {
    return [
        'q1' => 'Paris',
        'q2' => '4'
    ];
}

function checkAnswer($question, $answer) {
    $correctAnswers = getCorrectAnswers();
    return $correctAnswers[$question] == $answer;
}
?>
