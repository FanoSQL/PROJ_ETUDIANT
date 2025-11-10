
<div class="container">
<?php
//------------ COMPOSANT DE CONNEXION BDD
require_once "config/connexion.php";
//---------------------------------


//1.REQ SQL
$SQL_TOUS_LES_COURS = "SELECT * FROM produits";

//2. Executer la requête
$res = mysqli_query($conn,$SQL_TOUS_LES_COURS);
//$NbTrouver = mysqli_num_rows($res);

//3. Construire un tableau
while($ListeDesCours = mysqli_fetch_assoc($res)) {
    $NomImage = $ListeDesCours["NomPhoto"];
    $ContenuDesc = $ListeDesCours["Description"];
    $TitreImage = $ListeDesCours["Libelle"];
    //
    include "liste_cours.php";
}

//---------------------------
?>




</div>