<?php
session_start();
?>
<!doctype html>
<div lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="./node_modules/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <title>Login</title>

    </head>
</div>

<body>
<style>
    body {
        background-image: url("assets/space.jpg");
        position: center;
        width: 100%;
        background-repeat: no-repeat;
        background-size: cover;


    }
</style>

<div class="bgimg">
    <?php
    include_once 'commun/header.php';
    ?>

    <div class="container">
        <div class="topright" style=" position: absolute;
    top: 0;
    right: 16px;
    font-size: 20px;
    color: white">
            <br>
            <p> Nouveau sur le site ? </p>
            <a href="signup.php">
                <button type="button" class="btn btn-dark">S'inscrire</button>
            </a>
        </div>
        <script>
            $(document).ready(function () {
                $('.toast').toast('show');
            });
        </script>
        <div class="toast
            <?php if ($_SESSION['errorMessage']) {
            echo "show";
        } ?>
    " role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true">

            <div class="toast-header">
                <strong class="mr-auto">Attention ! </strong>
                </button>
            </div>
            <div class="toast-body">
                <?php if ($_SESSION['errorMessage']) {
                    echo $_SESSION['errorMessage'];
                    unset($_SESSION['errorMessage']);
                } ?>
            </div>
        </div>
        <form method="post" action="handleLogin.php" _lpchecked="1" class="loginForm">
            <fieldset>
                <h1 style="color: white"><strong> Se connecter </strong></h1> <br>

                <div class="form-group">
                    <label for="exampleInputUsername" style="color: white; font-weight: bold">Username</label>
                    <input
                            type="text"
                            class="form-control"
                            id="exampleInputUsername"
                            name="username"
                            aria-describedby="UsernameHelp"
                            placeholder="Enter email"
                            style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                    <small id="UsernameHelp" class="form-text text-muted">We'll never share your username with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" style="color: white; font-weight: bold">Mot de passe </label>
                    <input
                            type="password"
                            class="form-control"
                            name="password"
                            id="exampleInputPassword1"
                            placeholder="Password"
                            style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                </div>
                <div
                <a href="handleLogin.php">
                    <button type="submit" class="btn btn-primary">Login</button>
                </a>
            </fieldset>
        </form>
    </div>
</div>

</body>

<script src="assets/js/script.js"></script>
</html>