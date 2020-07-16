<?php
session_start();
if (isset($_GET['id'])) {
    include_once 'connexionBD/getConnexion.php';
    $req = "SELECT * from users where username = :uname";
    $reponse = $bdd->prepare($req);
    $reponse->execute(array(
        'uname' => $_SESSION['user'],
    ));
    $user = $reponse->fetch(PDO::FETCH_OBJ);
    $id = $user->id;

    $req = "update inter set watched = :etat where SerieID = :sid and UserID = :uid";
    $response = $bdd->prepare($req);
    $response->execute(
        array(
            'etat' => 'True',
            'sid' => $_GET['id'],
            'uid' => $id,
        )
    );


} else {
    $_SESSION['errors'] = "Problème lors de l'ajout";
}

header('location:watchlist.php');



