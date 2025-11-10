<?php
//------INCLURE LE COMPOSANT DE CONNEXION DANS ALBUM PHP
require_once "common/conn.php";
//-------------------------------------------------------

/*
LA CONNEXION EST FAITE DONC, MAINTENANT JE VAIS CREER LA REQUETE
*/
//A. Créer une variable qui contient le langage SQL
$SQL_SELECT = "SELECT * FROM album";
//B. Je vais utiliser la commande mysqli_query d'exécution de la requête...
$res = mysqli_query($conn,$SQL_SELECT);
if ($res) {//TOUT EST OK
    
    //mysqli_fetch_assoc  construit un tableau à deux entrées : associatif
    while($MonAlbum = mysqli_fetch_assoc($res)) {
    //$MonAlbum  est un tableau, il s'écrit avec des crochets [] / array()
    //Le nom dans les crochets doit correspondre à un nom de colonne dans la table
    //--->print "<img src='photos/".$MonAlbum["NomImage"]."'>";
    $NomImage = $MonAlbum["NomImage"];//STOCKER LE NOM DE L'IMAGE DANS la variable
    //INCLUDE peut être utilisé plusieurs fois, alors que l'include once une fois...
    include "liste_image.php";

    }


} else {//PROBLEME
    print "<h1>Le système à provoqué une erreur !</h1>";
}



?>