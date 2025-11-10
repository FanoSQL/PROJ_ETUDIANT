<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<h2>Nouvelle entrée en stock</h2>

<form action="data_stock.php" method="post">

    <div class="in-put">
        <input type="text" name="sNomProduit" id="" placeholder="Libellé du produit..." required>
    </div>

    <div class="in-put">
        <input type="number" name="sQteEntree" id="" placeholder="Qté entrée..." required>
    </div>

    <button type="submit">Enregistrer le stock</button>

</form>

<hr>

<?php
    include_once "liste_ajout.php";
?>



</body>
</html>