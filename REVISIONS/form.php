<?php
//------ Composant de paramétrage de ma page...
include_once "param/param_page.php";
//-----------------------------------------

  $message = "";
  $erreur=0;
  //
  if (isset($_GET["error"]) && !empty($_GET["error"])) {
    $erreur = $_GET["error"];
  }

  if ($erreur==105) {
    $message = "Votre compte locataire a bient été créée !";
  }

  if ($erreur==104) {
    $message = "ERREUR : Création de votre compte locataire !";
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
  
<h1 class="TitreDuFormulaire">Déclaration d'un nouveau locataire</h1>
  <span><?=$message;?></span>

    <form class="form-container" action="fichier_locataire.php" method="post">
        <div class="zinput-line">
          <input class="in-put" type="text" name="sNom" id="" placeholder="Nom locataire" required>
          <input class="in-put" type="text" name="sPrenom" id="" placeholder="Prénom locataire">
        </div>

        <div class="zinput">
          <input class="in-put-line" type="text" name="sAdresse" id="" placeholder="Adresse du locataire" required>
        </div>

        <div class="zinput">
          <textarea class="in-put-aera" name="sAdresseComplement" id="" cols="10" rows="5" placeholder="Complément d'adresse"></textarea>
        </div>

        <div class="zinput_line">
          <input class="in-put" type="text" name="sCodePostal" id="" placeholder="Code postal" required>
          <input class="in-put" type="text" name="sVille" id="" placeholder="Ville" required>
        </div>


        <div class="zinput">
          <input class="in-put-radio" type="radio" name="apayer" value="1" id="" checked><label class="label-input-radio" for="apayer">Oui</label>
          <input class="in-put-radio" type="radio" name="apayer" value="0" id=""><label class="label-input-radio" for="apayer">Non</label>
        </div>

      <div class="zbutton">
          <button class="BtnSubmit" type="submit">Nouveau locataire</button>
      </div>

  </form>



</body>
</html>
