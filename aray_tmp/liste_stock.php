<?php
        //------------
    require_once "config/MesFonctions.php";
    //------------
    //Utiliser ma fonction de Connexion...
    $conn = ConnectMySQLi();//Recup la connexion BDD...
    //*---------------****
    //1.Prepare ma requete
    $SQL_SELECT_STOCK = "SELECT * FROM stock";
    //2. Execute la requête
    $res = mysqli_query($conn,$SQL_SELECT_STOCK);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php

    //3. Construire un tableau mémoire avec mysqli_fetch_assoc
    while($monstock = mysqli_fetch_assoc($res)) {
        $idstock = $monstock["IdStock"];
        $libelle = $monstock["Libelle"];
        $quantite = $monstock["QteEntree"];
        //---- INCLUDE POUR INTEGRER le fichier affiche_ligne.php
        include "affiche_ligne.php";//--->VUE
        //---------------
    }

    ?>

</body>
</html>


