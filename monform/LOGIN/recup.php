<?php
$identifiant = "";
$motdepasse = "";

if (isset($_POST["sIdentifiant"]) && !empty($_POST["sIdentifiant"])) {
    $identifiant = $_POST["sIdentifiant"];
}


if (isset($_POST["sMotDePasse"]) && !empty($_POST["sMotDePasse"])) {
    $motdepasse = $_POST["sMotDePasse"];
}


if ($identifiant=="user" && $motdepasse="1234") {
//
} else {
    //
    header("location:index.php?error=104");
}


?>


<h1>Bienvenue !</h1>