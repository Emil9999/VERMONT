<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="Q.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<?php
include 'Commun/header.php';
?>

<body class="main">


<div class="container">
    <img src="assets/Casa1.jpg" alt="Notebook" style="width:100%;">
    <div class="content">
        <h1> SAURAS-TU RÉPONDRE CORRECTEMENT ? </h1>
        <p>Découvre-le tout de suite avec ce test !</p>
    </div>
</div>


<?php
if (isset($_SESSION['rt'])) {

    if (isset($_SESSION['question-1-answers']) && isset($_SESSION['question-2-answers']) && isset($_SESSION['question-3-answers']) &&
        isset($_SESSION['question-4-answers']) && isset($_SESSION['question-5-answers'])) {
        $x = $_SESSION['rt'];
        echo " <html> <br> <br> <br>  <div class=\"callout\">
                     <div class=\"callout-header\"> Votre score est de $x / 5 ! </div>
                     <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                     <div class=\"callout-container\">
                     <p> <img src='https://media.giphy.com/media/vbPzAifIrGycdxnvsO/giphy.gif' alt='...' </p>
                     </div>
                     </div> </html> ";
        session_destroy();
    } else {
        echo "<script>alert('Attention ! Vous n avez pas répondu à toutes les questions ') </script>";
        session_destroy();
    }
}

?>

<form action="ReponsesCasa.php" method="post" id="quiz">
    <ul class="hide">

        <br> <br>
        <li>

            <h3>Qui sont le père et le fils dans le groupe de cambrioleurs ?</h3>

            <div>
                <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A"/>
                <label for="question-1-answers-A">A) Oslo et Berlin </label>
            </div>

            <div>
                <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B"/>
                <label for="question-1-answers-B">B) Denver et Moscou </label>
            </div>

            <div>
                <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C"/>
                <label for="question-1-answers-C">C) Rio et Moscou </label>
            </div>

            <div>
                <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D"/>
                <label for="question-1-answers-D">D) Denver et Berlin </label>
            </div>

        </li>

        <li>

            <h3> Dans quelle ville se situe la fabrique ? </h3>

            <div>
                <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A"/>
                <label for="question-2-answers-A">A) Madrid </label>
            </div>

            <div>
                <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B"/>
                <label for="question-2-answers-B">B) Lisbonne </label>
            </div>

            <div>
                <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C"/>
                <label for="question-2-answers-C">C) Seville </label>
            </div>

            <div>
                <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D"/>
                <label for="question-2-answers-D">D) Paris </label>
            </div>

        </li>

        <li>

            <h3> Comment s'appelle le jeu que Tokyo veut jouer avec Berlin ? </h3>

            <div>
                <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A"/>
                <label for="question-3-answers-A">A) La grande roue </label>
            </div>

            <div>
                <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B"/>
                <label for="question-3-answers-B"> B) La roulette chinoise </label>
            </div>

            <div>
                <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C"/>
                <label for="question-3-answers-C">C) La roulette russe </label>
            </div>

            <div>
                <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D"/>
                <label for="question-3-answers-D">D) Le manège </label>
            </div>

        </li>

        <li>

            <h3> Quel est le surnom d'Arturo ? </h3>

            <div>
                <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A"/>
                <label for="question-4-answers-A">A) Artutu </label>
            </div>

            <div>
                <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B"/>
                <label for="question-4-answers-B">B) Arturico </label>
            </div>

            <div>
                <input type="radio" name="question-4-answers" id="question-4-answers-C" value="C"/>
                <label for="question-4-answers-C">C) Artutiro </label>
            </div>

            <div>
                <input type="radio" name="question-4-answers" id="question-4-answers-D" value="D"/>
                <label for="question-4-answers-D">D) Arturito </label>
            </div>

        </li>

        <li>

            <h3> Comment s'appelle le titre du générique de la Casa de Papel ? </h3>

            <div>
                <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A"/>
                <label for="question-5-answers-A">A) My life is coin of </label>
            </div>

            <div>
                <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B"/>
                <label for="question-5-answers-B">B) My life is going on </label>
            </div>

            <div>
                <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C"/>
                <label for="question-5-answers-C">C) La casa de papel </label>
            </div>

            <div>
                <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D"/>
                <label for="question-5-answers-D">D) Bella Ciao </label>
            </div>

        </li>
        <br> <br>


        <input class="pill" type="submit" name=" Valider ">
        <input class="pill" type="reset" name=" Effacer ">

    </ul>

</form>
</body>
</html>



