<?php
$CodeErreur = 0;
if (isset($_GET["inscrit"]) && !empty($_GET["inscrit"])) {
    $CodeErreur= $_GET["inscrit"];
}

//print "Code erreur récupéré = ".$CodeErreur;

switch ($CodeErreur) {
    case "pok" :
        $message="Votre inscription n'a pas été prise en compte...";
        break;

    case "ok" :
        $message="Nous avons bien reçu votre demande d'inscription...";
        break;

    default :
    $message = "";
    break;
}


if (isset($_GET["home"]) && !empty($_GET["home"])) {
    //$home= $_GET["home"];
    header("location:index.php?etape=0");
} else {
    header("location:index.php?etape=0");
}

?>

<span class="message vert"><?=$message;?></span>



<h1>OK Accueil</h1>