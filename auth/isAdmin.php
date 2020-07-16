<?php
session_start();
if (isset($_SESSION['user']) && $_SESSION['role'] != 'admin') {

    $_SESSION['errors'] = "Vous n'avez pas le droit d'acceder à cette ressource";
    header('location:explore.php');
    return;
} else if (!isset($_SESSION['user'])) {
    $_SESSION['errorMessage'] = "Vous devez d'abord vous loger";
    header('location:login.php');
}