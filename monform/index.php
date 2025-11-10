<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form action="inscription.php" method="post">
    
    <div class="in-put">
        <label for="sNom">Nom :</label> 
        <input type="text" name="sNom" id="" placedholder="...">

        <label for="sPrenom">Prénom :</label> 
        <input type="text" name="sPrenom" id="" placedholder="...">
   </div>

    <div class="in-put">
         <label for="sEmail">Email :</label> 
        <input type="email" name="sEmail" id="" placedholder="...">

        <label for="sMotDePasse">Mot de passe :</label> 
        <input type="password" name="sMotDePasse" id="" placedholder="...">

        <label for="sAdresse">Adresse :</label> 
        <input type="text" name="sAdresse" id="" placedholder="...">

        <label for="sCodePostal">Code postal :</label> 
        <input type="text" name="sCodePostal" id="" placedholder="...">
 
         <label for="sVille">Ville :</label> 
        <input type="text" name="sVille" id="" placedholder="...">
   </div>


    <div class="in-put">
        <textarea name="sMessage" id="" cols="30" rows="10"></textarea>
   </div>

    <button class="BtnValider" type="submit">S'inscrire</button>

</form>


</body>
</html>