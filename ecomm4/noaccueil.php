<?php
/*      ETAPE B */
//-------------------- COMPO BDD
require_once "config/connexion.php";
//-----------------------

//Paramètre barre d'adresse = article
$IdProduit = 0;
//
if (isset($_GET["article"]) && !empty($_GET["article"])) {
    $IdProduit = $_GET["article"];
} else {
    header("location:index.php?error=105");//Reselectionne le bon produit
}


