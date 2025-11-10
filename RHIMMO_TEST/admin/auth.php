<?php

    require_once "../config/mesfonctions.php";
    //----------
    $conn = Connect_MYSQLi("localhost", "stephane","exo_rh_immo","","");

    //---------------------------------------------
    if (isset($_POST["sEmail"])) {
        $email = $_POST["sEmail"];
    }

    if (isset($_POST["sMotDePasse"])) {
        $MotDePasse = $_POST["sMotDePasse"];
    }
    //--------------------------------------------
    $res_login = Login($conn,$email,$MotDePasse);
    //--------------------------------------------

    if ($res_login) {
   // session_start();//Déclaration de la session...
    //$_SESSION["email"];//Balade email de la personne connectée...
    //$_SESSION["role"];//ADMIN ? INTERVENANT ? balade son rôle dans l'application
        header("location:dashboard.php?success");
    } else {//FAUX
       header("location:index.php?error");//RETOUR A LA CONNEXION...
    }

?>