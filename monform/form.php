<?php
$message_nom = "";
$message_prenom = "";
$CodeErreur=0;
//Traiter les informations de la barre d'adresse !
if(isset($_GET["erreur"]) && !empty($_GET["erreur"])) {
    $CodeErreur = $_GET["erreur"];
    //---------
    /*if ($CodeErreur==2) {FACILE
        //
    }
     if ($CodeErreur==3) {
        //
    }*/
    switch ($CodeErreur) {
        case 2 : $message_nom= "Saisir votre nom...";
        break;//Casser la boucle

        case 3 : $message_prenom= "Saisir votre prénom...";
        break;
        default :
        $message= "...";
        break;
    }
   //--------
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
    


<form action="inscription2.php" method="post">
    
    <div class="in-put">
        <label for="sNom">Nom :</label> 
        <input type="text" name="sNom" id="" placedholder="..."><br>
        <span class="rouge"><?=$message_nom;?></span><br>

        <label for="sPrenom">Prénom :</label> 
        <input type="text" name="sPrenom" id="" placedholder="..."><br>
        <span class="rouge"><?=$message_prenom;?></span><br>

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