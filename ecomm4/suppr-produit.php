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
    header("location:select_produit.php?error=105&article=$IdProduit");//Reselectionne le bon produit
}


if ($IdProduit>0) {
//1. La requête (QBE)
$SQL_DELETE = "DELETE FROM produit WHERE IdProduit=$IdProduit";
$res = mysqli_query($conn,$SQL_DELETE);
if ($res) {//OK
    header("location:select_produit.php?OK&article=$IdProduit");//Reselectionne le bon produit
} else {//ERREUR INCONNUE / IMPREVUE
    header("location:select_produit.php?error=105&article=$IdProduit");//Reselectionne le bon produit
}


} else {
       header("location:select_produit.php?error=105&article=$IdProduit");//Reselectionne le bon produit
}

?>