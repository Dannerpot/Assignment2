<?php
header('Content-Type: application/json');

include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $answers = [
        'q1' => $_POST['q1'] ?? '',
        'q2' => $_POST['q2'] ?? ''
    ];

    $score = calculateScore($answers);
    $message = scoreMessage($score);

    echo json_encode(['message' => $message]);
} else {
    echo json_encode(['message' => 'Invalid request method']);
}

function calculateScore($answers) {
    $correctAnswers = [
        'q1' => 'Paris',
        'q2' => '4'
    ];

    $score = 0;
    foreach ($answers as $question => $answer) {
        if ($correctAnswers[$question] == $answer) {
            $score++;
        }
    }

    return $score;
}

function scoreMessage($score) {
    if ($score == 2) {
        return "Perfect score! You got all answers right.";
    } elseif ($score == 1) {
        return "Good job! You got one answer right.";
    } else {
        return "Try again. You didn't get any answers right.";
    }
}
