<?php
//------------ COMPOSANT DE CONNEXION BDD
require_once "config/connexion.php";
//---------------------------------
//------------ parametre de langue
require_once "config/langue.php";
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
<html lang="<?=$lang;?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire</title>
</head>
<body>
    <h2>Hi ! <?=$prenom." ".$nom;?> thank's you ask questions !</h2>

    <?php
        include_once "form_questionnaire.php";
    ?>


</body>
</html>