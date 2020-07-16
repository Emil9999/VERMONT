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


    <body class="main">


    <div class="container" >
        <img src="assets/Himym1.jpg" alt="Notebook" style="width:100%;">
        <div class="content">
            <h1>  SAURAS-TU RÉPONDRE CORRECTEMENT ? </h1>
            <p>Découvre-le tout de suite avec ce test !</p>
        </div>
    </div>


    <?php
    if  (isset($_SESSION['rt'])) {

        if (isset($_SESSION['question-1-answers']) && isset($_SESSION['question-2-answers']) && isset($_SESSION['question-3-answers']) &&
            isset($_SESSION['question-4-answers']) && isset($_SESSION['question-5-answers']) ) {
            $x = $_SESSION['rt'];
            echo " <html> <br> <br> <br>  <div class=\"callout\">
                     <div class=\"callout-header\"> Votre score est de $x / 5 ! </div>
                     <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                     <div class=\"callout-container\">
                     <p> <img src='https://media.giphy.com/media/l1J3F47tzXOa64BTq/giphy.gif' alt='...' </p>
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
    <form action="ReponsesHimym.php" method="post" id="quiz">
        <br> <br>
        <ul>
            <li>

                <h3>Qui joue le rôle de Barney Stinson ? </h3>

                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                    <label for="question-1-answers-A">A) Brad Pitt </label>
                </div>

                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                    <label for="question-1-answers-B">B) Josh Randor </label>
                </div>

                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                    <label for="question-1-answers-C">C) Neil Patrick Harris </label>
                </div>

                <div>
                    <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                    <label for="question-1-answers-D">D) Jason Segel </label>
                </div>

            </li>

            <li>

                <h3> Selon Barney, combien de temps faut-il attendre avant de rappeler une fille ? </h3>

                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                    <label for="question-2-answers-A">A) Un jour </label>
                </div>

                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                    <label for="question-2-answers-B">B) Une semaine </label>
                </div>

                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                    <label for="question-2-answers-C">C) 12 heures </label>
                </div>

                <div>
                    <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
                    <label for="question-2-answers-D">D) Trois jours </label>
                </div>

            </li>

            <li>

                <h3> Dans quelle ville américaine se déroule la série ?  </h3>

                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                    <label for="question-3-answers-A">A) Dallas </label>
                </div>

                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                    <label for="question-3-answers-B"> B) Californie </label>
                </div>

                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                    <label for="question-3-answers-C">C) New York </label>
                </div>

                <div>
                    <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
                    <label for="question-3-answers-D">D) Ohio </label>
                </div>

            </li>

            <li>

                <h3> Ou se rencontre toute la bande ?  </h3>

                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
                    <label for="question-4-answers-A">A) Central Perk Cafe </label>
                </div>

                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
                    <label for="question-4-answers-B">B) Mc Laren's </label>
                </div>

                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-C" value="C" />
                    <label for="question-4-answers-C">C) Fluve Street </label>
                </div>

                <div>
                    <input type="radio" name="question-4-answers" id="question-4-answers-D" value="D" />
                    <label for="question-4-answers-D">D) Quiet Man </label>
                </div>

            </li>

            <li>

                <h3> Quel est le métier de Ted Mosby ? </h3>

                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
                    <label for="question-5-answers-A">A) Architecte </label>
                </div>

                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
                    <label for="question-5-answers-B">B) Medecin </label>
                </div>

                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
                    <label for="question-5-answers-C">C) Avocat </label>
                </div>

                <div>
                    <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" />
                    <label for="question-5-answers-D">D) Journaliste </label>
                </div>

            </li>
            <br> <br>

            <input class="pill" type="submit" name = " Valider " >
            <input class="pill" type="reset" name=" Effacer " >
        </ul>


    </form>
    </body>
    </html>

