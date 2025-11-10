<?php
//------------ COMPOSANT DE CONNEXION BDD
require_once "config/connexion.php";
//---------------------------------

$IdUsers=0;
$prenom = "";
$nom = "";

if (isset($_GET["Id"]) && !empty($_GET["Id"])) {
    $IdUsers= $_GET["Id"];
}

if (isset($_GET["lang"]) && !empty($_GET["lang"])) {
    $Langue= $_GET["lang"];
}



//------- On sélectionne la personne
include_once "trouver_personne.php";
//-------------------------------


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h2>Hi ! <?=$prenom." ".$nom;?> thank's you !</h2>

    <div class="zlien">
    <!--   <a class="lien_page_suivante" href="page_5.php?ID=<?=$IdUsers;?>&lang=<?=$Langue;?>">EU - PGI CUST Trial Team</a>-->
        <a class="lien_page_suivante" href="page_5.php?Id=<?=$IdUsers;?>&lang=EU">EU - PGI CUST Trial Team</a>
        <a class="lien_page_suivante" href="page_5.php?Id=<?=$IdUsers;?>&lang=US">US - PGI CUST Trial Team</a>
    </div>



</body>
</html>



