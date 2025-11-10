<?php
//Soit un stock de fard à paupière
//$QteStock = 200;
$TableauStock[1] = 200;//Stock de départ
$TableauResteEnStock[1]=$TableauStock[1];//Pointage
//-------- Liste de commande
$CommandeQte[1] = 83;
$CommandeQte[2] = 18;
$CommandeQte[3] = 120;
$NbCommande = count($CommandeQte);

$PointageStock = 0;
for ($iStock=1;$iStock<=$NbCommande;$iStock++) {
    $PointageStock++;
    if ($TableauResteEnStock[1]>=$CommandeQte[$iStock]) {
        $ResteEnStock = $TableauResteEnStock[1]-$CommandeQte[$iStock];
        $TableauResteEnStock[1] = $ResteEnStock;
        print "Il reste en stock : ".$ResteEnStock." article(s) <br>";
    } else {
        print "Le stock est épuisé !";
        break;
    }
    //----Stocker le véritable ETAT DE STOCK
    //$TableauResteEnStock[$PointageStock] = $ResteEnStock;
    //-----------------------------------

    
}


?>