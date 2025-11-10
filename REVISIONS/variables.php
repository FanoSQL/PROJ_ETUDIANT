
<?php
//Commentaire de 1 ligne

/*
Mon commentaire multiligne
*/
//Initialisation...
$Nom = "DUPONT"; //Chaine, String, Texte, Varchar
$Prenom = "Laurent";
$Age = 22;//Entier, Int, Small Int, LongInt
$Poids = 72.50;//Décimal, Real, float
$Facture_A_Jour = false;//booléen, true/false, 1/0, yes/no, not, pas
$Loyer = 500.00;//réel monétaire
$CompteLocataire = "Débiteur";
$A_Payer = false;


//print $Nom;

/*
Je souhaite pouvoir vérifier que DUPONT est à jour de sa facture !
les opérateurs logiques :
== est une comparaison stricte...
<= inférieur ou égale
>= supérieur ou égale
!= N'est égale / Diéfférent de...    exclamation veut dire NOT / PAS
<> est différent de...

&&  : ET    AND
||  : OU    OR

*/

if ($A_Payer) {
    $CompteLocataire = "Créditeur";
    $Facture_A_Jour = true;
} else {
    $CompteLocataire = "Débiteur";
    $Facture_A_Jour = false;
}

?>


<h1>
    Bonjour <?=$Nom." ".$Prenom;?> votre compte locataire est <?=$CompteLocataire;?>
</h1>
