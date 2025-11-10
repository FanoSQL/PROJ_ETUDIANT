<?php
$serveur="localhost";
$user = "root";
$pwd = "";
$bdd = "mabase";
$port="3307";
//
$connexion = mysqli_connect($serveur,$user,$pwd,$bdd,$port);

if ($connexion) {
//Traitement
} else {
//Autre traitement...
}

//COMPTEUR....
for ($i=1;$i<=5;$i++) {
//--------
}

?>