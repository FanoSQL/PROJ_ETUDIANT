<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/chercher.css">
</head>
<body>
    
<?php
//----------------------
include_once "config/connexion.php";
//----------------------
$id=0;//Initialiser

/*
Récupérer les infosdu formulaire :
NB : Je ne ferais pas de combinaisons pour la recherche d'un locataire.

Une combinaison ?
Exemple :
Si Nom<>"" ET Prenom<>"" et Adresse<>"" ET...

Car trop long...(et je n'en ai pas envie !)

----- Autre :
htmlspecialchars() //Permet de convertir des caractères non autorisés pour les utiliser dans une requête
*/

if(isset($_POST["sNom"]) && !empty($_POST["sNom"])) {
    $Nom = $_POST["sNom"];
} else {
    $Nom="";
}

if(isset($_POST["sAdresse"]) && !empty($_POST["sAdresse"])) {
    $Adresse = $_POST["sAdresse"];
} else {
    $Adresse="";
}


if(isset($_POST["sCodePostal"]) && !empty($_POST["sCodePostal"])) {
    $CodePostal = $_POST["sCodePostal"];
} else {
    $CodePostal="";
}

if(isset($_POST["sVille"]) && !empty($_POST["sVille"])) {
    $Ville = $_POST["sVille"];
} else {
    $Ville="";
}


//---- S'il y a le nom je vais privilégier le nom (je ne ferais pas de combinaison)
if (!empty($Nom)) {
    //Je vais rendre invalide tous les autres
    $Adresse = "";
    $CodePostal = "";
    $Ville = "";
    $Colonne = "Nom";//J'enregistre la colonne de la table pour m'éviter de faire trop de requête...
    $Valeur = $Nom;//J'enregistre la valeur à rechercher
}

//---- S'il y a l'adresse je vais privilégier l'adresse (je ne ferais pas de combinaison)
if (!empty($Adresse)) {
    //Je vais rendre invalide tous les autres
    $Nom = "";
    $CodePostal = "";
    $Ville = "";
    $Colonne = "Adresse";//J'enregistre la colonne de la table pour m'éviter de faire trop de requête...
    $Valeur = $Adresse;//J'enregistre la valeur à rechercher
}


//---- S'il y a le code postal je vais privilégier le code postal (je ne ferais pas de combinaison)
if (!empty($CodePostal)) {
    //Je vais rendre invalide tous les autres
    $Nom = "";
    $Adresse = "";
    $Ville = "";
    $Colonne = "CodePostal";//J'enregistre la colonne de la table pour m'éviter de faire trop de requête...
    $Valeur = $CodePostal;//J'enregistre la valeur à rechercher
}

//---- S'il y a la ville je vais privilégier la ville (je ne ferais pas de combinaison)
if (!empty($Ville)) {
    //Je vais rendre invalide tous les autres
    $Nom = "";
    $Adresse = "";
    $CodePostal = "";
    $Colonne = "Ville";//J'enregistre la colonne de la table pour m'éviter de faire trop de requête...
    $Valeur = $Ville;//J'enregistre la valeur à rechercher
}


//--------- ON CHERCHE TOUT SI TOUT EST VIDE ! (LE FORM)
/*if ($Nom="*") {
    $Colonne="";
    $Valeur="";

    $SQL_CHERCHER_LOCATAIRE = "SELECT * FROM locataire";
    $res= mysqli_query($conn,$SQL_CHERCHER_LOCATAIRE);
    $NbPersonneTrouver = mysqli_num_rows($res);

    //On vérifie le nombre de résultat
    if($NbPersonneTrouver>=1) {
        AfficherResultat($conn,$res);
    } else {//Erreur pas de résultat
        header("location:form_chercher_locataire.php?error=CL&nb=0");
    }


}*/

