<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="add_produit.php" method="post">

    <div class="z-input">
        <input class="in-put" type="text" name="sLibelle" id="" placeholder="Libéllé de l'article..." required>
    </div>

    <div class="z-input">
        <textarea class="in-put-aera" name="sDescription" id="" cols="30" rows="10" placeholder="Description"></textarea>
    </div>

    <div class="z-input">
        <input class="in-put" type="text" name="sPhoto" id="" placeholder="Nom du fichier + extension" required>
    </div>

    <div class="z-input">
        <input class="in-put" type="number" name="sPrix" id="" placeholder="10 €" required>
    </div>
  
    <div class="z-input">
        <input class="in-put" type="number" name="sStock" id="" placeholder="Qté à stocker..." value="10" required>
    </div>

    <div class="z-Btn">
        <button class="BtnValider" type="submit">Ajouter l'article</button>
    </div>


</form>


</body>
</html>