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

    $req = "SELECT * from inter where UserID = :uid and SerieID = :sid";
    $rep = $bdd->prepare($req);
    $rep->execute(
        array(
            'uid' => $id,
            'sid' => $_GET['id'],
        )
    );
    $dupli = $rep->fetchAll();
    if (count($dupli) == 0) {
        $req = "insert into inter (UserID, SerieID) values (:uid, :sid) ";
        $response = $bdd->prepare($req);
        $response->execute(
            array(
                'uid' => $id,
                'sid' => $_GET['id'],
            )
        );


        $_SESSION['success'] = "La série a été ajoutée à votre profil ";
    } else {
        $_SESSION['errors'] = "Vous avez déjà cette série !";
    }
} else {
    $_SESSION['errors'] = "Problème lors de l'ajout";
}
header('location:discover.php');