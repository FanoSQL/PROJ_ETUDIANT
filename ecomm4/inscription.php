<?php
//--------- Composant d'accès à la base de données
require_once "config/connexion.php";
//-----------------------------------------------
$Prenom = "";
$Adresse1 ="";
$Adresse2 ="";
$CodePostal ="";
$Ville ="";
$rNewsLetter=0;

if(isset($_POST["sNom"]) && !empty($_POST["sNom"])) {
    $Nom = htmlspecialchars($_POST["sNom"]); // iSQL sécurité (transforme les caractères dangereux en caractères HTML)
} else {
    header("location:form_inscription.php?error=105");
}

if(isset($_POST["sEmail"]) && !empty($_POST["sEmail"])) {
    $Email = htmlspecialchars($_POST["sEmail"]); // iSQL sécurité (transforme les caractères dangereux en caractères HTML)
} else {
    header("location:form_inscription.php?error=105");
}

if(isset($_POST["sMotDePasse"]) && !empty($_POST["sMotDePasse"])) {
    $MotDePasse = htmlspecialchars($_POST["sMotDePasse"]); // 
} else {
    header("location:form_inscription.php?error=105");
}

/*
    htmlentities()
    htmlentities_decode
    htmlspecialchars_decode
*/
if(isset($_POST["sPrenom"])) {
    $Prenom = htmlspecialchars($_POST["sPrenom"]);
 }
 // 

 if(isset($_POST["sAdresse"])) {
    $Adresse1 = htmlspecialchars($_POST["sAdresse"]);
 }
 //

if(isset($_POST["sAdresseComplementaire"])) {
    $Adresse2 = htmlspecialchars($_POST["sAdresseComplementaire"]);
 }

if(isset($_POST["sCodePostal"])) {
    $CodePostal = htmlspecialchars($_POST["sCodePostal"]);
 }
 //

 if(isset($_POST["sVille"])) {
    $Ville = htmlspecialchars($_POST["sVille"]);
 }
 //

 //
  if(isset($_POST["sNewsLetter"])) {
    $rNewsLetter = $_POST["sNewsLetter"];
 }

 if ($rNewsLetter=="on") {
    $rNewsLetter=1;
 } else {
    $rNewsLetter=0;
 }


 //

 /*
 DECLARATION DE LA REQUETE
  	IdClient 	Nom 	Prenom 	Adresse1 	Adresse2 	CodePostal 	Ville 	Email 	MotDePasse 	EstProspect 	NewsLetter 	
 */

 $SQL_AJOUT = "INSERT INTO client (Nom, Prenom, Adresse1, Adresse2, CodePostal, Ville, Email, MotDePasse, NewsLetter, EstProspect)
  VALUES ('$Nom', '$Prenom', '$Adresse1', '$Adresse2', '$CodePostal', '$Ville', '$Email', '$MotDePasse', '$rNewsLetter','1')";
print  $SQL_AJOUT;

//2. exécution du code SQL
$res = mysqli_query($conn,$SQL_AJOUT);
if($res) {//OK
    print "OK";
    //header("location:form_inscription.php");
} else {//MERDOUILLE
  //  header("location:form_inscription.php?error=104");
  print  $SQL_AJOUT;
}
?>