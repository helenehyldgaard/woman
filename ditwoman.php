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
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

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
                        <a class="logo" href="index.php"> <img src="img/dit-woman-logo2.png"></a>
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
                            <div class="p-2"><a href="video.php" class="text-muted">Video</a></div>
                            <div class="p-2"><a href="sex.php" class="text-muted">Sex</a></div>
                            <div class="p-2"><a href="#" class="text-muted">Dit Woman</a></div>
                            <div class="p-2"><a href="sundhed.php" class="text-muted">Sundhed</a></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-end">
                            <a class="p-2 text-muted soegKnap" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
                            </a>

                            <?php
                            if(isset($_SESSION["logind"]) && $_SESSION["logind"] == 1) {
                            ?>
                            <a href="logud.php"><button class="btn btn-sm btn-outline-secondary">Log ud</button></a>

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
            <div class="row mb-2">
                <?php
                if($_SESSION["personlighedstype"] == 1){
                ?>
                <!-- Sex artikler -->
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">SEX</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="sexartikel.php">Du skal aldrig få dårlig samvittighed over disse 10 ting i sengen</a>
                            </h3>
                            <p class="card-text mb-auto">Nummer fem burde være noget, vi alle gjorde oftere...</p>
                            <a href="sexartikel.php" class="read-more">Læs mere</a>
                        </div>
                        <img src="img/sex-artikel.png" alt="Et par ligger i sengen">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success">SEX</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="bananartikel.php">Sådan her giver du en pæn hentydning i sengen</a>
                            </h3>
                            <p class="card-text mb-auto">Det er altså ikke så pinligt...</p>
                            <a href="bananartikel.php" class="read-more">Læs mere</a>
                        </div>
                        <img src="img/sex1.png" alt="Kærester">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">SEX</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="sexartikel.php">7 sæt undertøj, som han vil blive superglad for, at du tager på</a>
                            </h3>
                            <p class="card-text mb-auto">Du har udentvivl et godt et liggende i skabet...</p>
                            <a href="sexartikel.php" class="read-more">Læs mere</a>
                        </div>
                        <img src="img/sex2.png" alt="Kærester">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success">SEX</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="bananartikel.php">Derfor kan vi godt lide en trænet overkrop</a>
                            </h3>
                            <p class="card-text mb-auto">Det er meget mere end bare en mave...</p>
                            <a href="bananartikel.php" class="read-more">Læs mere</a>
                        </div>
                        <img src="img/sex3.png" alt="Krop">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">SEX</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="sexartikel.php">Du skal ikke bekymre dig om disse 5 ting i sengen</a>
                            </h3>
                            <p class="card-text mb-auto">Især ikke nummer to...</p>
                            <a href="sexartikel.php" class="read-more">Læs mere</a>
                        </div>
                        <img src="img/sex4.png" alt="Bekymret pige">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success">SEX</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="bananartikel.php">4 nemme måder at se meget mere sexet ud på dansegulvet</a>
                            </h3>
                            <p class="card-text mb-auto">Start med en god portion selvtillid...</p>
                            <a href="bananartikel.php" class="read-more">Læs mere</a>
                        </div>
                        <img src="img/sex5.png" alt="Kærester">
                    </div>
                </div>
                <?php
                } elseif($_SESSION["personlighedstype"] == 2){
                ?>
                <!-- Sundhed artikler -->
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">SUNDHED</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="sexartikel.php">5 myter, du ikke anede om appelsinhud</a>
                            </h3>
                            <p class="card-text mb-auto">Det er helt normalt at have...</p>
                            <a href="sexartikel.php" class="read-more">Læs mere</a>
                        </div>
                        <img src="img/appelsinhud.png" alt="Appelsinhud">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success">SUNDHED</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="bananartikel.php">Go bananas! Her er 5 grunde til, at bananer gør dig meget sundere</a>
                            </h3>
                            <p class="card-text mb-auto">Det er altså ikke kun rynker, som bananen forhindrer...</p>
                            <a href="bananartikel.php" class="read-more">Læs mere</a>
                        </div>
                        <img src="img/banan-artikel.png" alt="Bananer">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">SUNDHED</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="sexartikel.php">Sådan her finder du de perfekte løbesko til dig!</a>
                            </h3>
                            <p class="card-text mb-auto">Et godt løb kræver gode løbesko...</p>
                            <a href="sexartikel.php" class="read-more">Læs mere</a>
                        </div>
                        <img src="img/running.png" alt="Løbesko">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success">SUNDHED</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="bananartikel.php">Tomat og basillikum tærte har aldrig smagt bedre med denne opskrift</a>
                            </h3>
                            <p class="card-text mb-auto">You're gonna love it...</p>
                            <a href="bananartikel.php" class="read-more">Læs mere</a>
                        </div>
                        <img src="img/taerte.png" alt="Tærte">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">SUNDHED</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="sexartikel.php">Træner du dine arme korrekt? Læs her hvilke øvelser der gavner dig bedst</a>
                            </h3>
                            <p class="card-text mb-auto">Nogle af øvelserne behøver du ikke engang en vægt...</p>
                            <a href="sexartikel.php" class="read-more">Læs mere</a>
                        </div>
                        <img src="img/styrke.png" alt="Træning">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success">SUNDHED</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="bananartikel.php">Nu kan du lave dine egne sunde sommer-is lynhurtigt!</a>
                            </h3>
                            <p class="card-text mb-auto">Så er sommeren reddet...</p>
                            <a href="bananartikel.php" class="read-more">Læs mere</a>
                        </div>
                        <img src="img/sommeris.png" alt="Sommer-is">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">SUNDHED</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="sexartikel.php">Træt af havregrød? Her er 5 lækre alternativer, du må prøve</a>
                            </h3>
                            <p class="card-text mb-auto">Luksushavregrød med æbletern og karamel...</p>
                            <a href="sexartikel.php" class="read-more">Læs mere</a>
                        </div>
                        <img src="img/havremad.png" alt="Havregrød">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success">SUNDHED</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="bananartikel.php">Elsker du madpandekager? Nu kan de blive pivsunde </a>
                            </h3>
                            <p class="card-text mb-auto">Med samme gode smag...</p>
                            <a href="bananartikel.php" class="read-more">Læs mere</a>
                        </div>
                        <img src="img/kaalrulle.png" alt="Kålrulle med fyld">
                    </div>
                </div>
            </div>
        </div>
        <?php
                } elseif($_SESSION["personlighedstype"] == 3){
        ?>
        <!-- Sex og sundhed artikler -->
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">SUNDHED</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="sexartikel.php">5 myter, du ikke anede om appelsinhud</a>
                    </h3>
                    <p class="card-text mb-auto">Det er helt normalt at have...</p>
                    <a href="sexartikel.php" class="read-more">Læs mere</a>
                </div>
                <img src="img/appelsinhud.png" alt="Appelsinhud">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-success">SUNDHED</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="bananartikel.php">Go bananas! Her er 5 grunde til, at bananer gør dig meget sundere</a>
                    </h3>
                    <p class="card-text mb-auto">Det er altså ikke kun rynker, som bananen forhindrer...</p>
                    <a href="bananartikel.php" class="read-more">Læs mere</a>
                </div>
                <img src="img/banan-artikel.png" alt="Bananer">
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">SUNDHED</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="sexartikel.php">Sådan her finder du de perfekte løbesko til dig!</a>
                        </h3>
                        <p class="card-text mb-auto">Et godt løb kræver gode løbesko...</p>
                        <a href="sexartikel.php" class="read-more">Læs mere</a>
                    </div>
                    <img src="img/running.png" alt="Løbesko">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-success">SUNDHED</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="bananartikel.php">Tomat og basillikum tærte har aldrig smagt bedre med denne opskrift</a>
                        </h3>
                        <p class="card-text mb-auto">You're gonna love it...</p>
                        <a href="bananartikel.php" class="read-more">Læs mere</a>
                    </div>
                    <img src="img/taerte.png" alt="Tærte">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">SEX</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="sexartikel.php">Du skal aldrig få dårlig samvittighed over disse 10 ting i sengen</a>
                        </h3>
                        <p class="card-text mb-auto">Nummer fem burde være noget, vi alle gjorde oftere...</p>
                        <a href="sexartikel.php" class="read-more">Læs mere</a>
                    </div>
                    <img src="img/sex-artikel.png" alt="Et par ligger i sengen">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-success">SEX</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="bananartikel.php">Sådan her giver du en pæn hentydning i sengen</a>
                        </h3>
                        <p class="card-text mb-auto">Det er altså ikke så pinligt...</p>
                        <a href="bananartikel.php" class="read-more">Læs mere</a>
                    </div>
                    <img src="img/sex1.png" alt="Kærester">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">SEX</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="sexartikel.php">7 sæt undertøj, som han vil blive superglad for, at du tager på</a>
                    </h3>
                    <p class="card-text mb-auto">Du har udentvivl et godt et liggende i skabet...</p>
                    <a href="sexartikel.php" class="read-more">Læs mere</a>
                </div>
                <img src="img/sex2.png" alt="Kærester">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-success">SEX</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="bananartikel.php">Derfor kan vi godt lide en trænet overkrop</a>
                    </h3>
                    <p class="card-text mb-auto">Det er meget mere end bare en mave...</p>
                    <a href="bananartikel.php" class="read-more">Læs mere</a>
                </div>
                <img src="img/sex3.png" alt="Krop">
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="velkommen"><center>Bliv en del af universet – snak med de andre DitWoman-brugere <a href="https://www.facebook.com/DitWoman/">her!</a></center></div>
            </div>
        </div>
        <?php
                }
        ?>
        </div>

    <?php
    if(!isset($_SESSION["logind"])){
        nyside("index.php");
        die();
    }
    ?>





    <?php
    include("footer.php");
    ?>