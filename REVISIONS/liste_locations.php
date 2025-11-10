<?php
include_once "config/connexion.php";
//

    
//---1. Créer une variable contenir la requête SQL
$SQL_ANNONCE = "SELECT * from annonces";
//2. Commande pour exécuter la requête
$res = mysqli_query($conn,$SQL_ANNONCE);
$NbAnnonce = mysqli_num_rows($res);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/box.css">
</head>
<body>
    
<div class="zbox-container">
<?php

    if ($NbAnnonce>0) {
        //TOUT EST OK
        while($annonce = mysqli_fetch_assoc($res)) {
            $photo_maison = $annonce["photo"];
            $titre_maison = $annonce["libelle"];
            $prix_maison = $annonce["prix"];
            $ville_maison = $annonce["ville"];
            $codepostal_maison = $annonce["codepostal"];
            $date_annonce = $annonce["date"];
            include "box_location.php";
        }
        

    } else {
        //C'EST LA MERDE
        header("location:index.php?error=104");
    }


?>

</div>

</body>
</html>