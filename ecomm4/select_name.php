<?php
//-------------------- COMPO BDD
require_once "config/connexion.php";
//-----------------------
/*
htmlspecialchars  ? NORME
Ho' Kong Fu = ho &apts; kong fu...
SELECT * FROM client WHERE RECHERCHE = 'Ho' Konf fu'
SELECT 
htmlentities 
stripslashes ' 
*/ 
$Chercher="";
if (isset($_POST["sChercher"]) && !empty($_POST["sChercher"])) {
    $Chercher = htmlspecialchars($_POST["sChercher"]);
} else {
    header("location:form_select.php?error=105");
}


//1. Le code SQL ?
/*
LIKE  %%  = CONTIENT
LIKE début % TERMINE PAR
LIKE fin % COMMENCE PAR
sql.sh site web pour le langage
 */
$SQL_CHERCHER = "SELECT * FROM client WHERE Nom LIKE '%$Chercher%' OR Prenom LIKE '%$Chercher%'";

//2. Exécuter : la requête
/*
$res est le résultat
ce résultat je le test ou non !
 */
$res = mysqli_query($conn,$SQL_CHERCHER);
$NbTrouver = mysqli_num_rows($res);//Nbre de ligne trouvées...
//3. Tableau avec mysqli_fetch_assoc
//Dans la mémoire il y aura un tableau qui se nomme ListeTrouver

if ($NbTrouver>0) {//TROUVER ?
    while($ListeTrouver = mysqli_fetch_assoc($res)) {
        $Nom = $ListeTrouver["Nom"];
        $Prenom = $ListeTrouver["Prenom"];
        $Email = $ListeTrouver["Email"];

        //.....Afficher le résultat : On sort ce ce qui est dans la mémoire
        //pour l'afficher à l'écran...
        include "afficher_select.php";
        //------------------
    }

} else {
    print "Pas de résultat !";
}

?>