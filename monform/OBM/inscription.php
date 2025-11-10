<?php

if (isset($_POST["sNom"]) && !empty($_POST["sNom"])) {
    $Nom = $_POST["sNom"];
} else {
    //$Nom = "Vous devez saisir le nom";//FACILE  Méthode 1
    header("location:index.php?erreur=2");//Intermédiaire Méthode 2
}
//


if (isset($_POST["sPrenom"]) && !empty($_POST["sPrenom"])) {
    $Prenom = $_POST["sPrenom"];
} else {
    //$Nom = "Vous devez saisir le nom";//FACILE  Méthode 1
    header("location:index.php?erreur=2");//Intermédiaire Méthode 2
}

if (isset($_POST["sEmail"]) && !empty($_POST["sEmail"])) {
    $Email = $_POST["sEmail"];
} else {
    //$Nom = "Vous devez saisir le nom";//FACILE  Méthode 1
    header("location:index.php?erreur=2");//Intermédiaire Méthode 2
}


if (isset($_POST["sTelephone"]) && !empty($_POST["sTelephone"])) {
    $Telephone = $_POST["sTelephone"];
} else {
    //$Nom = "Vous devez saisir le nom";//FACILE  Méthode 1
    header("location:index.php?erreur=2");//Intermédiaire Méthode 2
}



?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Félicitations...</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<header class="nav">
    <h1 class="titrenav">Etape 2/2 : Devient O.B.M pour guider tes clients</h1>
</header>

<main class="contenu">
    <h1 class="grandtitre">Merci pour tes réponses</h1>
    <h2 class="titre2">Echangeons une première fois pour mieux comprendre ta situation.</h2>
    <h3 class="titre3">Cet appel est une première étape avant de valider un éventuel entretien avec un mentor O.B.M ELite</h3>
    <span class="souligne">Si le calendrier ne s’affiche pas tout de suite, patiente quelques secondes…</span>
</main>




</body>
</html>