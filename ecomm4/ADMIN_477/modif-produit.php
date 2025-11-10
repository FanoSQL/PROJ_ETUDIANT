<?php
/*      ETAPE B */
//-------------------- COMPO BDD
require_once "config/connexion.php";
//-----------------------

//Paramètre barre d'adresse = article
$IdProduit = 0;
//
if (isset($_GET["article"]) && !empty($_GET["article"])) {
    $IdProduit = $_GET["article"];
} else {
    header("location:select_produit.php?error=105");//Reselectionne le bon produit
}

//------------- POST
if(isset($_POST["sLibelle"]) && !empty($_POST["sLibelle"])) {
    $Libelle = htmlspecialchars($_POST["sLibelle"]); // iSQL sécurité (transforme les caractères dangereux en caractères HTML)
} else {
    header("location:form_produit-modif.php?error=105");
}

if(isset($_POST["sPhoto"]) && !empty($_POST["sPhoto"])) {
    $NomPhoto = htmlspecialchars($_POST["sPhoto"]); // iSQL sécurité (transforme les caractères dangereux en caractères HTML)
} else {
    header("location:form_produit-modif.php?error=106");
}

if(isset($_POST["sPrix"]) && !empty($_POST["sPrix"])) {
    $PrixTTC = htmlspecialchars($_POST["sPrix"]); // iSQL sécurité (transforme les caractères dangereux en caractères HTML)
} else {
    header("location:form_produit-modif.php?error=107");
}

if(isset($_POST["sDescription"]) && !empty($_POST["sDescription"])) {
    $Description = htmlspecialchars($_POST["sDescription"]); // iSQL sécurité (transforme les caractères dangereux en caractères HTML)
} 

if(isset($_POST["sStock"]) && !empty($_POST["sStock"])) {
    $Stock = htmlspecialchars($_POST["sStock"]); // iSQL sécurité (transforme les caractères dangereux en caractères HTML)
}
//---------



//print "A IdProduit = ".$IdProduit."<br>";
if($IdProduit>0) {
//print "B IdProduit = ".$IdProduit."<br>";

    //---THEORIE A et B ?
    $SQL_UPDATE = "UPDATE produit SET Libelle='$Libelle', Description='$Description', Prix='$PrixTTC', Stock='$Stock' WHERE IdProduit='$IdProduit'";
    //print "C SQL_UPDATE = ".$SQL_UPDATE."<br>";

    
    $res = mysqli_query($conn,$SQL_UPDATE);
    if ($res) {
        header("location:form_produit-modif.php?OK");//Form OK
    } else {
        header("location:form_produit-modif.php?error=106");//Form Error
    }



} else {//ON EST A ZERO ICI : GRAVE GRAVE GRAVE
    header("location:select_produit.php?error=105");//Form Error
}



?>