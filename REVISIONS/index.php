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


    if (isset($_GET["page"]) && !empty($_GET["page"])) {
        $page_contenu = $_GET["page"];
        $page_contenu = $page_contenu.".php";
    } else {
       $page_contenu ="liste_locations.php";//Page par défaut 
    }
    //Fabrique dynamique de l'iframe
       $moniframe = "<iframe name=".chr(34)."iframe-contenu".chr(34)." id=".chr(34)."iframe-droite".chr(34)." src=".chr(34).$page_contenu.chr(34)." style=".chr(34)."border:none;".chr(34)." title=".chr(34)."Partie contenue".chr(34)."></iframe>";

?>

<!DOCTYPE html>
<html lang="<?=$Lang;?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$TitreApplication;?></title>
  <link rel="shortcut icon" href="icone/<?=$Icone;?>" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css">

  <style>






/* DESCRIPTION DES IFRAMES*/
    #iframe-gauche {
        height: 880px;
        width  : 380px;
        margin: 0px;
    }

    #iframe-droite {
        width: 1400px;
        height: 100%;
        /*background-color: red;*/
    }

.espace-gestion {
    width: 100%;
    height: 100%;
    margin-left: 10px;
    margin-right: 10px;
    /*background-color: yellow;*/
    
    display: flex;

}



    </style>
</head>
<body>
    

<header class="mabanniere">

    <div class="z-gauche">
        <!--<i class="fa fa-angle-left"></i><a class="TitreApplication" href="#">Z'IMMO 1.0</a>-->
        <img class="img-logo" src="images/logo.png" alt="Application Z'IMMO 1.0 gestion locative">
    </div>

    <div class="z-centre">
        <h1 class="titre-espace">Espace privé - Administrateur</h1>
    </div>

</header>
 


<!--  IFRAME -->
<!-- pppppppppppppppppppppppppppppppppppppppppppppp -->
    <div class="espace-gestion">

        <div class="div-gauche">
            <iframe name="iframe-cours" id="iframe-gauche" src="menu.php" style="border:none;" title="Partie menu"></iframe>
        </div>
    
        <div class="div-droite">
            <?php //print $moniframe;?>
            <iframe name="iframe-contenu" id="iframe-droite" src="<?=$page_contenu;?>" style="border:none;" title="Partie contenue"></iframe>
        </div>

    </div>

<!-- pppppppppppppppppppppppppppppppppppppppppppppp -->
  



</body>
</html>