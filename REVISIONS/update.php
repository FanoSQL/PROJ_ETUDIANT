<?php
//----------------------
include_once "config/connexion.php";
//----------------------
$id=0;//Initialiser

//Récupérer les infos dans la barre d'adresse grâce à $_GET
if(isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];
} else {
    header("location:liste_locataire.php");
}
//-----------------------------

//--------------- MON POST : RECUP DATA FORM
if(isset($_POST["sNom"]) && !empty($_POST["sNom"])) {
    $Nom = $_POST["sNom"];
} else {
    header("location:liste_locataire.php");
}

if(isset($_POST["sPrenom"]) && !empty($_POST["sPrenom"])) {
    $Prenom = $_POST["sPrenom"];
}
//-----------------------------------------------

//1. Créer la requete 
$SQL_UPDATE = "UPDATE locataire SET Nom='$Nom', Prenom='$Prenom' WHERE IdLocataire=$id";
//2. Exécuter la requête
$res = mysqli_query($conn,$SQL_UPDATE);
if($res) {
    header("location:liste_locataire.php?OK");
} else {
    header("location:liste_locataire.php?POK");
}

?>