<?php
/*
Les ARRAY sont des tableaux mémoires, 
avec des données structurées dans la mémoire du système (PC/Serveur)
Tableau à 1 entrée
*/
$nom = "DUPONT";
$prenom = "Stéphane";
$adresse = "Street";

//Tableau simple
$TableauSimple[0] = $nom." ".$prenom;//BON
$TableauSimple[1] = "DUPONT Stéphane";//BON
$TableauSimple[2] = "Le petit chaperon s'en allait au marché boire une tequila !";//BON
$TableauSimple[3] = "DUPONT Stéphane";//BON

//Tableau array()
$TableauChaine = [
    1 => "Ma chaine 1",
    2 => "Ma chaine 2",
];

//Autre type 
$TableauArray = array(1,2,3,4);
$TableauArray_Chaine = array("DUPONT", "EDOUARD","STEPHANE");
$TableauArray_Chaine = array($nom,$prenom,$adresse);
//------




?>
