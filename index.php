<?php
include("header.php");
?>
<div class="jumbotron p-3 p-md-5 UgensMest">
    <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">Ugens mest læste</h1>
        <p class="lead my-3">5 sexstillinger til dig, der vil gøre badeværelsessex endnu bedre. Hvis I også har et badekar, så bliver det rigtigt sjovt!
        </p>
        <p class="lead mb-0"><a href="ugensmest.php" class="text-white font-weight-bold">Læs mere...</a></p>
    </div>
</div>

<div class="row mb-2">
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
</div>
<div class="container-fluid opretForm">
    <div class="container">
        <div class="row">
        <h1 class="h3 mb-3 font-weight-normal opretOverskrift text-center" style="display: block; margin: 0 auto;">Opret din woman</h1>
        </div>
            <form class="form-signin row" action="" method="post">
        <div class="col">
            <h2 class="h4 mt-2 mb-2 font-weight-normal">Brugeroplysninger</h2>
            <label for="inputUser" class="sr-only">Brugernavn</label>
            <input type="text" id="inputUser" class="form-control" placeholder="Brugernavn" name="brugernavn" required>

            <label for="inputEmail" class="sr-only">E-mail adresse</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="E-mail adresse" name="email" required>

            <label for="inputPassword" class="sr-only">Kodeord</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Kodeord" name="kodeord" required>
        </div>
        <div class="col">
            <h2 class="h4 mt-2 mb-2 font-weight-normal">Personlighedstest</h2>

            <div>
                <input id="sex" name="personlighedstype" type="radio" value="1">
                <label class="" for="credit">Spørgsmål sex</label>
            </div>
            <div>
                <input id="sundhed" name="personlighedstype" type="radio" value="2">
                <label class="" for="debit">Spørgsmål sundhed</label>
            </div>
            <div>
                <input id="sexogsundhed" name="personlighedstype" type="radio" value="3">
                <label class="" for="paypal">Spørgsmål sex og sundhed</label>
            </div>
            <button class="btn mt-2 btn-lg btn-primary btn-block" type="submit" name="opret">Opret konto</button>
        </div>
            </form>
    </div>
<?php
include("footer.php");
?>