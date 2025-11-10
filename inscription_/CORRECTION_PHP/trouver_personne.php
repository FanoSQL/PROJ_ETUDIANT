<?php
//En fait ce n'est pas terrible de balader le nom et le prénom de la perosnne sur une barre de navig
if($IdUsers>0 && !empty($IdUsers)) {
    $SQL_PERSONNE ="SELECT * FROM users WHERE IdUsers=$IdUsers";
    $res_personne = mysqli_query($conn,$SQL_PERSONNE);
    $tableau_personne = mysqli_fetch_assoc($res_personne);
    $prenom = $tableau_personne["Prenom"];
    $nom = $tableau_personne["Nom"];
}

?>