<?php
//---- Paramètres de connexion...
$erveur = "localhost";
$username = "root";
$password = "";
$database = "BddGestion";
//---- Commande de connexion à la base de données BddGestion
$conn = mysqli_connect($erveur,$username,$password,$database);
//---- On vérifie que la connexion à réussie...
if ($conn) {
    print "La connexion a réussie...<br>";
} else {
    print "La connexion a échoué...<br>";
}
//------------------
?>
