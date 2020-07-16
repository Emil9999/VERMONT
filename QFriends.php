<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="Q.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body>

<?php
include 'Commun/header.php';
?>



    <div class="main">


    <div class="container" >
        <img src="assets/Friends1.jpg" alt="Notebook" style="width:100%;">
        <div class="content">
            <h1>  QUEL PERSONNAGE DE F•R•I•E•N•D•S ES-TU ? </h1>
            <p>Découvre-le tout de suite avec ce test !</p>
        </div>
    </div>

    <?php
    if  (isset($_SESSION['rt'])) {

        if (isset($_SESSION['question-1-answers']) && isset($_SESSION['question-2-answers']) && isset($_SESSION['question-3-answers']) &&
            isset($_SESSION['question-4-answers']) && isset($_SESSION['question-5-answers']) && isset($_SESSION['question-6-answers'])) {
            $x = $_SESSION['rt'];
            $y=$_SESSION['image'];
            echo " <html> <br> <br> <br>  <div class=\"callout\">
                     <div class=\"callout-header\"> Vous êtes $x ! </div>
                     <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                     <div class=\"callout-container\">
                     <p> <img src=$y alt='...' </p>
                     </div>
                     </div> </html> ";
            session_destroy();
        }

        else {
            echo "<script>alert('Attention ! Vous n avez pas répondu à toutes les questions ') </script>";
            session_destroy();
        }
    }

    ?>

    <form name="form" action="ReponsesFriends.php"  onsubmit="return validateForm()" method="post" id="quiz">
        <ul class="hide">
            <br> <br>
            <li>

                <h3>De quel meuble ou accessoire de la maison serais-tu incapable de te passer? </h3>

                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                    <label for="question-1-answers-A">A) Mon frigo </label>
                </div>

                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                    <label for="question-1-answers-B">B) Un balai </label>
                </div>

                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                    <label for="question-1-answers-C">C) Ma bibliothèque </label>
                </div>

                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                    <label for="question-1-answers-D">D) Ma télévision </label>
                </div>

                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-E" value="E" />
                    <label for="question-1-answers-E">E) Le miroir dans ma chambre </label>
                </div>

                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-F" value="F" />
                    <label for="question-1-answers-F">F) Un diffuseur d’huiles essentielles </label>
                </div>

            </li>

            <li>

                <h3>Ton ventre gargouille et pas rien qu’un peu! Tu rêves de croquer à pleines dents dans…

                </h3>

                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                    <label for="question-2-answers-A">A)  … une pointe de pizza, ou deux ou trois!</label>
                </div>

                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                    <label for="question-2-answers-B">B) … un filet mignon de porc aux champignons.  </label>
                </div>

                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                    <label for="question-2-answers-C">C)  … un sandwich à la dinde. </label>
                </div>

                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
                    <label for="question-2-answers-D">D)… un grilled cheese. </label>
                </div>

                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-E" value="E" />
                    <label for="question-2-answers-E">E) … un morceau de cheesecake.  </label>
                </div>

                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-F" value="F" />
                    <label for="question-2-answers-F">F)  ... une part de lasagnes végétariennes. </label>
                </div>

            </li>

            <li>

                <h3>Qu’est-ce qui a toujours été ta grande force à l’école? </h3>

                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                    <label for="question-3-answers-A">A) Euh ? La récréation ! </label>
                </div>

                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                    <label for="question-3-answers-B">B)L’organisation. Sérieusement, personne n’est jamais arrivé aussi préparé que moi à un examen!  </label>
                </div>

                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                    <label for="question-3-answers-C">C) L'histoire </label>
                </div>

                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
                    <label for="question-3-answers-D">D) L'informatique </label>
                </div>

                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-E" value="E" />
                    <label for="question-3-answers-E">E) Les arts </label>
                </div>

                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-F" value="F" />
                    <label for="question-3-answers-F">F) La musique </label>
                </div>

            </li>

            <li>

                <h3>Ton animal de compagnie idéal, c’est lequel? </h3>

                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
                    <label for="question-4-answers-A">A) Un coq </label>
                </div>

                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
                    <label for="question-4-answers-B">B) Un chien </label>
                </div>

                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-C" value="C" />
                    <label for="question-4-answers-C">C) Un singe </label>
                </div>

                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-D" value="D" />
                    <label for="question-4-answers-D">D) Un canard </label>
                </div>

                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-E" value="E" />
                    <label for="question-4-answers-E">E) Un chat </label>
                </div>

                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-F" value="F" />
                    <label for="question-4-answers-F"> F) Pas d’animal de compagnie, SVP!  </label>
                </div>

            </li>

            <li>

                <h3>Tu es en soirée et tu repères une cible potentielle. Comment l’abordes-tu ? </h3>

                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
                    <label for="question-5-answers-A">A) Tu lances ta phrase d'accroche fétiche </label>
                </div>

                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
                    <label for="question-5-answers-B">B) Tu joues de tes atouts </label>
                </div>

                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
                    <label for="question-5-answers-C">C) Tu commences à parler des différents types de gaz </label>
                </div>

                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" />
                    <label for="question-5-answers-D">D) Tu comptes sur ton humour (parfois vaseux) </label>
                </div>

                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-E" value="E" />
                    <label for="question-5-answers-E">E) Tu n'as pas besoin de l'aborder, il/elle vient à toi directement  </label>
                </div>

                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-F" value="F" />
                    <label for="question-5-answers-F">F) Tu lui fais de grands sourires </label>
                </div>

            </li>

            <li>

                <h3>Qu’est-ce qui peut t’énerver comme jamais ? </h3>

                <div>
                    <input type="radio" name="question-6-answers" id="question-6-answers-A" value="A" />
                    <label for="question-6-answers-A">A) Qu'on pique dans ton assiette </label>
                </div>

                <div>
                    <input type="radio" name="question-6-answers" id="question-6-answers-B" value="B" />
                    <label for="question-6-answers-B">B)  Qu'on bouge tes affaires </label>
                </div>

                <div>
                    <input type="radio" name="question-6-answers" id="question-6-answers-C" value="C" />
                    <label for="question-6-answers-C">C) Qu'on ne t'écoute pas </label>
                </div>

                <div>
                    <input type="radio" name="question-6-answers" id="question-6-answers-D" value="D" />
                    <label for="question-6-answers-D">D) Qu'on déforme tes propos </label>
                </div>

                <div>
                    <input type="radio" name="question-6-answers" id="question-6-answers-E" value="E" />
                    <label for="question-6-answers-E">E) Qu'on ne te prenne pas au sérieux  </label>
                </div>

                <div>
                    <input type="radio" name="question-6-answers" id="question-6-answers-F" value="F" />
                    <label for="question-6-answers-F">F) Qu'on maltraite les animaux et l'environnement </label>
                </div>

            </li>
            <br> <br>
            <input class="pill" type="submit" name = " Valider " >
            <input class="pill" type="reset" name=" Effacer " >

        </ul>
    </form>
</div>
</body>
</html>




