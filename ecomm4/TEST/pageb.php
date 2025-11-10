<?php

/*
RECUPERERE LES DONNEES DE LA BARRE D'ADRESSE

$_GET[]
*/
$etape=0;
$message="";
$tarif = 100;

if (isset($_GET["etape"]) && !empty($_GET["etape"])) {
     $etape = $_GET["etape"];
}

/** SELON     /  SWITCH */
//Analyser la variable en provenance de la barre d'adresse....
switch ($etape) {
    case 1 : $message="Vous venez de l'étape 1";break;//Variable
    case 2 : header("location:pagec.php?error=108");break;//Redirection
    case 3 ://Imbriquer une condition
        if($tarif<=100) {
            $message = "Vous ne payez pas de TVA";
        } else {
              $message = "Votre TVA est de ";
        }
        break;
    case 4 : //Imbrication de commandes....
        for ($i=1;$i<=5;$i++) {
            print $i."<br>";
        }
        break;
    
    default ://Au cas OÙ = PORTE DE SORTIE ? IMPREVU ? CONDITION NON REUNIE
            $message = "";
            break;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>
PAGE B
    <a href="pagec.php?etape=3&appli=7&UTF=8&error=105">
        Page suivante
    </a>

</h1>


</body>
</html>