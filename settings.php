<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="settings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Title</title>
</head>
<body>
<?php
include 'Commun/header.php';
include_once 'auth/isAuthenticated.php';
include_once 'connexionBD/getConnexion.php';
?>
 <br> <br> <br>
<?php
if (isset($_SESSION['success'])) {
    ?>
    <div class="alert alert-success" style="margin-left: 450px">
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success'] );
        ?>
    </div>
    <?php
}
?>
<?php
if (isset($_SESSION['errors'])) {
    ?>
    <div class="alert alert-danger" style="margin-left: 450px">
        <?php
        echo $_SESSION['errors'];
        unset($_SESSION['errors'] );
        ?>
    </div>
    <?php
}
?>
<br>
<br>
<br>
<a href="Raz_profil.php" style="color: transparent">
<button type="button" class="btn btn-primary btn-lg btn-block btn btn-dark"  style="margin-left: 450px; ">Remettre à zéro mon profil </button>
</a>

<br> <br>
<a href="Quitter_profil.php" style="color: transparent">
    <button type="button" class="btn btn-primary btn-lg btn-block btn btn-danger"  style="margin-left: 450px; ">Quitter Vermont définitivement </button>
</a>



