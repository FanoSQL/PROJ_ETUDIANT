<?php
require_once "config/MesFonctions.php";
$conn = ConnectMySQLi();
//------------------------
if (isset($_POST["email"]) && !empty($_POST["MotDePasse"])) {
    $NbTrouver = Login($conn,$_POST["email"],$_POST["MotDePasse"]);
} else {
    $NbTrouver = 0;
    header("location:login.php?erro=100");
}
?>