<?php
session_start();
?>


<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="explore.css">
</head>

<?php
include_once 'commun/header.php';
include_once 'auth/isAuthenticated.php';

include_once 'connexionBD/getConnexion.php';
$role = $_SESSION['role'];
$req = "SELECT * from inter where UserID = :uid  ";
$reponse = $bdd->prepare($req);
$reponse->execute(array(
    'uid' => $_SESSION['id'],
));
$contenu = $reponse->fetchAll();

$_SESSION['total'] = count($contenu)
?>
<div class="wrapper">
    <h2><strong>Toutes vos series <span><?= $_SESSION['total'] ?></span></strong></h2>
    <div class="cards">
        <?php
        if (count($contenu) != 0) {
            for ($i = 0; $i < count($contenu); $i++) {

            }
            foreach ($contenu as $el) {
                include_once 'connexionBD/getConnexion.php';
                $req = "SELECT * from series where id = :sid ORDER BY date;";
                $reponse = $bdd->prepare($req);
                $reponse->execute(array(
                    'sid' => $el['SerieID'],
                ));
                $infos = $reponse->fetchAll();
                ?>
                <figure class="card">
                    <img src="<?= $infos['0']['image'] ?>"/>
                    <figcaption><?= $infos['0']['titre'] ?></figcaption>
                </figure>
            <?php }
        } ?>
    </div>

    <h2><strong>Ce qui vous attend</strong></h2>
    <div class="cards" id="fig">
        <?php
        if (count($contenu) != 0) {
            foreach ($contenu as $el) {
                if ($el[2] == "False") {

                    include_once 'connexionBD/getConnexion.php';

                    $req = "SELECT * from series where id = :sid ORDER BY date; ";
                    $reponse = $bdd->prepare($req);
                    $reponse->execute(array(
                        'sid' => $el['SerieID'],
                    ));
                    $infos = $reponse->fetchAll();
                    ?>
                    <div class="contenant" id="carte">
                        <figure class="card">
                            <style> #up {
                                    filter: contrast(50%)
                                } </style>
                            <img id="up" src="<?= $infos['0']['image'] ?>"/>
                            <figcaption><?= $infos['0']['date'] ?></figcaption>
                            <div class="texte_centrer">
                                <script>
                                    var ad = "<?= $role ?>";
                                    var date1 = new Date("<?= $infos['0']['date']?>");
                                    var date2 = new Date;
                                    var difference = date1.getTime() - date2.getTime();
                                    var difference = difference / (1000 * 3600 * 24);
                                    if (difference > 0) {
                                        document.write(Math.trunc(difference) + "<br> jours ")
                                    } else {
                                        if (ad == "admin") {
                                            document.write("METTRE À JOUR")
                                        } else if (ad == "user") {
                                            var c = document.getElementById("carte");
                                            var f = document.getElementById("fig");
                                            f.removeChild(f.lastChild);
                                        }
                                    }
                                    ;
                                </script>
                                <br>

                            </div>


                        </figure>

                    </div>
                <?php }
            }
        } ?>

    </div>
</html>