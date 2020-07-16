<?php

session_start();


$answer1 = $_POST['question-1-answers'];
$_SESSION['question-1-answers'] = $answer1;
$answer2 = $_POST['question-2-answers'];
$_SESSION['question-2-answers'] = $answer2;
$answer3 = $_POST['question-3-answers'];
$_SESSION['question-3-answers'] = $answer3;
$answer4 = $_POST['question-4-answers'];
$_SESSION['question-4-answers'] = $answer4;
$answer5 = $_POST['question-5-answers'];
$_SESSION['question-5-answers'] = $answer5;

$totalCorrect = 0;

if ($answer1 == "C") {
    $totalCorrect++;
}
if ($answer2 == "D") {
    $totalCorrect++;
}
if ($answer3 == "C") {
    $totalCorrect++;
}
if ($answer4 == "B") {
    $totalCorrect++;
}
if ($answer5 == "A") {
    $totalCorrect++;
}

$_SESSION['rt'] = $totalCorrect;
header('location:QHimym.php');










