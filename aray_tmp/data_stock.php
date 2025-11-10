<?php
//------------
require_once "config/MesFonctions.php";
//------------

//Utiliser ma fonction de Connexion...
$conn = ConnectMySQLi();//Recup la connexion BDD...
$NomProduit="";
$QteProduit=0;
//
if (isset($_POST["sNomProduit"])) {
    $NomProduit = htmlspecialchars($_POST["sNomProduit"]);
}

if (isset($_POST["sQteEntree"])) {
    $QteProduit = $_POST["sQteEntree"];
}

if ($QteProduit>0) {
    $DateEntree = DateDuJour();
    //1.Une requete
    // 	IdStock 	Libelle 	QteEntree 	DateEntree 	DateSortie 	QteSortie 	
    $SQL_INSERT = "INSERT INTO stock (Libelle, QteEntree, DateEntree) 
    VALUES ('$NomProduit', $QteProduit,'$DateEntree')";
    $res = mysqli_query($conn,$SQL_INSERT);
    if($res) {
        header("location:form_stock.php");//Retour vers le formulaire
    }
}



?>