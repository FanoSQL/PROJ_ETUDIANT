<?php
require_once "config/config.php";
include_once "fonctions/MesFonctions.php";
//
session_start();
//----------------------

//Déclaration de la fonction...
function ListeProd($data) {
    $SQL_LISTE_PROD = "SELECT * FROM produit";
    $res = mysqli_query($data,$SQL_LISTE_PROD);
    ///return $res;
    if ($res) {
        while($boutique = mysqli_fetch_assoc($res)) {
            $IdProd = $boutique["IdProduit"];
            $Photo = $boutique["Photo"];
            $Libelle = $boutique["Libelle"];
            $Description = $boutique["Description"];
            //---------
            include "afficher_boutique.php";
        }
    }
}
//-----------------------------

//Appel de la fonction...
//$res = ListeProd($data);
ListeProd($data);

?>
