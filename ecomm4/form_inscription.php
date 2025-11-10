<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<!-- MES STYLES -->
    <link rel="stylesheet" href="css/tableau.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
<!-- ******** -->


</head>
<body>
    

<form action="inscription.php" method="post">

    <div class="z-input">
        <input type="text" class="in-put" name="sNom" placeholder="Saisir votre nom" required>
        <input type="text" class="in-put" name="sPrenom" placeholder="Saisir votre prénom">
    </div>

    <div class="z-input">
        <input type="email" class="in-put" name="sEmail" placeholder="Votre e-mail" required>
        <!--<input type="telephone" class="in-put" name="sTelephone" placeholder="Votre télé^hone" required>-->
    </div>

    <div class="z-input">
        <input type="text" class="in-put" name="sAdresse" placeholder="Adresse">
        <input type="text" class="in-put" name="sAdresseComplementaire" placeholder="Appartement, étage, boite postale...">
    </div>

    <div class="z-input">
        <input type="text" class="in-put" name="sCodePostal" placeholder="Votre CP" >
        <input type="text" class="in-put" name="sVille" placeholder="Votre ville">
    </div>

    <div class="z-input">
        <input type="password" class="in-put" name="sMotDePasse" placeholder="Votre mot de passe" required>
    </div>

    <div class="z-radio">
        <input type="radio" class="rRadio" name="sNewsLetter">
        <label for="rRadio">Inscription à la NewsLetter</label>
    </div>

     <div class="z-button">
        <button type="submit" class="BtnValider">Créer mon compte</button>
    </div>
   

</form>

</body>
</html>