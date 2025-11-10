<?php
//------------ COMPOSANT DE CONNEXION BDD
require_once "config/connexion.php";
//---------------------------------
$Nom="";
$Prenom="";
$Email="";
$MotDePasse="";
$Denomination="";
$Departement="";
$Region="";
$Telephone="";
$Agree=1;
$OkMail=0;

if (isset($_POST["sEmail"]) && !empty($_POST["sEmail"])) {
    $Email= $_POST["sEmail"];
}


if (isset($_POST["sMotDePasse"]) && !empty($_POST["sMotDePasse"])) {
    $MotDePasse= $_POST["sMotDePasse"];
} 

if (isset($_POST["sNom"]) && !empty($_POST["sNom"])) {
    $Nom= $_POST["sNom"];
} 

if (isset($_POST["sPrenom"]) && !empty($_POST["sPrenom"])) {
    $Prenom= $_POST["sPrenom"];
} 


if (isset($_POST["sAgree"]) && !empty($_POST["sAgree"])) {
    $Agree= $_POST["sAgree"];
} 

if (isset($_POST["sOkEmail"]) && !empty($_POST["sOkEmail"])) {
    $OkMail= $_POST["sOkEmail"];
} 


if (isset($_POST["sDenomination"]) && !empty($_POST["sDenomination"])) {
    $Denomination= $_POST["sDenomination"];
} 

if (isset($_POST["LstPays"]) && !empty($_POST["LstPays"])) {
    $Pays= $_POST["LstPays"];
} 

if (isset($_POST["LstRegion"]) && !empty($_POST["sRegLstRegionion"])) {
    $Region= $_POST["LstRegion"];
} 


print $Nom."<br>";
print $Prenom."<br>";
print $MotDePasse."<br>";
print $Email."<br>";
print $OkMail."<br>";


//------ RADIO CHECKBOX
if ($Agree="on") {
    $Agree=1;
} else {
    $Agree=0;
}

if ($OkMail="on") {
    $OkMail=1;
} else {
    $OkMail=0;
}
//---------- TEST DE DOUBLON

//1.REQ SQL
$SQL_DOUBLON = "SELECT * FROM users WHERE Email='$Email'";

//2. Executer la requête
$res = mysqli_query($conn,$SQL_DOUBLON);
$NbDoublon = mysqli_num_rows($res);

//---------------------------

print "Doublon ? $NbDoublon<br>";
//print "res ? $res<br>";

if ($NbDoublon==0) {//L'adresse email n'existe pas dans la table : la perosnne n'est pas inscrite
    
    // 	IdUsers 	Email 	Nom 	Prenom 	MotDePasse 	Denomination 	Departement 	Region 	Telephone 	OKAgree 	OKEmail 	
    //1.REQ SQL
    $SQL_INSERT = "INSERT INTO users (Email, Nom, Prenom, MotDePasse, Denomination, Departement, Region, Telephone, OKAgree, OKEmail) 
    VALUES ('$Email', '$Nom', '$Prenom', '$MotDePasse', '$Denomination', '$Departement', '$Region', '$Telephone', '$Agree', '$OkMail')
    ";
    //print $SQL_INSERT."<br>";

    //2. Executer la requête
    $res = mysqli_query($conn,$SQL_INSERT);

    //3. Tester le res s'il est bon ?
    if ($res) {
        //INSERT OK
        //print "hello le monde";
        header("location:page_2.php?inscrit=ok");//TOUT EST OK
    } else {
        //Retour au formulaire
       // print "That's all folk !";

        header("location:accueil.php?inscrit=pok");//ERREUR
   }




} else {//EN cas de doublon risqué 

    header("location:form_inscription.php?doublon=100");
}