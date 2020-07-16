<?php
session_start();
include_once 'auth/isAuthenticated.php';
include_once 'connexionBD/getConnexion.php';

$role = $_SESSION['role'];

$req = "SELECT * FROM series ORDER BY date;";
$tabFilter = array();

if (isset($_POST['filter'])) {
    $req .= ' and (e.name like :filter or s.designation like :filter)';
    $tabFilter['filter'] = "%${_POST['filter']}%";
}
$reponse = $bdd->prepare($req);

$reponse->execute($tabFilter);
$series = $reponse->fetchAll(PDO::FETCH_OBJ);
?>

<body>
<?php
include 'commun/header.php';
?>
<div class="container">
    <div>
        <form method="post">
            <?php if ($role == 'admin') { ?>

            <a class="float-right m-3" href="addSerie.php">
                <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i>
            </a>
        </form>
        <?php } ?>
    </div>
    <?php
    if (isset($_SESSION['success'])) {
        ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </div>
        <?php
    }
    ?>
    <?php
    if (isset($_SESSION['errors'])) {
        ?>
        <div class="alert alert-danger">
            <?php
            echo $_SESSION['errors'];
            unset($_SESSION['errors']);
            ?>
        </div>
        <?php
    }
    ?>

    <table id="example" class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">
                image
            </th>
            <th scope="col">Titre</th>
            <th scope="col">Genre</th>
            <th scope="col">Synopsis</th>
            <th scope="col">Date</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < count($series); $i++) {
            $series[$i];
        }
        foreach ($series as $serie) {
            ?>

            <tr class="table-light">

                <th scope="row"><?= $serie->id ?></th>
                <th scope="row">
                    <img
                            height="250px"
                            width="250px"
                            class=""
                            src=<?= $serie->image ?> alt=""></th>
                <td><?= $serie->titre ?></td>
                <td><?= $serie->genre ?></td>
                <td><?= $serie->synopsis ?></td>
                <td><?= $serie->date ?></td>


                <td><br>
                    <a href="ajout_profil.php?id=<?= $serie->id ?>">
                        <button type="button" class="btn btn-success">Ajouter</button>
                    </a>
                    <br> <br>
                    <a href="suppr_profil.php?id=<?= $serie->id ?>">
                        <button type="button" class="btn btn-danger">Supprimer</button>
                    </a>
                    <br> <br>
                    <a href="detailsSerie.php?id=<?= $serie->id ?>">
                        <button type="button" class="btn btn-info">Details</button>
                    </a>
                    <br><br>
                    <?php if ($role == 'admin') { ?>
                        <a href="handleDelete.php?id=<?= $serie->id ?>">
                            <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                        </a>
                        <a href="updateSerie.php?id=<?= $serie->id ?>">
                            <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                        </a>
                    <?php } ?>


                </td>

            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>
</div>

<?php
include 'commun/footer.php';
?>
