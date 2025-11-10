<?php
require_once "../config/config.php";
//

$email="";
$pwd="";
//htmlentities()
if (isset($_POST["sEmail"]) && !empty($_POST["sEmail"])) {
    $email = htmlspecialchars($_POST["sEmail"]);
} else {
    // 
}

if (isset($_POST["sMotDePasse"]) && !empty($_POST["sMotDePasse"])) {
    $pwd = htmlspecialchars($_POST["sMotDePasse"]);
} else {
    // 
}

/*
 Ho'hara
 */
$SQL_SELECT = "SELECT * FROM client WHERE email='$email' AND MotDePasse='$pwd'";
//$SQL_SELECT = "SELECT * FROM client WHERE IdClient='$id' AND email='$email'";
//$SQL_SELECT = "SELECT * FROM client WHERE IdClient='$id' AND MotDePasse='$pwd'";
//$SQL_SELECT = "SELECT * FROM client WHERE Numclient='$NumeroClient' AND Telephone='$Telephone'";
//"SELECT * FROM client WHERE Numclient='$NumeroClient' OR (Telephone='$Telephone' AND DateDeNaissance='$DateDeNaissance')";
$res_login = mysqli_query($data,$SQL_SELECT);
$NbTrouver = mysqli_num_rows($res_login);
//TEST D'UNICITE
/*
LES SESSIONS :
$_SESSION est une variable réservée..

Elle peut-être utilisée uniquement dans le cadre d'une session.
Une session est un "espace" ou peuvent potentiellement circuler
les données/informations d'une applications...

C'est un peu la "chambre" sécurisée à l'opposée des COOKIES...

Du coup lorsqu'on utilise des sessions, il n'est pas vraiment, nécessaire d'utiliser $_GET

Une session démarre par la commande session_start()
*/
if ($NbTrouver==1) {

$client = mysqli_fetch_assoc($res_login);
session_start();//Démarre la session...
$_SESSION["IdClient"] = $client["IdClient"];//Permettre de faire le "relais" pour le "MCD"
$_SESSION["NomClient"] = $client["Nom"];
$_SESSION["PrenomClient"] = $client["Prenom"];
$_SESSION["Adresse"] = $client["Adresse1"];
$_SESSION["CodePostal"] = $client["CodePostal"];
$_SESSION["Ville"] = $client["Ville"];

header("location:accueil.php?OK&id=$idclient");

} else {//PAS BON
    header("location:index.php?error");
}


?>