<?php
include_once "config/connexion.php";
//
$NomLocataire="";
$res_agenda = false;
//isset = initialiser une variable depuis un formulaire
//---Un des paramètres de sécurité BACK-END
if(isset($_POST["sNom"]) && !empty($_POST["sNom"])) {
    $NomLocataire = htmlspecialchars($_POST["sNom"]);
} else {
    //Redirection de page
    header("location:form.php");
}

if(isset($_POST["apayer"])) {
     $APayer = $_POST["apayer"];
}

if(isset($_POST["sPrenom"])) {
    $Prenom = htmlspecialchars($_POST["sPrenom"]);
}
  
if(isset($_POST["sAdresse"])) {
    $Adresse = htmlspecialchars($_POST["sAdresse"]);
}

if(isset($_POST["sAdresseComplement"])) {
    $AdresseComp = htmlspecialchars($_POST["sAdresseComplement"]);
}

if(isset($_POST["sCodePostal"])) {
    $CodePostal = htmlspecialchars($_POST["sCodePostal"]);
}

if(isset($_POST["sVille"])) {
    $Ville = htmlspecialchars($_POST["sVille"]);
}

//---1. Créer une variable contenir la requête SQL
$SQL_INSERT = "INSERT INTO locataire (Nom, Prenom, APayer, Adresse, AdresseComplementaire, CodePostal, Ville) 
VALUES ('$NomLocataire','$Prenom','$APayer', '$Adresse', '$AdresseComp', '$CodePostal', '$Ville')";
//2. Commande pour exécuter la requête
$res = mysqli_query($conn,$SQL_INSERT);

//------ j'en profite au passage pour créer un agenda des réglements
if($res) {
    // 	IdSuivi 	IdAnnonce 	IdLocatiaire 	Mois 	Montant 	AJour 	Nom 	CouleurMois 	
    $Date = date('d-m-y');
    $Mois = MoisEnLettre();
    $IdLocataire = mysql_lit_dernier($conn);
    $AJour=$APayer;
    if ($APayer==0) {$CouleurMois="red";$CouleurPolice="white";} else {$CouleurMois="green";$CouleurPolice="black";}

    $SQL_AGENDA = "INSERT INTO suivi_loyer (IdLocatiaire, Mois, AJour, Nom, CouleurMois, CouleurPolice, DateMaj) 
    VALUES ('$IdLocataire', '$Mois', '$AJour', '$NomLocataire', '$CouleurMois', '$CouleurPolice', '$Date')";
    $res_agenda=mysqli_query($conn,$SQL_AGENDA);
}


if ($res_agenda) {
    //TOUT EST OK
    header("location:form.php?error=105");
} else {
    //C'EST LA MERDE
    header("location:form.php?error=104");
}

//------ Récupère l'id de la nouvelle ligne...
function mysql_lit_dernier($conn) {
    $dernier_id =  mysqli_insert_id($conn);
    return $dernier_id; 
}

function MoisEnLettre() {
    $nMois= date('m');
    $vMois = $nMois;
    //
    switch ($nMois) {//SELON
        case "1" : $vMois = "Janvier";break;
        case "01" : $vMois = "Janvier";break;
         case "2" : $vMois = "Février";break;
        case "02" : $vMois = "Février";break;
        case "3" : $vMois = "Mars";break;
        case "03" : $vMois = "Mars";break;
        case "4" : $vMois = "Avril";break;
        case "04" : $vMois = "Avril";break;
        case "5" : $vMois = "Mai";break;
        case "05" : $vMois = "Mai";break;
        case "6" : $vMois = "Juin";break;
        case "06" : $vMois = "Juin";break;
        case "7" : $vMois = "Juillet";break;
        case "07" : $vMois = "Juillet";break;
        case "8" : $vMois = "Aout";break;
        case "08" : $vMois = "Aout";break;
        case "9" : $vMois = "Septembre";break;
        case "09" : $vMois = "Septembre";break;
        case "10" : $vMois = "Octobre";break;
         case "11" : $vMois = "Novembre";break;
        case "12" : $vMois = "Décembre";break;   
    }



return $vMois;

}
?>