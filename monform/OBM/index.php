<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue...</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<header class="nav">
    <h1 class="titrenav">Etape 1/2 : Devient O.B.M pour guider tes clients</h1>
</header>

<main class="contenu">
    <h1 class="grandtitre">Envie d'être accompagné pour devenir bras droit/OBM ?</h1>
    <h2 class="titre2">Dépose ta candidature pour rejoindre OBM Squad</h2>
    <h3 class="titre3">L’accompagnement #1 en francophonie pour devenir OBM et générer jusqu’à 5000€/mois avec 2-3 clients</h3>
    <span class="souligne">(nos membres signent en moyenne leur premier client et moins de 6 semaines)</span>
    <p class="paragraphe">Remplir  le formulaire ci-dessous et clique sur continuer pour passer à l’étape suivante, Il se remplit en moins de 30 secondes.</p>
</main>


<form action="inscription.php" method="post">
    
    <div class="in-put">
        <label for="sPrenom">Prénom :</label> 
        <input type="text" name="sPrenom" id="" placedholder="Prénom" required>

        <label for="sNom">Nom :</label> 
        <input type="text" name="sNom" id="" placedholder="Nom" required>

   </div>

    <div class="in-put">
        <label for="sEmail">Email :</label> 
        <input type="email" name="sEmail" id="" placedholder="Adresse E-mail" required>

        <label for="sTelephone">Téléphone :</label> 
        <input type="text" name="sTelephone" id="" placedholder="+33 00 00 00 00 00" required>
 
    </div>


    <!-- BOUTONS RADIOS -->
    <div class="div_paragraphe">
        <div class="in-put">
            <span class="ligne_radio">Tu connais déjà le nom de ... ?</span>
            <label for="rNomOBM">Oui et je veux aller plus loin</label> 
            <input class="BtnRadio" type="radio" name="rNomOBM" id="" value="OUI"><br>


            <label for="rNomOBM">Je me renseigne activement</label> 
            <input class="BtnRadio" type="radio" name="rNomOBM" id="" value="Je me renseigne activement"><br>


            <label for="rNomOBM">Je me renseigne tout juste</label> 
            <input class="BtnRadio" type="radio" name="rNomOBM" id="" value="Je me renseigne tout juste"><br>
        </div>


    </div>
<!--************************************************* -->



<!-- et enfin -->
<div class="div_paragraphe">

    <div class="in-put">
        <label for="sMessage">Tu peux nous dire quelque chose ?</label> 
        <textarea name="sMessage" id="" cols="30" rows="10"></textarea>
    </div>
<!--************************************************* -->

<!-- et enfin -->
<div class="div_paragraphe">
    <button class="BtnValider" type="submit">Continuer</button>
   </div>
<!--************************************************* -->


</form>





</body>
</html>