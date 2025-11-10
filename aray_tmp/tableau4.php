<?php
require_once "config/MesFonctions.php";
$conn = ConnectMySQLi();
//------------------------
$TableauStock[]=0;
$cle = 0;
//
$inclure_data_dans_tableau = "SELECT * FROM stock ORDER BY QteEntree DESC";
//2. Exécuter la requête...
$res_inclure_data = mysqli_query($conn,$inclure_data_dans_tableau);
//3. Construire le tableau
while($tableau_memoire_fetch = mysqli_fetch_assoc($res_inclure_data)) {
         $cle++;
         $TableauStock[$cle]=$tableau_memoire_fetch["QteEntree"];

}

$total_entree = 0;
foreach ($TableauStock as $valeur) {
    $total_entree += $valeur;//Calcul le nombre d'article entrés en stock
}

?>

<span><b>Total entrées en stock = </b><?=$total_entree;?></span><br>