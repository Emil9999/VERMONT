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
$answer6 = $_POST['question-6-answers'];
$_SESSION['question-6-answers'] = $answer6;


$totalRo = 0;
$totalCh = 0;
$totalJo = 0;
$totalRa = 0;
$totalMo = 0;
$totalPh = 0;

//QUESTION 1
if ($answer1 == "A") {
    $totalJo++;
}
if ($answer1 == "B") {
    $totalMo++;
}
if ($answer1 == "C") {
    $totalRo++;
}
if ($answer1 == "D") {
    $totalCh++;
}
if ($answer1 == "E") {
    $totalRa++;
}
if ($answer1 == "F") {
    $totalPh++;
}

//QUESTION 2
if ($answer2 == "A") {
    $totalJo++;
}
if ($answer2 == "B") {
    $totalMo++;
}
if ($answer2 == "C") {
    $totalRo++;
}
if ($answer2 == "D") {
    $totalCh++;
}
if ($answer2 == "E") {
    $totalRa++;
}
if ($answer2 == "F") {
    $totalPh++;
}

//QUESTION 3
if ($answer3 == "A") {
    $totalJo++;
}
if ($answer3 == "B") {
    $totalMo++;
}
if ($answer3 == "C") {
    $totalRo++;
}
if ($answer3 == "D") {
    $totalCh++;
}
if ($answer3 == "E") {
    $totalRa++;
}
if ($answer3 == "F") {
    $totalPh++;
}

//QUESTION 4
if ($answer4 == "A") {
    $totalJo++;
}
if ($answer4 == "B") {
    $totalMo++;
}
if ($answer4 == "C") {
    $totalRo++;
}
if ($answer4 == "D") {
    $totalCh++;
}
if ($answer4 == "E") {
    $totalRa++;
}
if ($answer4 == "F") {
    $totalPh++;
}

//QUESTION 5
if ($answer5 == "A") {
    $totalJo++;
}
if ($answer5 == "B") {
    $totalMo++;
}
if ($answer5 == "C") {
    $totalRo++;
}
if ($answer5 == "D") {
    $totalCh++;
}
if ($answer5 == "E") {
    $totalRa++;
}
if ($answer5 == "F") {
    $totalPh++;
}

//QUESTION 6
if ($answer6 == "A") {
    $totalJo++;
}
if ($answer6 == "B") {
    $totalMo++;
}
if ($answer6 == "C") {
    $totalRo++;
}
if ($answer6 == "D") {
    $totalCh++;
}
if ($answer6 == "E") {
    $totalRa++;
}
if ($answer6 == "F") {
    $totalPh++;
}

$Personnages = [$totalCh, $totalJo, $totalMo, $totalPh, $totalRa, $totalRo];
rsort($Personnages);


if ($Personnages[0] == $totalRo) {
    $Rt = 'Ross Geller';
    $ImRt = "https://media.giphy.com/media/L0O3TQpp0WnSXmxV8p/giphy.gif";
}
if ($Personnages[0] == $totalRa) {
    $Rt = 'Rachel Green';
    $ImRt = "https://media.giphy.com/media/XGhTPVMgzLv7s2TOE6/giphy.gif";
}
if ($Personnages[0] == $totalJo) {
    $Rt = 'Joey Tribbiani';
    $ImRt = "https://media.giphy.com/media/j2Z8ktYcHlTplAuIQf/giphy.gif";
}
if ($Personnages[0] == $totalCh) {
    $Rt = 'Chandler Bing';
    $ImRt = "https://media.giphy.com/media/lPoxtQlcX30doRbHTN/giphy.gif";
}
if ($Personnages[0] == $totalMo) {
    $Rt = 'Monica Geller';
    $ImRt = "https://media.giphy.com/media/IdyHPMy8eqZ68/giphy.gif";
}
if ($Personnages[0] == $totalPh) {
    $Rt = 'Phoebe Buffay';
    $ImRt = "https://media.giphy.com/media/ftegV9HJX2VyySXmgc/giphy.gif";
}


$_SESSION['rt'] = $Rt;
$_SESSION['image'] = $ImRt;
header('location:QFriends.php');


