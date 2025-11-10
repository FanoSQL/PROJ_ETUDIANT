<?php
        //------------
    require_once "config/MesFonctions.php";
    //------------
    //Utiliser ma fonction de Connexion...
    $conn = ConnectMySQLi();//Recup la connexion BDD...

    $idstock=0;
    //barre d'adresse
    if (isset($_GET["idfiche"])) {
        $idstock = $_GET["idfiche"];
    }
    //*---------------****

    if (isset($_POST["sNomProduit"])) {
        $NomProduit = htmlspecialchars($_POST["sNomProduit"]);
    }

    if (isset($_POST["sQteEntree"])) {
        $QteProduit = $_POST["sQteEntree"];
    }
    //---------------------------------------

    if ($idstock>0) {
        
        //1.Prepare ma requete
        $SQL_UPDATE_STOCK = "UPDATE stock SET Libelle='$NomProduit', QteEntree='$QteProduit' 
        WHERE IdStock=$idstock";
        //2. Execute la requête
        $res = mysqli_query($conn,$SQL_UPDATE_STOCK);
        if ($res) {
            header("location:fiche-stock.php?idfiche=$idstock&success");
        } else {
            header("location:fiche-stock.php?idfiche=$idstock&error=106");
        }


    } else {
        header("location:fiche-stock.php?idfiche=$idstock&error=107");
    }

?>