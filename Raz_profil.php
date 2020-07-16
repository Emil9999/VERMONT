<?php
session_start();


include_once 'connexionBD/getConnexion.php';
$req = "SELECT * from users where username = :uname";
$reponse = $bdd->prepare($req);
$reponse->execute(array(
    'uname' => $_SESSION['user'],
));
$user = $reponse->fetch(PDO::FETCH_OBJ);
$id = $user->id;


$req = "SELECT * from inter where UserID = :uid ";
$rep = $bdd->prepare($req);
$rep->execute(
    array(
        'uid' => $id,
    )
);
$dupli = $rep->fetchAll();

if (count($dupli) > 0) {


    $req2 = "delete from inter where UserID = :uid ";
    $response2 = $bdd->prepare($req2);
    $result = $response2->execute(
        array(
            'uid' => $id,
        )
    );


    $_SESSION['success'] = "Votre profil a été remis à zéro ";
} else {

    $_SESSION['errors'] = "Votre profil est déja réinitialisé ";
}

header('location:settings.php');



