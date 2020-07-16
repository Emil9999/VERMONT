<?php
session_start();
//include_once 'auth/isAdmin.php';
include_once 'connexionBD/getConnexion.php';

$req = "SELECT * from series";
$reponse = $bdd->query($req);
$sections = $reponse->fetchAll(PDO::FETCH_OBJ);
include 'commun/header.php';
?>

    <div class="container">
        <form action="handleAdd.php"
              method="post"
              enctype="multipart/form-data"
              _lpchecked="1">
            <fieldset>
                <legend>Ajouter une série</legend>
                <div class="form-group">
                    <label for="Titre" class="col-sm-2 col-form-label">Titre</label>
                    <div>
                        <input
                                required
                                type="text"
                                class="form-control"
                                id="Titre"
                                placeholder="Nom de la serie"
                                name="Titre"

                        >
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
                    </div>
                    <label for="Synopsis" class="col-sm-2 col-form-label">Synopsis</label>
                    <div>
                        <input
                                required
                                type="text"
                                class="form-control"
                                id="Synopsis"
                                placeholder="Synopsis"
                                name="Synopsis"

                        >
                    </div>
                    <label for="Date" class="col-sm-2 col-form-label">Date</label>
                    <div>
                        <input
                                required
                                type="date"
                                class="form-control"
                                id="Date"
                                placeholder="Date de sortie"
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

                <button type="submit" class="btn btn-primary">Ajouter</button>
            </fieldset>
        </form>
    </div>
<?php
include 'commun/footer.php';
?>