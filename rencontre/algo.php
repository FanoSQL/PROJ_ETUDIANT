
<?php
//--------- INITIALISATION DECLARATION
$Sexe_A= "Laurent";//"HOMME"
$Sexe_B= "Jeannine";//"FEMME"
$Sexe_C = "Hervé";//AUTRES

$Centre_Interet_Homme  = 1;//NATURE
$Centre_Interet_Femme = 2;//VILLE
$Ok_= true;
//$Match = true;
//$OkNormal = true;
//------------------------------



if ($Centre_Interet_Femme==$Centre_Interet_Homme) {
    $Ok_ = true;
    $message = "ça matche !";

} else {
    $Ok_ = false;//ça matche pas
    $message = "ça ne matche pas !";
}


$CA = 14.4556;

$CA_ROUND = round($CA);
$CA_ROUND = round($CA,2);

///print $CA_ROUND." &euro;";
?>


<h1><?=$message;?></h1>
<h1><?=$CA_ROUND;?> &euro;</h1>
