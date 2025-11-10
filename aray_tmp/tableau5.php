
<form action="">

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
//3. Construire le tableau avec des input
while($tableau_memoire_fetch = mysqli_fetch_assoc($res_inclure_data)) {
         $cle++;
         $IdStock = $tableau_memoire_fetch["IdStock"];
         $vLigne = "<input type='number' name='s_IdStock_$IdStock' value='$IdStock'>";
         //
         $Libelle = $tableau_memoire_fetch["Libelle"];
         $vLigne .= "<input type='text' name='s_Libelle_$IdStock' value='$Libelle'>";
         
         $QteEntree = $tableau_memoire_fetch["QteEntree"];
         $vLigne .= "<input type='number' name='s_QteEntree_$IdStock' value='$QteEntree'>";

        $PrixUnitaireHT = $tableau_memoire_fetch["PrixUnitaireHT"];
        $vLigne .= "<input type='number' name='s_QteEntree_$IdStock' value='$PrixUnitaireHT' step='.01'>";

        print $vLigne."<br>";
        $vLigne ="";//Réinitialise vLigne
         // IdStock 	Libelle 	QteEntree 	DateEntree 	DateSortie 	QteSortie 	PrixUnitaireHT 	ValeurStockES 	

}

$total_entree = 0;
foreach ($TableauStock as $valeur) {
    $total_entree += $valeur;//Calcul le nombre d'article entrés en stock
}

?>


<button type="submit">Enregistrer les modifications</button>
</form>
