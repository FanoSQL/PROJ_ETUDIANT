<?php
$Qte = 4;
$PuHT = 14.50;
$TVA = 1.20;
$TotalHT = ($Qte*$PuHT);
$MonPanier =$TotalHT*$TVA;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/panier.css">
</head>
<body>
    
<hr>
<h3 class="vert">Vous devez régler : <?=$MonPanier;?>&nbsp;&euro;</h3>


<div class="container"><!-- PARENT-->
   
    <!-- PARTIE IMAGE-->
    <div class="zgauche"><!-- ENFANT-->

        <section class="ImageProduit">
            <img src="images/bonbon.jpg" alt="" class="ImgProd">
        </section>

        <section class="DescriptionProduit">
            <span class="description">Bonbon Suzuette Fraise </span>
            <span class="description_prix">72,00 €</span>
            <span class="description_package">Lot de 100</span>
        </section>

    </div>


     <!-- PARTIE PANIER-->
   <div class="zdroite">
        <a class="BtnPaiement" href="#">Réaliser le paiement</a>
    </div>


</div>


</body>
</html>