<?php


$MonTableau =[
    1 =>"Valeur 1",
    2 =>"Valeur 2",
    3 =>"Valeur 3",

];


for ($i=1;$i<=count($MonTableau);$i++) {
    print $MonTableau[$i]."<br>";
}


foreach ($MonTableau as $liste) {
    print $liste."<br>";
}
?>