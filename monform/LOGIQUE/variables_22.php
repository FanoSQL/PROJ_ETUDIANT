<!-- Le code ci-dessous va t-il s'exécuter ? 
Est-il pertinent ?
-->
<?php

 $NbRemise=0;
 $PrixUnitaire = 22.80;
 $Qte = 4;
 $PrixTTC = $PrixUnitaire*$Qte;

    for ($i=$Qte;$i<=4;$i--) {
        print "<b>Félicitations nous vous avons attribué 1&nbsp;&euro;</b><br>";
        $NbRemise++;
    }
   
?>

<div>
    <h1>
        Le montant de votre panier est : <?=$PrixTTC;?>
    </h1>

    <span><?=$NbRemise;?>&nbsp;&euro; de remise accordée(s) !</span>
</div>