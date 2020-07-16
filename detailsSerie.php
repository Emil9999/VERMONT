<?php
session_start();

if (isset($_GET['id'])) {
    require_once 'connexionBD/getConnexion.php';

    $req = "SELECT * from series";
    $reponse = $bdd->query($req);
    $series = $reponse->fetchAll(PDO::FETCH_OBJ);

    $req = "select * from series where id = :id";
    $respone = $bdd->prepare($req);
    $respone->execute(array(
        'id' => $_GET['id']
    ));
    $serie = $respone->fetch(PDO::FETCH_OBJ);
    if (!$serie) {
        $_SESSION['errors'] = "Problème lors de la mise à jour, série inexistante :)";
        header('location:discover.php');
    }
} else {
    $_SESSION['errors'] = "Problème lors de la mise à jour";
    header('location:discover.php');
}
include 'commun/header.php';

?>

    <div class="container">
        <br><br><br><br><br>

        <div class="row">
            <div class="col-md-5 img">

                <img
                        width="400px"
                        height="350px" ;
                        src="<?= $serie->image ?>"
                        alt="<?= $serie->titre ?>"
                        class="img-rounded center">
            </div>
            <div class="col-md-7 details">
                <style>
                    h2 {
                        font-weight: bold;
                        font-size: 50px;
                    }

                    h4 {
                        font-weight: bold;
                        font-size: 20px;
                        color: #3f3f3f;
                    }

                </style>
                <p>
                <h2><?= $serie->titre ?></h2> <br>

                <h4><i class="fa fa-film"></i> Genre</h4> <?= $serie->genre ?> <br> <br>
                <h4><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Synopsis</h4> <?= $serie->synopsis ?> <br> <br>
                <h4><i class="fa fa-hourglass-half "></i> Prochaine saison</h4> <?= $serie->date ?>
                <br> <br> <br> <br>


                </p>
            </div>
        </div>


    </div>
<?php
include 'commun/footer.php';
?>