<?php
$server="localhost";//127.0.0.1
$username = "stephane";//utilisateur avec tout pouvoir / Administrateur
$password = "";
$database = "bddgestion";
//
$conn = mysqli_connect($server,$username,$password,$database);

if ($conn) {
    //print "OK !";
} else {
    print "CONNEXION BDD ERREUR !";
}
?>