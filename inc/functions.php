<?php
function besked($besked) {
    echo '<script>alert("' . $besked . '");</script>';
}
function nyside($link) {
    echo '<script>location.href="' . $link . '"</script>';
}

function opret($link, $brugernavn, $email, $kodeord, $personlighedstype) {
    
    $kodeord = password_hash($kodeord, PASSWORD_DEFAULT);
    
    mysqli_query($link, "INSERT INTO bruger (brugernavn, email, kodeord, personlighedstype) VALUES ('{$brugernavn}', '{$email}', '{$kodeord}', '{$personlighedstype}')");
    
    if(mysqli_affected_rows($link) > 0) {
        besked("Din bruger er nu oprettet.");
    } else {
        besked("Brugernavn eller email eksistere allerede. Prøv igen.");
    }
}

function logind($link, $brugernavn, $kode) {
    $hentbruger = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM bruger WHERE brugernavn='{$brugernavn}'"));
    if(password_verify($kode, $hentbruger["kodeord"])) {
        $_SESSION["logind"] = 1;
        $_SESSION["brugernavn"] = $brugernavn;
        $_SESSION["personlighedstype"] = $hentbruger["personlighedstype"];
        besked("Du er nu logget ind."); 
        nyside("ditwoman.php");
    } else {
        besked("Forkert kodeord.");
    }
}
?>