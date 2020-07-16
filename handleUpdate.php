<?php
/*
 * 1- vérifier qu'on a un id
 * 2- vérifier qu'on un user connecté
 * 3- mettre à jour la base de données
 * */
session_start();

if (isset($_GET['id'])) {
    include_once 'connexionBD/getConnexion.php';
    $req = "SELECT * from series";
    $reponse = $bdd->query($req);
    $series = $reponse->fetchAll(PDO::FETCH_OBJ);

    $req = "select * from series where id = :id";
    $respone = $bdd->prepare($req);
    $respone->execute(array(
        'id' => $_GET['id']
    ));
    $serie = $respone->fetch(PDO::FETCH_OBJ);

    if ($_FILES['image']['name'] != '') {


        $path = 'assets/uploads/' . uniqid() . $_FILES['image']['name'];
//On a copié l'image de l'emplacement temporaire vers notre dossier upload
        copy($_FILES['image']['tmp_name'], $path);
    } else {
        $path = $serie->image;

    }

    $req = "update series set Titre = :Titre, Genre =:Genre, Synopsis = :Synopsis, Date = :Date, Image =:Image  where id= :id";
    $response = $bdd->prepare($req);
    $response->execute(
        array(
            'Titre' => $_POST['Titre'],
            'Genre' => $_POST['Genre'],
            'Synopsis' => $_POST['Synopsis'],
            'Date' => $_POST['Date'],
            'Image' => $path,
            'id' => $_GET['id']
        )
    );
} else {
    $_SESSION['errors'] = "Problème lors de la modification";
}


header('location:discover.php');