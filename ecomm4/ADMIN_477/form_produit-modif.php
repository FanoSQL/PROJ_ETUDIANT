<!-- ETAPE A -->
<?php
//----------
require_once "config/connexion.php";
//----------
//
$IdProduit = 0;
$Libelle = "";
$Description = "";
$Photo = "";
$Prix = 0;
$EnStock = 10;//Qté disponible...

//
if (isset($_GET["article"]) && !empty($_GET["article"])) {
    $IdProduit = $_GET["article"];
} else {
    header("location:select_produit.php?error=105");//Reselectionne le bon produit
}

if($IdProduit>0) {
    $SQL_SELECT_PRODUIT ="SELECT * FROM produit WHERE IdProduit='$IdProduit'";
    $res = mysqli_query($conn, $SQL_SELECT_PRODUIT);
    $NbTrouver = mysqli_num_rows($res);//Nbre de ligne
    if ($NbTrouver>0) {
        $MonForm = mysqli_fetch_assoc($res);//Fabrique du tableau
        $IdProduit = $MonForm["IdProduit"];
        $Libelle = $MonForm["Libelle"];
        $Description = $MonForm["Description"];
        $Photo = $MonForm["Photo"];
        $Prix = $MonForm["Prix"];
        $EnStock = $MonForm["Stock"];

    } else {//Le produit n'a pas été trouvé ?
            header("location:select_produit.php?error=105");//Reselectionne le bon produit
    }

} else {//$IdProduit toujours anormal ?
        header("location:select_produit.php?error=105");//Reselectionne le bon produit
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="modif-produit-azad.php?article=<?=$IdProduit;?>" method="post">

    <div class="z-input">
        <input class="in-put" type="text" name="sLibelle" id="" placeholder="Libéllé de l'article..." value="<?=$Libelle;?>">
    </div>

    <div class="z-input">
        <textarea class="in-put-aera" name="sDescription" id="" cols="30" rows="10" placeholder="Description"><?=$Description;?></textarea>
    </div>

    <div class="z-input">
        <input class="in-put" type="text" name="sPhoto" id="" placeholder="Nom du fichier + extension" value="<?=$Photo;?>">
    </div>

    <div class="z-input">
        <input class="in-put" type="number" name="sPrix" id="" placeholder="10 €" value="<?=$Prix;?>">
    </div>
  
    <div class="z-input">
        <input class="in-put" type="number" name="sStock" id="" placeholder="Qté à stocker..." value="<?=$EnStock;?>">
    </div>

    <div class="z-Btn">
        <button class="BtnValider" type="submit">Modifier la fiche article</button>
    </div>


</form>


</body>
</html>