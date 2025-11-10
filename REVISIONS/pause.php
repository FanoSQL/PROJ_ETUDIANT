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

//1. Créer la requete   
$SQL_UPDATE = "UPDATE locataire SET Suspendu='1' WHERE IdLocataire=$id";
//2. Exécuter la requête
$res = mysqli_query($conn,$SQL_UPDATE);
//------Vérifier dans l'agenda
if($res) {
   $SQL_UPDATE_AGENDA = "UPDATE suivi_loyer SET Suspendu='1' WHERE IdLocataire=$id";
    //2. Exécuter la requête
    $res_agenda = mysqli_query($conn,$SQL_UPDATE_AGENDA);
}

//----------------------------


if($res_agenda) {//OK
    header("location:liste_locataire.php?error=105");
} else {//ERREUR
    header("location:liste_locataire.php?error=104");
}

?>