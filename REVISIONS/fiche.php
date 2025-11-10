<?php
//----------------------
include_once "config/connexion.php";
//----------------------
//------ Composant de paramétrage de ma page...
include_once "param/param_page.php";
//-----------------------------------------

$id=0;//Initialiser

//Récupérer les infos dans la barre d'adresse grâce à $_GET
if(isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];
} else {
    header("location:liste_locataire.php");
}

//1.Rechercher le locataire selon son ID
$SQL_CHERCHER = "SELECT * FROM locataire WHERE IdLocataire=$id";
//2. Executer la requete
$res = mysqli_query($conn,$SQL_CHERCHER);
//3. Tester res ou tester le nombre de lignes renvoyées
$NbPersonneTrouver = mysqli_num_rows($res);
//On vérifie si le résultat est UNIQUE
if ($NbPersonneTrouver==1) {
    //4.Construire le tableau
    $PersonneTrouver = mysqli_fetch_assoc($res);
    $NomDeMonLocataire = $PersonneTrouver["Nom"];
    $PrenomDeMonLocataire = $PersonneTrouver["Prenom"];
    $APayer = $PersonneTrouver["APayer"];
} else {//----
    header("location:liste_locataire.php");
}

?>

<!DOCTYPE html>
<html lang="<?=$Lang;?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$TitreApplication;?></title>
  <link rel="shortcut icon" href="icone/<?=$Icone;?>" type="image/x-icon">
  <link rel="stylesheet" href="css/form.css">
</head>
<body class="body-contain">
  
<h1 class="TitreDuFormulaire">Fiche locataire <?=$PrenomDeMonLocataire." ".$NomDeMonLocataire;?></h1>


<form action="update.php?id=<?=$id;?>" method="post">

 <!-- je n'ai pas achevé le formulaire, mais leprincipe es tle même pour le reste -->    
    <div class="zinput-line">
        <input class="in-put" type="text" name="sNom" id="" value="<?=$NomDeMonLocataire;?>">
        <input class="in-put" type="text" name="sPrenom" id=""value="<?=$PrenomDeMonLocataire;?>">
    </div>

    <?php
    if ($APayer==1) {
    ?>
    <input type="radio" name="apayer" value="<?=$APayer;?>" id="" checked><label for="apayer">Oui</label>
    <input type="radio" name="apayer" value="0" id=""><label for="apayer">Non</label>
    <?php     }     ?>
 
    
    <?php
    if ($APayer==0) {
    ?>
    <input type="radio" name="apayer" value="<?=$APayer;?>" id="" checked><label for="apayer">Non</label>
    <input type="radio" name="apayer" value="1" id=""><label for="apayer">Oui</label>
   <?php     }     ?>


 <!-- je n'ai pas achevé le formulaire, mais leprincipe es tle même pour le reste -->    

    <div class="zinput">
        <textarea class="in-put-aera" name="sAdresseComplement" id="" cols="10" rows="5" placeholder="Complément d'adresse"><?=$PrenomDeMonLocataire;?></textarea>
    </div>

    <div class="zinput_line">
        <input class="in-put" type="text" name="sCodePostal" id="" value="Code postal" required>
        <input class="in-put" type="text" name="sVille" id="" value="Ville" required>
    </div>

 <!-- je n'ai pas achevé le formulaire, mais leprincipe es tle même pour le reste -->    

<!--
Dans le css je n'ai pas rectifié le positionnement du bouton
Je l'ai ciblé sur le container par inadvertance...
-->
    <div class="zbutton">
        <button class="BtnSubmit vert" type="submit">Modifier la fiche</button>
    </div>

</form>



</body>
</html>
