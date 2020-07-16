<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="upcoming.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Title</title>
    <script type="text/javascript" src="upcomin.js"></script>
</head>
<body>
<?php
include 'commun/header.php';
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
} else {
    $role = "guest";
}
include_once 'connexionBD/getConnexion.php';

$req = "SELECT * from series ORDER BY date; ";
$reponse = $bdd->prepare($req);
$reponse->execute([
    'uid' => $_SESSION['id'],
]);
$contenu = $reponse->fetchAll();
$_SESSION['total'] = count($contenu)
?>
<div class="wrapper">
    <div class="cards" id="fig">
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
                    'sid' => $el['id'],
                ));
                $infos = $reponse->fetchAll();
                ?>

                <div class="contenant" id="carte">

                    <figure class="card">

                        <style> img {
                                filter: contrast(50%)
                            } </style>
                        <img src="<?= $infos['0']['image'] ?>"/>
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
                                    } else {
                                        var c = document.getElementById("carte");
                                        var f = document.getElementById("fig");
                                        f.removeChild(f.lastChild);


                                        ;
                                    }
                                }
                                ;
                            </script>
                            <br>

                        </div>
                </div>
                </figure>


            <?php }
        }


        ?>
    </div>
</div>


</body>
</html>
