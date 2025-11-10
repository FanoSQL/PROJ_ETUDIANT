<?php
//--------- Composant d'accès à la base de données
require_once "config/connexion.php";
//-----------------------------------------------
$Libelle = "";
$NomPhoto = "";
$Description = "";
$PrixTTC = 0;
$Stock = 0;
//
if(isset($_POST["sLibelle"]) && !empty($_POST["sLibelle"])) {
    $Libelle = htmlspecialchars($_POST["sLibelle"]); // iSQL sécurité (transforme les caractères dangereux en caractères HTML)
} else {
    header("location:form_produit.php?error=105");
}

if(isset($_POST["sPhoto"]) && !empty($_POST["sPhoto"])) {
    $NomPhoto = htmlspecialchars($_POST["sPhoto"]); // iSQL sécurité (transforme les caractères dangereux en caractères HTML)
} else {
    header("location:form_produit.php?error=106");
}

if(isset($_POST["sPrix"]) && !empty($_POST["sPrix"])) {
    $PrixTTC = htmlspecialchars($_POST["sPrix"]); // iSQL sécurité (transforme les caractères dangereux en caractères HTML)
} else {
    header("location:form_produit.php?error=107");
}

if(isset($_POST["sDescription"]) && !empty($_POST["sDescription"])) {
    $Description = htmlspecialchars($_POST["sDescription"]); // iSQL sécurité (transforme les caractères dangereux en caractères HTML)
} 

if(isset($_POST["sStock"]) && !empty($_POST["sStock"])) {
    $Stock = htmlspecialchars($_POST["sStock"]); // iSQL sécurité (transforme les caractères dangereux en caractères HTML)
}

//1. Code SQL
$SQL_PRODUIT = "INSERT INTO produit (Libelle, Description, Photo, Prix, Stock) 
VALUES ('$Libelle', '$Description', '$NomPhoto', '$PrixTTC', '$Stock')";

//2. Execution
$res = mysqli_query($conn, $SQL_PRODUIT);

//3.Test resultat
if($res) {
    header("location:form_produit.php");
}