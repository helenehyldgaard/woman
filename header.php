<?php
include("inc/dbcon.php");
include("inc/functions.php");
if(isset($_POST["opret"])){
    $brugernavn = filter_input(INPUT_POST, 'brugernavn', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) or die("ugyldig email adresse");
    $kodeord = filter_input(INPUT_POST, 'kodeord');
    $personlighedstype = filter_input(INPUT_POST, 'personlighedstype', FILTER_SANITIZE_STRING);

    opret($link, $brugernavn, $email, $kodeord, $personlighedstype);
}
if(isset($_POST["logind"])){
    $brugernavn = filter_input(INPUT_POST, 'brugernavnlogind', FILTER_SANITIZE_STRING);
    $kodeord = filter_input(INPUT_POST, 'kodeordlogind');

    logind($link, $brugernavn, $kodeord);
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Woman</title>

        <link rel="icon" type="image/png" href="img/woman-logo2.png"/>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Fontawesome ikoner -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
        <link href="blog.css" rel="stylesheet">
        <link href="signin.css" rel="stylesheet">

        <!-- Stylesheet -->
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <div class="container">
            <header class="blog-header py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-12 text-center logo">
                        <a class="logo" href="index.php"> <img src="img/woman-logo2.png"></a>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="logindBoks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Log ind</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="loginBrugernavn">Brugernavn</label>
                                        <input type="text" name="brugernavnlogind" class="form-control" id="loginBrugernavn" placeholder="Brugernavn" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="loginKodeord">Kodeord</label>
                                        <input type="password" name="kodeordlogind" class="form-control" id="loginKodeord" placeholder="Kodeord" required>
                                    </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="logind">Log ind</button>
                                    </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Luk</button>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container menuContainer">
                <div class="row">
                    <div class="col">
                        <div class="d-flex flex-row justify-content-between MenuLinks">
                            <div class="p-2"><a href="video.php"<?php if($filNavn == "video.php"){ echo " class=\"active\""; } ?> class="text-muted">Video</a></div>
                            <div class="p-2"><a href="sex.php"<?php if($filNavn == "sex.php"){ echo " class=\"active\""; } ?> class="text-muted">Sex</a></div>
                            <div class="p-2"><a href="ditwoman.php"<?php if($filNavn == "ditwoman.php"){ echo " class=\"active\""; } ?> class="text-muted">Dit Woman</a></div>
                            <div class="p-2"><a href="sundhed.php"<?php if($filNavn == "sundhed.php"){ echo " class=\"active\""; } ?> class="text-muted">Sundhed</a></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-end">
                            <a class="p-2 text-muted soegKnap" href="soeg.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
                            </a>

                            <?php
                            if(isset($_SESSION["logind"]) && $_SESSION["logind"] == 1) {
                            ?>
                            <a href="logud.php" class="btn btn-sm btn-outline-secondary">
                                Log ud
                            </a>
                            <?php
                            } else {
                            ?>
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#logindBoks">
                                Log ind
                            </button>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>