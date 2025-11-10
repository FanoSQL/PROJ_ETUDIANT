<?php
    //Composant de connexion à une base de données Cf. référentiel d'examen...
    include_once "conn.php";
    //-------- je prépare ma requête
    $MaRequete = "SELECT * FROM user";
    //-------- J'exécute ma requête
    $ReponseCommande = mysqli_query($conn,$MaRequete);
    //-------- Je mets le résultat dans un tableau
    $ResultatRenvoyer = mysqli_fetch_assoc($ReponseCommande);
    //J'affiche une ligne de mon résultat
    //PS : ResultatRenvoyer est un tableau
    print $ResultatRenvoyer["identifiant"];
?>