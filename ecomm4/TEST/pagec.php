<?php

/*
RECUPERERE LES DONNEES DE LA BARRE D'ADRESSE

$_GET[]
*/

/*
TOUTES VARIABLES EST UN ELEMENT MEMOIRE
 */

$erreur=0;
$message="";
$tarif = 100;
$Afficher_vert_rouge=315;//D'office erreur...
/*
    $_GET = Sert a gérer les valeurs de la barre d'adresse...
*/
if (isset($_GET["error"]) && !empty($_GET["error"])) {
     $erreur = $_GET["error"];
}

//print $erreur;

/** SELON     /  SWITCH */
//Analyser la variable en provenance de la barre d'adresse....
switch ($erreur) {
    case 104 : $message = "Erreur 104 : Remplissez le formulaire...";break;
    case 105 : $message = "Erreur 105 : Remplissez le formulaire...";break;
    case 106 : $message = "Erreur 106 : Remplissez le formulaire...";break;
    case 107 : $message = "Erreur 107 : Remplissez le formulaire...";break;
    case 108 : $message = "Erreur 108 : Remplissez le formulaire...";break;

    default :
    $message = "Vous êtes inscrit...";
    $Afficher_vert_rouge=100;//TOUT VA BIEN
    break;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .message_vert {
            color: green;
        }

         .message_rouge {
            color: red;
        }
    </style>
</head>
<body>
   
<?php  if($Afficher_vert_rouge==100) {;?>
    <span class="message_vert"><?=$message;?></span>
<?php }?>

<?php  if($Afficher_vert_rouge==315) {;?>
    <span class="message_rouge"><?=$message;?></span>
<?php }?>

<h1>

PAGE C
    <a href="pagea.php?etape=3&appli=7&UTF=8&error=105">
        Revenir au début
    </a>

</h1>


</body>
</html>