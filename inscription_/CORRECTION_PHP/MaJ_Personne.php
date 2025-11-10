<?php
//En fait ce n'est pas terrible de balader le nom et le prénom de la perosnne sur une barre de navig
if($IdUsers>0 && !empty($IdUsers)) {
    $SQL_PERSONNE ="SELECT * FROM users WHERE IdUsers=$IdUsers";
    $res_personne = mysqli_query($conn,$SQL_PERSONNE);
    $NbPersonneConnecter = mysqli_num_rows($res_personne);
    if($NbPersonneConnecter>0) {//Mettre à jour le dossier de la personne pour
        //qu'elle ne refasse plus le QCM à chaque connexion...
        $SQL_UPDATE = "UPDATE users SET QCMOK=1 WHERE IdUsers=$IdUsers";
        $res_personne_update = mysqli_query($conn,$SQL_UPDATE);
   }

    /*$tableau_personne = mysqli_fetch_assoc($res_personne);
    $prenom = $tableau_personne["Prenom"];
    $nom = $tableau_personne["Nom"];*/
}

?>