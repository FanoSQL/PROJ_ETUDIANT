<?php
require_once "config/config.php";
include_once "fonctions/MesFonctions.php";
//
$FK_IdProduit=0;//Init
if (isset($_GET["idprod"]) && !empty($_GET["idprod"])) {
    $FK_IdProduit= $_GET["idprod"];//Identifiant du produit
} else {
    header("location:Liste_boutique.php");
}


$Qte =1;
$TVA = 0.20;//TTC
//---- Créer la requête = Obtenir le produit...
$SQL_PRODUIT ="SELECT * FROM produit WHERE IdProduit=$FK_IdProduit";//REQUETE
$res_produit_trouve = mysqli_query($data,$SQL_PRODUIT);//EXEC
$tableau_produit = mysqli_fetch_assoc($res_produit_trouve);//TABLEAU
$Libelle = $tableau_produit["Libelle"];//RECUP
$Prix = $tableau_produit["Prix"];//RECUP
$TotalHT = ($Prix*$Qte);
$TotalTTC = $TotalHT+($TotalHT*$TVA);
//-------------------------------------------
session_start();
//$FK_IdClient = $_SESSION["IdClient"];
if (isset($_SESSION["IdClient"]) && !empty($_SESSION["IdClient"])) {
    $FK_IdClient= $_SESSION["IdClient"];//Identifiant du produit
} else {
    header("location:admin/index.php");
}
print $FK_IdClient;

$IntituleCommande = "Commande ".$_SESSION["NomClient"]." ".$_SESSION["PrenomClient"];
$DateCommande = date("Ymd");
//--------
//1. Je crée la commande
$SQL_INSERT = "INSERT INTO commande (FK_IdClient, DateCommande, TitreCommande, EstValider, EstTraiter)
 VALUES ('$FK_IdClient', '$DateCommande', '$IntituleCommande', 0, 0)";
print $SQL_INSERT;
 $res_insert = mysqli_query($data,$SQL_INSERT);
 $FK_IdCommande = mysqli_insert_id($data);//Dernier ID de la commande

 if ($res_insert) {
    //2. créer le détail de la commande
    $SQL_INSERT_DET_COMMANDE = "INSERT INTO det_commande (FK_IdProduit, FK_IdClient, FK_IdCommande, Libelle, Prix, Qte, TVA, TotalHT)
    VALUES ('$FK_IdProduit', '$FK_IdClient', '$FK_IdCommande', '$Libelle', '$Prix', '$Qte', '$TVA', '$TotalHT')";
    print $SQL_INSERT_DET_COMMANDE;


    $res_detail = mysqli_query($data,$SQL_INSERT_DET_COMMANDE);
    if ($res_detail) {//Nombre d'article dans le panier
        $COUNT_PANIER = "SELECT * FROM det_commande WHERE FK_IdClient=$FK_IdClient";
        $res_nbpanier = mysqli_query($data,$COUNT_PANIER);
        $NbArticlePanier = mysqli_num_rows($res_nbpanier);//Nombre d'article dans le panier
    }
}


?>