<?php
//------------ COMPOSANT DE CONNEXION BDD
require_once "config/connexion.php";
//---------------------------------
$Password_="";
$Email="";

if (isset($_POST["sEmail"]) && !empty($_POST["sEmail"])) {
    $Email= $_POST["sEmail"];
}


if (isset($_POST["sPassword"]) && !empty($_POST["sPassword"])) {
    $Password_= $_POST["sPassword"];
} 



if (!empty($Email) &!empty($Password_)) {
//1.REQ SQL
$SQL_CHERCHER = "SELECT * FROM users WHERE Email='$Email' AND MotDePasse='$Password_'";

//2. Executer la requête
$res = mysqli_query($conn,$SQL_CHERCHER);
$NbTrouver = mysqli_num_rows($res);

if ($NbTrouver==1) {
    $Personne = mysqli_fetch_assoc($res);
    $IdUsers = $Personne["IdUsers"];
    //Trouver ON PASSE A LA PAGE SUIVANTE
    header("location:page_4.php?Id=$IdUsers");
} else {
    //On renvoie la personne vers le form de connexion
    header("location:form_connexion.php?Id=0?error=200");
}
//---------------------------



} else {

      //On renvoie la personne vers le form de connexion
      //Soucis technique ou de saisie, faille de sécurité, erreure humaine...
    header("location:form_connexion.php?error=280");
 
}