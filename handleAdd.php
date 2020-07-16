<?php
session_start();
// Récupérer le login et le password à travers $_POST
// On a récupéré l'image uploadé via $_FILES
// On a préparé le chemi de notre image
if ($_FILES['image']) {
    $path = 'assets/uploads/'.uniqid().$_FILES['image']['name'];
//On a copié l'image de l'emplacement temporaire vers notre dossier upload
    copy($_FILES['image']['tmp_name'], $path);
} else {
    $path = '';

}

if (isset($_POST['Titre'])&&isset($_POST['Genre'])&&isset($_POST['Synopsis'])&&isset($_POST['Date'])) {
    // Vérifier s'ils sont bon en requetant notre base de données
    include_once 'connexionBD/getConnexion.php';
    $req="insert into series (Titre, Genre, Synopsis, Date, Image) values (:Titre,:Genre, :Synopsis, :Date, :Image)";
    $reponse = $bdd->prepare($req);
    $result = $reponse->execute(array(
        'Synopsis' => $_POST['Synopsis'],
        'Titre' => $_POST['Titre'],
        'Genre' => $_POST['Genre'],
        'Date' => $_POST['Date'],
        'Image' => $path
    ));
    if ($result) {
        $_SESSION['success'] = "La série ${_POST['Titre']} a été ajoutée avec succès";
    } else {
        $_SESSION['errors'] = "Problème avec la base de données";
    }
    header('location:discover.php');
} else {
    $_SESSION['errors'] = "Problème lors de l'ajout vérifier vos champs";
    header('location:login.php');
}