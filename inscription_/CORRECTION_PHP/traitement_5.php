<?php
//------------ COMPOSANT DE CONNEXION BDD
require_once "config/connexion.php";
//---------------------------------
$ChoixQCM="";

$table = "QCM_REPONSES";

if (isset($_GET["Id"]) && !empty($_GET["Id"])) {
    $IdUsers= $_GET["Id"];
}

if (isset($_GET["lang"]) && !empty($_GET["lang"])) {
    $Langue= $_GET["lang"];
}



//------- On met à jour le dossier de la personne
include_once "Maj_Personne.php";
//Par exemple on dit que 1 dans OKQCM afin qu'elle ne refasse pas le QCM à chaque connexion...
//-------------------------------


if (isset($_POST["sDescribes"]) && !empty($_POST["sDescribes"])) {
    $ReponseUtilisateur= $_POST["sDescribes"];
}


//------------- Si la personne a rempli le QCM....
if (!empty($ReponseUtilisateur)) {
    // 	IdQCM_Reponse 	IdUsers 	ReponseUtilisateur 	DateReponse 	
    $SQL_QCM = "INSERT INTO  $table (IdUsers, ReponseUtilisateur)
    VALUES 
    ('$IdUsers', '$ReponseUtilisateur')
    ";

    //2. Executer la requête
    $res_qcm = mysqli_query($conn,$SQL_QCM);

    if ($res_qcm) {//Bascule vers la page 6
        header("location:page_6.php?Id=$IdUsers&lang=$Langue");
    } else {//Problème technique ? ou de form ?
        header("location:page_5.php?Id=$IdUsers&lang=$Langue&error=280");
    }
    
 
} else {//Problème technique ? ou de form ?
        header("location:page_5.php?Id=$IdUsers&lang=$Langue&error=280");
}

//---------- 
