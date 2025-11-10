<?php

/*
Composant de connexion à la base de données
Usage de la commande mysqli_connect (procedurale)  /  PDO (objet)
mysli_connect = optimisé ppur la bdd mysql
PDO : mysql, oracle, postgresql, firebase, MongoDB, MariaDB, SQL Server
ODBC : Excel  (Base de données non SQL ? Access ?) <-- WINDOWS / LINUX
JDBC : Propre à java / 
*/
$server = "localhost";//127.0.0.1
$username = "stephane";//TOUT POUVOIR   / Administrateur
$password = "";//MACHINE DE DEVELOPPEMENT   / 
$database = "bddgestioni_2";
//-----------
$conn = mysqli_connect($server,$username,$password,$database);

if ($conn) {
    print "Connex à la bdd OK !";
} else {
    print "Connex à la bdd PAS OK !"; 
}

?>