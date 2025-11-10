<?php include_once "retour.php";?>

<?php
//------------ COMPOSANT DE CONNEXION BDD
require_once "../config/connexion.php";
//---------------------------------

// IdUsers 	Email 	Nom 	Prenom 	MotDePasse 	Denomination 	Departement 	Region 	Telephone 	OKAgree 	OKEmail 	
//. Variable contenant le code SQL
$SQl_SELECT = "SELECT * from users";
$res = mysqli_query($conn,$SQl_SELECT);
$NbRes = mysqli_num_rows($res);

if ($NbRes>=1) {
    while($ListeDesUsers = mysqli_fetch_assoc($res)) {
        $IdUsers = $ListeDesUsers["IdUsers"];
        $Email = $ListeDesUsers["Email"];
        $Nom = $ListeDesUsers["Nom"];
        $Prenom = $ListeDesUsers["Prenom"];

        include "afficher_user.php";
    }
}

?>