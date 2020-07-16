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


    <div class="container"><br> <br> <br>
        <form action="handleUpdate.php?id=<?= $serie->id ?>" method="post" _lpchecked="1" enctype="multipart/form-data"
        >
            <fieldset>

                <legend>Mettre à jour une série</legend>
                <div class="form-group">
                    <label for="Titre" class="col-sm-2 col-form-label">
                        Titre
                    </label>
                    <div>
                        <input
                                required
                                type="text"
                                value="<?= $serie->titre ?>"
                                class="form-control"
                                id="Titre"
                                name="Titre"
                        >
                    </div>
                    <div class="form-group">
                        <label for="Genre">Genre</label>
                        <select
                                required
                                name="Genre" class="form-control select2" id="Genre">
                            <option value="Drame"> Drame
                            </option>
                            <option value="Comédie"> Comédie
                            </option>
                            <option value="Policier"> Policier
                            </option>
                            <option value="Science Fiction"> Science Fiction
                            </option>
                            <option value="Médical"> Médical
                            </option>
                            <option value="Action"> Action
                            </option>
                        </select>
                    </div>
                    <label for="Synopsis" class="col-sm-2 col-form-label">
                        Synopsis
                    </label>
                    <div>
                        <input
                                required
                                type="text"
                                value="<?= $serie->synopsis ?>"
                                class="form-control"
                                id="Synopsis"
                                name="Synopsis"
                        >
                    </div>
                    <label for="Date" class="col-sm-2 col-form-label">Date</label>
                    <div>
                        <input
                                required
                                type="date"
                                value="<?= $serie->date ?>"
                                class="form-control"
                                id="Date"
                                name="Date"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Affiche</label>
                    <input
                            type="file"
                            class="form-control-file"
                            id="image"
                            name="image"
                            aria-describedby="fileHelp">
                </div>

                <button type="submit" class="btn btn-primary"> Valider</button>
            </fieldset>
        </form>
    </div>
<?php
include 'commun/footer.php';
?>