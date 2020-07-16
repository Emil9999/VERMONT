<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="Qaccueil2.css"
    <link rel="script" href="Qalert.js"
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body>
<?php
include 'Commun/header.php';
?>
<div class="header" id="myHeader">
    <h2> DÉCOUVRE NOS QUIZ !</h2>
</div>


<br>
<br>




    <br> <br>
    <div class="main tst">
        <div class="container" >
            <a href="QCasa.php">
                <img src="assets/gCasa.gif" alt="Avatar" class="image" align="center">
                <div class="overlay"> CLIQUE POUR TESTER TES CONNAISSANCES SUR LA CASA DE PAPEL ! </div>
            </a>
        </div>
        <br> <br>

        <div class="container" align="center">
            <a href="QFriends.php">
                <img src="assets/gFriends.gif" alt="Avatar" class="image" align="center">
                <div class="overlay"> CLIQUE VITE POUR DÉCOUVRIR QUEL PERSONNAGE DE F•R•I•E•N•D•S ES-TU ! </div>
            </a>
        </div>

        <br> <br>

        <div class="container" align="center">
            <a href="QHimym.php">
                <img src="assets/gHimym.gif" alt="Avatar" class="image" align="center">
                <div class="overlay"> CLIQUE POUR VOIR SI TU ES VRAIMENT FAN DE HOW I MET YOUR MOTHER ! </div>
            </a>
        </div>

        <br> <br> <br>
    </div>


</div>


</body>
</html>

