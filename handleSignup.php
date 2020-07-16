<?php
session_start();
if (isset($_POST['name']) && isset($_POST['birthday']) && isset($_POST['password']) && isset($_POST['country'])) {
    include_once 'connexionBD/getConnexion.php';

    $req2 = "select * from users where username = :name ";
    $response2 = $bdd->prepare($req2);
    $response2->execute(
        array(
            'name' => $_POST['name'],
        )
    );
    $dupli = $response2->fetchAll();

    if (count($dupli) == 0) {


        $req = "insert into users (username, password, birthday, country) values (:name, :password, :birthday, :country)";
        $reponse = $bdd->prepare($req);
        $result = $reponse->execute(array(
            'name' => $_POST['name'],
            'birthday' => $_POST['birthday'],
            'password' => $_POST['password'],
            'country' => $_POST['country'],
        ));
        header('location:login.php');

    }
    if (count($dupli) > 0) {
        $_SESSION['errors'] = "Ce username est déja pris";
        header('location:signup.php');

    } else {

        if (!$result) {

            $_SESSION['errors'] = "Problème avec la base de données";
        }
        header('location:login.php');
    }
}