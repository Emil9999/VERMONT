<?php
session_start();
include_once 'commun/sidebar.php';
include_once 'auth/isAuthenticated.php';
include_once 'connexionBD/getConnexion.php';
$req = "SELECT SerieID from inter where UserID = :uid";
$reponse = $bdd->prepare($req);
$reponse->execute(array(
    'uid' => $_SESSION['id'],
));
$contenu = $reponse->fetchAll();
$_SESSION['total'] = count($contenu);

include_once 'commun/headerss.php';
$data = array();
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
        $genre = $infos['0']['genre'];
        if (array_key_exists($genre, $data)) {
            $data["" . $genre . ""] += 1;
        } else {
            $data["" . $genre . ""] = 1;
        }
    }
}
$json = json_encode($data)
?>

<!DOCTYPE HTML>
<html>
<title>Vermont</title>
<head>
</head>
<body>
<h1 style="text-align: center; color: #3b3a39"> Répartition des genres de vos series</h1>
<canvas id="doughnut-chart" width="50" height="20"></canvas>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    var data = <?=$json?>;
    var label = []
    var genres = []
    console.log(data)
    for (const proprety in data) {
        label.push(data[proprety])
        genres.push(proprety)
    }
    console.log(label)
    new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        data: {
            labels: genres,
            datasets: [
                {
                    label: "Nombre",
                    backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#60b136", "#4D5360", "#B15D92"],
                    data: label
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: ''
            }
        }
    });
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>