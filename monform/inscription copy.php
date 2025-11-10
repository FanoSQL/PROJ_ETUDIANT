<?php

//print "Hello le monde !";
if(isset($_POST["sNom"])) {
    $Nom = $_POST["sNom"];
} else {
    $Nom = "Nom : Formulaire incorrecte...<br>";
}

if(isset($_POST["sPrenom"])) {
    $Prenom = $_POST["sNsPrenom"];
} else {
    $Prenom = "Prénom : Formulaire incorrecte...<br>";
}



?>

<h2><?=$Nom;?></h2>