if (!empty($Colonne) && !empty($Valeur)) {
    $Valeur = htmlspecialchars($Valeur);
    $SQL_CHERCHER_LOCATAIRE = "SELECT * FROM locataire WHERE $Colonne LIKE '%$Valeur%'";
    $res= mysqli_query($conn,$SQL_CHERCHER_LOCATAIRE);
    $NbPersonneTrouver = mysqli_num_rows($res);

    //On vérifie le nombre de résultat
    if($NbPersonneTrouver>=1) {
        AfficherResultat($conn,$res);
    } else {//Erreur pas de résultat
        header("location:form_chercher_locataire.php?error=CL&nb=0");
    }


} else {//Erreur : Formulair enon rmeplit ou défaut système
    header("location:form_chercher_locataire.php?error=CL");
}


//------ Mettre à jour les données de la table locataire
function MettreAJourDateLocation($conn,$IdLocataire) {
    $date = date("d-m-y");
    $SQL_DATE_LOCATION = "UPDATE locataire SET DateLocation='$date' Where IdLocataire='$IdLocataire'";
    $res_date = mysqli_query($conn,$SQL_DATE_LOCATION);
}
//----------------------


//------Chercher dans la table des annonces....
function ChercherLocation($conn,$IdLocation) {
    $SQL_ANNONCE = "SELECT * FROM annonces Where IdAnnonce='$IdLocation'";
    $res_annonce = mysqli_query($conn,$SQL_ANNONCE);
    //$NbResAnnonce = mysqli_num_rows($res_annonce);
    return $res_annonce;
}

//------ Préparer la recherche de résultat...
function AfficherResultat($conn,$res) {
    while($ListeLocataire = mysqli_fetch_assoc($res)) {
    $IdLocataire = $ListeLocataire["IdLocataire"];
    $NomDeMonLocataire = $ListeLocataire["Nom"];
    $PrenomDeMonLocataire = $ListeLocataire["Prenom"];
    $EmailDeMonLocataire = $ListeLocataire["Email"];
    $TelDeMonLocataire = $ListeLocataire["Telephone"];
    $APayer = $ListeLocataire["APayer"];
    $IdLocation = $ListeLocataire["IdAnnonce"];
    $Photo = $ListeLocataire["Photo"];
    $Ville = $ListeLocataire["Ville"];
    $DebutLocation = $ListeLocataire["DateLocation"];
    
    //-------- garde fou...
    if (empty($DebutLocation)) {
        MettreAJourDateLocation($conn,$IdLocataire);
    }
    //------ Création de données qui n'ont pas été saisies...
    if ($IdLocation>0 && empty($Photo)) {
    //----Exceptionnellement je vais chercher des données dans la table annonces
        $res_annonce = ChercherLocation($conn,$IdLocation);
        //NB : La bonne méthode est supposée de faire une requête jointe INNER JOIN, voir SQL.sh
        if ($res_annonce) {
               $NbResAnnonce = mysqli_num_rows($res_annonce);
               $Annonce = mysqli_fetch_assoc($res_annonce);
               $Adresse_Annonce = htmlspecialchars($Annonce["adresse"]);
               $CodePostal_Annonce = htmlspecialchars($Annonce["codepostal"]);
               $Ville_Annonce = htmlspecialchars($Annonce["ville"]);
               $Photo_Annonce = htmlspecialchars($Annonce["photo"]);
               $SQL_MAJ_LOCATION = "UPDATE locataire SET Adresse='$Adresse_Annonce', CodePostal='$CodePostal_Annonce', Ville='$Ville_Annonce', Photo='$Photo_Annonce' WHERE IdLocataire='$IdLocataire'";
                
                $Photo = $Photo_Annonce;
                $Ville = $Ville_Annonce;

               mysqli_query($conn,$SQL_MAJ_LOCATION);
      }
    }
    //------------------------------------------
    //print $NomDeMonLocataire;
    //print "<h1>$IdLocataire</h1>";
    include "fiche_locataire.php";
    }

}
?>



</body>
</html>
