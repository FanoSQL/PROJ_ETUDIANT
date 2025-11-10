<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<a href="admin_user.php" class="Nouveaucompte">Créer un nouveau compte</a><br>


<div class="tableau">

    <?php
    //---- Intégrer un compsant de base de données relationnel
    include_once "conn.php";
    //--------------------------------

    /*
    On écrit du SQL dans une variable
    Le langage SQL signifie Langage de requete structuré
    */
    $SQL_SELECT = "SELECT * FROM users";
    $ResultatRequete = mysqli_query($conn,$SQL_SELECT);
    if($ResultatRequete) {

        //Construit un tableau de résultat
        while($TableauResultat = mysqli_fetch_assoc($ResultatRequete)) {
        //------ Stocker les données...
        $login = $TableauResultat["Identifiant"];
        $password = $TableauResultat["MotDePasse"];
        //----- Afficher le(s) résultat(s)
        include "listing_user.php";
        //--------------------------
        }


    } else {
        print "Erreur d'accès à l'application !";
    }

    ?>



</div>





</body>
</html>