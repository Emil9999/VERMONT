<?php


session_start();

require_once 'connexionBD/getConnexion.php';
var_dump($_SESSION['user']);
die();


$req3 = "SELECT * from intermediaire";
$reponse3 = $bdd->query($req3);
$relations = $reponse3->fetchAll(PDO::FETCH_OBJ);


if (isset($_GET['id'])) {

    $req = "insert into intermediaire (iduser, idserie ) values (:iduser, :idserie)";
    $response = $bdd->prepare($req);
    $response->execute(array());
}
header('location:explore.php');
?>