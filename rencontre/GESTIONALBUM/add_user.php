<?php
//---- Intégrer un composant de base de données relationnelle
include_once "conn.php";
//--------------------------------


if (isset($_POST["sIdentifiant"])) {
    $login = $_POST["sIdentifiant"];
}

if (isset($_POST["sMotDePasse"])) {
    $password = $_POST["sMotDePasse"];
}

//print $login;
//print $password;

$SQL_INSERT = "INSERT INTO users (Identifiant, MotDePasse) VALUES ('$login','$password')";
$ResultatCommande = mysqli_query($conn,$SQL_INSERT);
if ($ResultatCommande) {//TOUT EST BON
    header("location:admin_user.php");
} else {//ERREUR
    header("location:admin_user.php?erreur=100");
}
?>