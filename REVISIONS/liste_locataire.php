
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/chercher.css">
</head>
<body>
    

<?php
include_once "config/connexion.php";
//---------------------------------------
//1. Créer la variable
$SQL_SELECT = "SELECT * FROM locataire Order By Nom ASC";
//2. Exécuter la requête...
$res = mysqli_query($conn,$SQL_SELECT);
if ($res) {

//3. Construire un tableau mémoire avec la commande mysqli_fetch_assoc : tableau associatif
//IdLocataire 	Nom 	Prenom 	Email 	Telephone 	APayer 	
while ($ListeLocataire = mysqli_fetch_assoc($res)) {
//
    $IdLocataire = $ListeLocataire["IdLocataire"];
    $NomDeMonLocataire = $ListeLocataire["Nom"];
    $PrenomDeMonLocataire = $ListeLocataire["Prenom"];
    $EmailDeMonLocataire = $ListeLocataire["Email"];
    $TelDeMonLocataire = $ListeLocataire["Telephone"];
    $APayer = $ListeLocataire["APayer"];
    //
    //print $NomDeMonLocataire;
    //print "<h1>$IdLocataire</h1>";
    include "fiche_locataire.php";
}


}
?>


</body>
</html>

