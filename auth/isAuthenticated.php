<?php
if (!isset($_SESSION['user'])) {
    $_SESSION['errorMessage'] = "Vous devez d'abord vous connecter";
    header('location:login.php');
}