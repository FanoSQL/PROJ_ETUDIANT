<?php
/*
Qu'est-ce qu'une fonction ?
Une fonction sert à condenser, contenir tout ou partie d'un programme
une page php, py, js sont censée être tout ou partie d'un programme
Une fonction peut donc être appelé : SOUS-PROGRAMME

On crée des fonctions pour qu'elles soient réutilisée régulièrement...

*/

//Pour obtenir la date du jour on va utiliser la commande PhP


//Permet de déclarer une fonction = function
/*
Tout ce qui se trouve à l'intérieur de la fonction appartient à la fonction
n'appartient pas au programme...

SAUF...

 */
function DateDuJour() {
    $datedujour=date("d-m-y");
    print $datedujour;
    //$datedujour ne peut pas sortir du programme
    //Toutes les variables à l'intérieur de la fonction ont une portée local...
}

//-------------- A TESTER -----

function heuresys() {
   $heure = time(); //1660338149
   return $heure;
}

function aujourdhui() {
   $aujourdhui = date("Ymd"); //20230404
   return $aujourdhui;
}

function date_en() {
   $date_en = date("Ymd");                             // 20010310
   return $date_en;
}

function dateheure() {
   $dateheure = date("Y-m-d H:i:s"); 
   return $dateheure;
}

/*function datedujour() {
   $date_fr = date("d/m/y");
   return $date_fr;
}*/

function nompage() {
   $path = $_SERVER['PHP_SELF']; // $path = /home/httpd/html/index.php
   $NomPage = basename ($path);
   return $NomPage;
}

function EnModeTest() {
   $NomServeur = $_SERVER['SERVER_NAME'];//Adresse du serveur Domaine
   //global $serveur_nom;
   //$serveur_nom = $NomServeur;
   if ($NomServeur=="localhost") {
      return true;//Je suis en localhost
   } else {
      return false;//Je suis sur l'hébergement
   }
   
}


function AnneeEnCours() {
   $reschaine = date("Y"); // retourne l'année en cours
   return $reschaine;
}

function JourSemaine() {
   $jour="Néant";
   $jour_num = date('l');
   switch ($jour_num) {

     case "Monday" : $jour="Lundi";break;
     case "Tuesday" : $jour="Mardi";break;
     case "Wednesday" : $jour="Mercredi";break;
     case "Thursday" : $jour="Jeudi";break;
     case "Friday" : $jour="Vendredi";break;
     case "Saturday" : $jour="Samedi";break;
     case "Sunday" : $jour="Dimanche";break;

   }
   return $jour;
}
//---------------------------





//Une fonction peut prendre ou non un paramètre
//---Un paramètre est un élément externe-interne nécessaire au fonctionnement
//de la fonction
function Message() {
    print "<h1>hello le monde</h1>";
}


//Un paramètre porte le nom que l'on veut
//C'est une variable qui porte le nom que l'on veut...
function Message_dial($message) {
    print "<h1>".$message."</h1>";
}

function info($message) {
    $reschaine = "<script>";
    $reschaine .= "alert('".$message."')";
    $reschaine .= "</script>";
    return $reschaine;//RETOUR / RENVOIE DU RESULTAT DE LA FONCTION
}

function ListeDesClient() {

}

function PrixTTC($puht,$qte) {
   $resultat = ($puht*$qte)*1.2;
   return $resultat;
}


function ConnectDataBase() {
   //SImple sans parametre
   print "Database OK !";
   for ($i=1,$i<=5,$i++) {
      print $i."<br>";
   }
}

function ConnexDataBase($conn, $server, $user, $database, $pwd) {
   //Fonction avec paramètre
   $conn =mysqli_connect($server, $user, $pwd, $database);
   return $conn;//RENVOIE
}

function NomPrenom($Nom) {
   //$Nom = "";
   $Prenom = "STEPHANE";
   return $Nom;
}

/*
PROGRAMMATION PROCEDURALE PHP

Class --> Programmation Objet.

PHP NATIVE / FE (PROCEDURAL)

*/

//-----------------------------------------------------------------------

$NomClient = NomPrenom("CLEMENT");

//Pour appeler une fonction il faut l'appeler par son nom, bien entendu avec ses parenthèses...
//Message_dial("Salut les loulous");
/*$retour = info("Salut");
print $retour;*/
//----------------------------------------------------------------------
$toto = "Salut";
$t = info($toto);

$mapage = nompage();
print $mapage;

$MonServeur = EnModeTest();
print $MonServeur;

$j = JourSemaine();
print $j;
?>
