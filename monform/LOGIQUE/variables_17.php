<!-- Le code ci-dessous va t-il s'exécuter ? 
Est-il pertinent ?
-->
<?php
    $i = 5;
    $j = 6;
    $resultat=0;
    //Faire l'addition de 5 + 6
    if ($i==$j) {
        $resultat = $i+$j;
        print "$i est égale à $j";
    } else {
        print "$i n'est pas égale à $j";
    }
    
   
?>


<h1>
    <?=$resultat;?>
</h1>