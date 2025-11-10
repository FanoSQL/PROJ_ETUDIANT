<?php
//---------
require_once "../config/config.php";
//---------

session_start();
$IdClient = $_SESSION["IdClient"];
//------- Liste des commandes du client
$SQL_COMMANDES_CLIENT = "SELECT * FROM commande WHERE FK_IdClient={$_SESSION["IdClient"]}";
$res_liste_commande = mysqli_query($data,$SQL_COMMANDES_CLIENT);
$NbCommande = mysqli_num_rows($res_liste_commande);
$_SESSION["NombreCommandeClient"] = $NbCommande;
//------
if ($res_liste_commande) {
    while($liste_commandes = mysqli_fetch_assoc($res_liste_commande)) {
        $IdCommande = $liste_commandes["IdCommande"];
        $DateCommande = $liste_commandes["DateCommande"];
        //Affiche la liste : VUE
        include "affiche_commande.php";//VUE / VOIR / AFFICHER
        //------------
    }
}
//-------------------------------------






?>