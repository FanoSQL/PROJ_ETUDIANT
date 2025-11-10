
<?php
/*
ARRAY() ?
Il s'agit de tableau mémoire !
Les array() sont des "variables" de type TABLEAU
*/

//Expression simple d'un tableau = déclaration
$ListeTache[0] = "Supervision";//Un tableau est composé d'une clé... Un peu comme l'IdClient => Ligne UNIQUE
$ListeTache[1] = "Ménage";//Un tableau est composé d'une clé... Un peu comme l'IdClient => Ligne UNIQUE
$ListeTache[2] = "Repassage";
$ListeTache[3] = "Rangement";
//Parfois il n'est pas toujours nécessaire de stocker physiquement des informations dans une BDD

//Un tableau peut avoir 0,n  ligne ? OUI
//On peut compter le nombre de ligne du tableau :
$NbLigne = count($ListeTache);
print "Il y a ".$NbLigne." ligne(s) dans le tableau ListeTache<br>";//Affichage du nombre de ligne
//print $ListeTache[1];//Affichage d'une ligne du tableau, ligne 1
//------
//Rappel boucle FOR / Créer un compteur / compter / Parcourir...
print "<select>";
for ($i=0;$i<=$NbLigne;$i++) {
    //Traitement..
    print "<option value='$ListeTache[$i]'>".$ListeTache[$i]."</option>";
}
print "</select>";


//---- 2nde façon de créer des tableaux mémoires
$ListeDesVilles = [
    1 => "Marseille",
    2 => "Lyon",
    3 => "Paris",
    4 => "Bordeau",
    5 => "Grenoble",
];

print "<hr>";
print "<br>";
print "<select>";
//POUR CHAQUE / FOREACH
$compteur = 0;
foreach($ListeDesVilles as $valeur) {
    $compteur++;//Compteur s'incrémente...
    //Traitement...
    //print $valeur."<br>";
    print "<option value='$valeur'>".$valeur."</option>";

    /*if($valeur=="Bordeau") {
        print "Vive le vin de Bordeau...";
        break;//Fin de boucle
    }*/

    if($compteur==3) {
        print "STOP !";
        break;//Fin de boucle
    }
}
print "</select>";

?>


