<?php
/*      ETAPE B */
//-------------------- COMPO BDD
require_once "config/connexion.php";
//-----------------------

//Paramètre barre d'adresse = article
$IdProduit = 0;
//
if (isset($_GET["log"]) && !empty($_GET["log"])) {
    $IdProduit = $_GET["article"];
} else {
    header("location:accueil.php?log=1");//redirige ver un supposé LOG...
}


?>