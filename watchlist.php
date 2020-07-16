<?php
session_start();
?>

<?php
include_once 'commun/header.php';
include_once 'auth/isAuthenticated.php';

include_once 'connexionBD/getConnexion.php';
$req = "SELECT SerieID from inter where UserID = :uid and watched = :etat";
$reponse = $bdd->prepare($req);
$reponse->execute(array(
    'uid' => $_SESSION['id'],
    'etat' => 'False',
));
$contenu = $reponse->fetchAll();
$role = $_SESSION['role'];

?>

    <br> <br>

<?php
if (count($contenu) != 0) {

    for ($i = 0; $i < count($contenu); $i++) {
        $contenu[$i];
    }

    foreach ($contenu as $el) {
        include_once 'connexionBD/getConnexion.php';
        $req = "SELECT * from series where id = :sid";
        $reponse = $bdd->prepare($req);
        $reponse->execute(array(
            'sid' => $el['SerieID'],
        ));
        $infos = $reponse->fetchAll();

        $date1 = date_create($infos['0']['date']);
        $date2 = date_create();
        $dif = $date1->diff($date2);
        if ($dif->format('%r%a') >= 0) {
            ?>


            <div class="card mb-3 mx-auto" style="max-width: 540px;" id="fig">

                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img style="height: 100%" src="<?= $infos['0']['image'] ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $infos['0']['titre'] ?></h5>
                            <p class="card-text"><?= $infos['0']['synopsis'] ?></p>
                            <p class="card-text"><a href="vu.php?id=<?= $el['SerieID'] ?>">
                                    <button type="button" id="vue"
                                            name="vue" class="btn btn-light">Vu
                                    </button>
                                </a></small></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (count($contenu) == 0) { ?>
                <div class="card w-50 mx-auto">
                    <div class="card-body">
                        <h5 class="card-title">Information</h5>
                        <p class="card-text">Vous n'avez rien a regarder. Il serait temps de commencer un série non ?
                            Pour remedier
                            a cela : </p>
                        <a href="discover.php" class="btn btn-info">Clique</a>
                    </div>
                </div>
            <?php } ?>
            }
        <?php }
    }

} else { ?>
    <div class="card w-50 mx-auto">
        <div class="card-body">
            <h5 class="card-title">Information</h5>
            <p class="card-text">Vous n'avez rien a regarder. Il serait temps de commencer un série non ? Pour remedier
                a cela : </p>
            <a href="discover.php" class="btn btn-info">Clique</a>
        </div>
    </div>
    <?php
} ?>