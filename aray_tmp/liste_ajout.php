<table>
    <thead>
        <tr>
            <th>IdStock</th>
            <th>Libéllé</th>
            <th>Qté Entrée</th>
        </tr>
    </thead>

    <tbody>

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


    <?php

    //3. Construire un tableau mémoire avec mysqli_fetch_assoc
    while($monstock = mysqli_fetch_assoc($res)) {
        $idstock = $monstock["IdStock"];
        $libelle = $monstock["Libelle"];
        $quantite = $monstock["QteEntree"];
        //---- INCLUDE POUR INTEGRER le fichier affiche_ligne.php
        include "ligne-stock.php";//--->VUE
        //---------------
    }

    ?>

        </tbody>

</table>


