<?php

session_start();
//vérifier s'il authentifié
// récupérer ma base de données
//require_once 'auth/isAdmin.php';
require_once 'connexionBD/getConnexion.php';
//Vérifier si j'ai un id
if (isset($_GET['id'])) {
    // Si oui

    $req = "SELECT * from inter where SerieID = :uid ";
    $rep = $bdd->prepare($req);
    $rep->execute(
        array(
            'uid' => $_GET['id'],
        )
    );
    $dupli = $rep->fetchAll();

    if (count($dupli) > 0) {


        $req2 = "delete from inter where SerieID = :uid ";
        $response2 = $bdd->prepare($req2);
        $result = $response2->execute(
            array(
                'uid' => $_GET['id'],
            )
        );
    }


    //Créer ma requete
    $req = "delete from series where id = :id";
    $response = $bdd->prepare($req);
    $response->execute(
        array(
            'id' => $_GET['id']
        )
    );
    if ($response) {
        $_SESSION['success'] = "La série a été supprimée avec succès ";
    } else {
        $_SESSION['errors'] = "Problème avec la base de données lors de la suppression ";
    }
    // lancer la requete
    // ajouter un message de success
} else {
    $_SESSION['errors'] = "Problème lors de la suppression ";
}
// rediriger vers la liste
header('location:discover.php');