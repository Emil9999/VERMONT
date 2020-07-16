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
    var_dump($dupli);

    if (count($dupli) > 0) {


        $req2 = "delete from inter where SerieID = :sid and UserID = :uid";
        $response2 = $bdd->prepare($req2);
        $result = $response2->execute(
            array(
                'sid' => $_GET['id'],
                'uid' => $id,

            )
        );


        $_SESSION['success'] = "La série a été supprimée avec succès ";
    } else {

        $_SESSION['errors'] = "La série ne figure pas dans votre profil";
    }

} else {
    $_SESSION['errors'] = "Problème lors de la suppression";
}

header('location:discover.php');



