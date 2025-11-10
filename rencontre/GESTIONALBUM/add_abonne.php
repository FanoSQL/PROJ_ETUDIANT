<?php
//---- Intégrer un composant de base de données relationnelle
include_once "conn.php";
//--------------------------------
if (isset($_POST["sNom"])) {
    $Nom = $_POST["sNom"];
}

if (isset($_POST["sPrenom"])) {
    $Prenom = $_POST["sPrenom"];
}

if (isset($_POST["sEmail"])) {
    $Email = $_POST["sEmail"];
}

if (isset($_POST["sMotDePasse"])) {
    $MotDePasse = $_POST["sMotDePasse"];
}
//-------------------------------
$SQL_INSERT = "INSERT INTO inscription (Nom, Prenom, Email, MotDePasse)
 VALUES ('$Nom', '$Prenom', '$Email', '$MotDePasse')";

 $ResultatCommande = mysqli_query($conn,$SQL_INSERT);
 if($ResultatCommande) {
    header("location:mesinscrits.php");
 } else {
   header("location:mesinscrits.php?erreur=100");
 }
?>