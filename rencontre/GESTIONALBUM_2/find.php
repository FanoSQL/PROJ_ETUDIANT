<?php
//------INCLURE LE COMPOSANT DE CONNEXION DANS ALBUM PHP
require_once "common/conn.php";
//-------------------------------------------------------

$Chercher="";//Initialisation de la variable
//$_POST permet de récupérer les données du formulaire...
//isset permet de vérifier que la variable é été initialisée VIA le formulaire...
//$_POST["name"] : Construit un tableau dans la mémoire de l'ordinateur
if (isset($_POST["sChercher"])) {
   $Chercher = $_POST["sChercher"];
} else {
    //IMPREVU ?
    //$Chercher = "defaut";
    header("location:form.php");
    //header :location, permet de rediriger vers une autre page...
}

//print $Chercher;

//1.Composer ma variable qui va contenir la requete SQL
$SQL_SELECT = "SELECT * FROM album WHERE Categorie LIKE '%$Chercher%'";
//print $SQL_SELECT;
$res = mysqli_query($conn,$SQL_SELECT);
if ($res) {
    while($MonTableau = mysqli_fetch_assoc($res)) {
        $MaCategorie = $MonTableau["Categorie"];
        $NomImage = $MonTableau["NomImage"];
        include "liste_trouve.php";
    }
}

?>