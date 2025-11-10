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

    if ($idstock>0) {
    //1.Prepare ma requete
    $SQL_SELECT_STOCK = "SELECT * FROM stock WHERE IdStock=$idstock";
    //2. Execute la requête
    $res = mysqli_query($conn,$SQL_SELECT_STOCK);
    $monstock = mysqli_fetch_assoc($res);
    $idstock = $monstock["IdStock"];
    $libelle = $monstock["Libelle"];
    $quantite = $monstock["QteEntree"];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rectifier une erreur en stock</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<h2>Modifier la fiche produit + entrée en stock</h2>

<hr>

<form action="modif_stock.php?idfiche=<?=$idstock;?>" method="post">

    <div class="in-put">
        <input type="text" name="sNomProduit" id="" placeholder="Libellé du produit..." value="<?=$libelle;?>" required>
    </div>

    <div class="in-put">
        <input type="number" name="sQteEntree" id="" placeholder="Qté entrée..." value="<?=$quantite;?>" required>
    </div>

    <div class="zbuton">

        <button class="Btn noir" type="submit">Modifier la fiche</button>
        
        <a class="Btn rouge" href="delete-stock.php?idfiche=<?=$idstock;?>">
            Supprimer
        </a>
    </div>

</form>

</body>
</html>