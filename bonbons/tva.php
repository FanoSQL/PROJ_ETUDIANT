<?php
$Qte = 4;
$PuHT = 14.50;
$TVA = 1.20;
$TotalHT = ($Qte*$PuHT);
$MonPanier =$TotalHT*$TVA;

//print $MonPanier;

?>

<h1>Mon panier</h1>

<hr>
<h3 class="vert">Vous devez régler : <?=$MonPanier;?>&nbsp;&euro;</h3>