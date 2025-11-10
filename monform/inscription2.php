<?php

//SECURITE DE BASE AVEC ISSET
if (isset($_POST["sNom"]) && !empty($_POST["sNom"])) {
    $Nom = $_POST["sNom"];
} else {
    //$Nom = "Vous devez saisir le nom";//FACILE  Méthode 1
    header("location:form.php?erreur=2");//Intermédiaire Méthode 2
}
//isset c'est pour s'assurer que la variable a bien été déclarée..

if (isset($_POST["sPrenom"]) && !empty($_POST["sPrenom"])) {
    $Prenom = $_POST["sPrenom"];
} else {
    //$Prenom = "Vous devez saisir le prénom";//FACILE  Méthode 1
    header("location:form.php?erreur=3");//Intermédiaire Méthode 2
}

?>

<h1><?=$Nom." ".$Prenom;?></h1>