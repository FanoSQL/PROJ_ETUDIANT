<?php
/**
 * TEST DE CODIFICATION SELON LE PROJET ADHAXIS
 * ADHAXIS à fournit un classeur excel et des formules que je vais traduire en PHP
 * 
 * 
 * Client :
    *=CONCATENER(GAUCHE(K2;1);"-";MAJUSCULE(GAUCHE(I2;2));MOIS(P2);DROITE(ANNEE(P2);2);MAJUSCULE(GAUCHE(E2;3));TEXTE(B2;"0000"))
    *=CONCATENER(GAUCHE(Pays;1);"-";MAJUSCULE(GAUCHE(Ville;2));MOIS(Entrydate);DROITE(ANNEE(Entrydate);2);MAJUSCULE(GAUCHE(LastName;3));TEXTE(Order;"0000"))
    *
    *Partner :
    *PA0001+GAUCHE(Partner_register,2)
    *
    *Fund :
    *=MAJUSCULE(CONCATENER(GAUCHE(B2;3);GAUCHE(J2;2);GAUCHE(G2;3);GAUCHE(C2;1)))
    *=MAJUSCULE(CONCATENER(GAUCHE(Fund_Name;3);GAUCHE(Isocountry;2);GAUCHE(Fund_Zip;3);GAUCHE(Fund_Manager;1)))
    *
    *Operation :
    *=CONCATENER(GAUCHE(D2;4);DROITE(C2;7);"-";MOIS(E2);ANNEE(E2);"-";TEXTE(B2;"000000000"))
    *=CONCATENER(GAUCHE(FundID;4);DROITE(ClientID;7);"-";MOIS(Operation_Date);ANNEE(Operation_Date);"-";TEXTE(Operation_ordernumb;"000000000"))
    *
 * 
 * 
 * 
 * 
 */

//$machaine = "dupononet";
/*echo $machaine."<br>";

$reschaine = substr($machaine, -1);    // retourne la lettre de droite
echo $reschaine."<br>";


$reschaine = substr($machaine, -strlen($machaine), 1); // retourne la lettre de gauche
echo $reschaine."<br>";*/

//--------------


//--------------- Serveur
//$GLOBALS["serveur_adresse"] = $_SERVER['SERVER_ADDR'];//Adresse du serveur IP
//$GLOBALS["serveur_nom"] =  $_SERVER['SERVER_NAME'];//Adresse du serveur Domaine

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
//--------------------


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

function datedujour() {
   $date_fr = date("d/m/y");
   return $date_fr;
}

function nompage() {
   $path = $_SERVER['PHP_SELF']; // $path = /home/httpd/html/index.php
   $NomPage = basename ($path);
   return $NomPage;
}


function info($message) {
   // echo $message."<br>";
    return $message;
}

function info_dial($message) {
    $reschaine = "<script>";
    $reschaine .= "alert('".$message."')";
    $reschaine .= "</script>";
    //return $reschaine;
}

function alert($message) {
    $reschaine = "<script>";
    $reschaine .= "alert('".$message."')";
    $reschaine .= "</script>";
   // return $reschaine;
}

//Info et retour
function info_go($message) {
    print "
    <script>
        alert($message);
        window.history.go(-1);
    </script>
    ";
}

#----------- Raccourcis PHP
function PageAffiche($NomPage,$Paramètres) {//Webdev / PHP

    header("location:".$NomPage,$Paramètres);

}

function crypter($MonMotDePasse,$clef) {// PHP

   // La clé est recommandée pour un bon cryptage, mais n'est pas obligatoire...
   //Exemple de clé : $key="AABBCCDD"
   //T'a pas intérêt à perdre la clé !
    $Pass_crypter = crypt($MonMotDePasse,$clef);
   // echo "Mon mot de passe non crypté = ".$MonMotDePasse."<br>";
    //echo "Mon mot de passe crypté = ".$Pass_crypter."<br>";
    return $Pass_crypter;

}


//---- Je viens de créer cette dfonction le 28/08/2025, je ne l'ai pas testé
function decrypter($MonMotDePasse_crypter,$MotDePasse_Comparer) {// PHP
//Le mot de passe crypté est le mot de passe qui a subit le cryptage avec la commande crypt
//Le mot de passe comparé = est celui "qu'une personne" a saisie...
//Le résultat ne décrypte pas, mais renvoie que c'est VRAI si les 2 mots de passes correspondent
//FAUX si les 2 mots de passe ne corresponde pas...
   $OK=false;
   if (hash_equals($MonMotDePasse_crypter, crypt($MotDePasse_Comparer, $MonMotDePasse_crypter))) {
      //echo "Mot de passe valable OK !";
      $OK=true;
   } else {
      $OK=false;
   }

   return $OK;

}
//----------------------------------------

#------------------ Autres commandes tests dont HTML
function titre($niveau,$texte) {
    $reschaine = "<h".$niveau.">".$texte."</h".$niveau.">";
    return $reschaine;
}

function titre_class($niveau,$texte,$class) {
    $reschaine = "<h".$niveau." class='".$class."' >".$texte."</h".$niveau.">";
    return $reschaine;
}

function titre_id($niveau,$texte,$idcss) {
    $reschaine = "<h".$niveau." class='".$idcss."' >".$texte."</h".$niveau.">";
    return $reschaine;
}


/** Extraction chaine de caractère */
function droite($machaine) {
   $reschaine = substr($machaine, -1);    // retourne la lettre de droite
   return $reschaine;
}

function droite_extrait($machaine,$taille) {
   $reschaine = substr($machaine, -$taille);    // retourne un ensemble de lettre à partir de droite
   return $reschaine;
}


function gauche($machaine,$nb,$nbfin) {
   $reschaine = substr($machaine, $nb,$nbfin); // retourne la lettre de gauche
   return $reschaine;
}

function gauche_extrait($machaine,$taille) {
   $reschaine = substr($machaine, -strlen($machaine), $taille); // retourne un ensemble de lettre à partir de la gauche
   return $reschaine;
}

//Convertir en majuscule
function majuscule($machaine) {
   $reschaine = strtoupper($machaine); // retourne la lettre en majuscule
   return $reschaine;
}

//Convertir en minuscule
function minuscule($machaine) {
   $reschaine = strtolower($machaine); // retourne la lettre en minuscule
   return $reschaine;
}

function remplacer($machaine,$chaine_chercher,$nouvelle_chaine) {
   $reschaine = str_replace($chaine_chercher, $nouvelle_chaine, $machaine);
   return $reschaine;
}

function sansespace($machaine) {
   $reschaine = str_replace(" ", "", $machaine);
   return $reschaine;
}

function taille($machaine) {
   $reschaine = strlen($machaine); // retourne la taille de la chaine
   return $reschaine;
}


//Nbr de caractères contenu dans une chaine
function ChaineOccurence($machaine) {
   $reschaine = strlen($machaine); // retourne la taille de la chaine
   return $reschaine;
}


//Vérifie si caractère recherché est contenu dans une chaine
function ChaineContient($machaine,$chainechercher) {
   //$machaine = 'abc';
   //$chainechercher   = 'a';
   $ChaineTrouver = strpos($machaine, $chainechercher);
   return $ChaineTrouver;
   // Notez notre utilisation de ===.  == ne fonctionnerait pas comme attendu
   // car la position de 'a' est la 0-ième (premier) caractère.
   /*if ($ChaineTrouver === false) {
       echo "La chaîne '$chainechercher' ne se trouve pas dans la chaîne '$machaine'";
   } else {
       echo "La chaine '$chainechercher' a été trouvée dans la chaîne '$machaine'";
       echo " et débute à la position $ChaineTrouver";
   }*/
}

function ExtraitChaine($chaine_debut,$Nb,$sep,$RangElement) {
  // $str = 'one|two|three|four';
/*
Avec explode : 4|coucou

Ecrit ainsi :
$returnValue = explode('|', '4|coucou', 2);

Va sortir :
 array (
  0 => '4',
  1 => 'coucou',
)

 */
$returnValue = explode($sep, $chaine_debut, $Nb);
//retunrvalue est un tableau...
$chaine_extraite=$returnValue[$RangElement];
return $chaine_extraite;

}

function ExtraitURL($machaine) {
   //https://vimeo.com/801530188/fdfa5ceb1e
   list($protocole, $vide1, $vide2, $nomdomaine, $valeur1, $valeur2, $valeur3) = explode("/", $machaine);
  // echo $protcole; // foo
 //  echo $nomdedomaine; // *
   
}

function EstNumérique($machaine) {
   $reschaine = is_int($machaine); // retourne vrai ou faux si l'information est un nombre
   return $reschaine;
}

function EstEntier($machaine) {
   $reschaine = is_int($machaine); // retourne vrai ou faux si l'information est un nombre
   return $reschaine;
}
//-----------------------------------------------

//*************  PERIODE */
function moisEnCours() {
   $resint = date("m"); // retourne le mois en cours en integer
   return $resint;
}

function moisEnLettre() {
   $reschaine = date("M"); // retourne le mois en cours en lettre
   return $reschaine;
}

function AnneeEnCours() {
   $reschaine = date("Y"); // retourne l'année en cours
   return $reschaine;
}

function JourSemaine() {
   $jour="Néant";
   $jour_num = date('j');
   switch ($jour_num) {
      case 1 : $jour="Lundi";break;
      case 2 : $jour="Mardi";break;
      case 3 : $jour="Mercredi";break;
      case 4 : $jour="Jeudi";break;
      case 5 : $jour="Vendredi";break;
      case 6 : $jour="Samedi";break;
      case 7 : $jour="Dimanche";break;
   }
   return $jour;
}

//------ A tester  02/07/2025
function MoisDernier() {
   $reschaine = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
   return $reschaine;
}

function AnneeSuivante() {
   $reschaine  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);
   return $reschaine;
}
//-----------------

function fSauveTexte($CheminEtFichier,$LigneSauve) {
   //Sauvegarder un texte, un contenu
   file_put_contents($CheminEtFichier,$LigneSauve);
}

//------ IDENTIQUE A fSauveTexte, créé le 28/08/2025
function CreerFichier($CheminEtFichier,$LigneSauve) {
   //Sauvegarder un texte, un contenu
   file_put_contents($CheminEtFichier,$LigneSauve);
}
//------ 

//------- Créé le 28/08/2025, PAS TESTER
function fChargeTexte($CheminEtFichier, $NomFichier, $ftrace) {
        $filename = $CheminEtFichier.$NomFichier;
     //echo "Chemin du fichier = ".$filename."<br>\n";
   
     if (file_exists($filename)) {
        // echo "Le fichier $filename existe.<br>\n";
   
         //On récupère le contenu du fichier
         $fichier_trace = file_get_contents($CheminEtFichier.$NomFichier);            
         //On ajoute notre nouveau texte à l'ancien
         $fichier_trace .= $ftrace;              
         //On écrit tout le texte dans notre fichier
         file_put_contents($CheminEtFichier.$NomFichier, $fichier_trace."\n");
     }else {
         //echo "Le fichier $filename n'existe pas.<br>\n";
   
         $fichier_trace = $ftrace;
        file_put_contents($CheminEtFichier.$NomFichier, $fichier_trace."\n");
   
     }

}


//------- Créé le 28/08/2025, PAS TESTER
function fFichierExiste($CheminEtFichier, $NomFichier) {
        $filename = $CheminEtFichier.$NomFichier;
     //echo "Chemin du fichier = ".$filename."<br>\n";
   
     if (file_exists($filename)) {
        // echo "Le fichier $filename existe.<br>\n";
        $OK=true;//Le fichier existe...
     } else {
         $OK=false;//Le fichier n'existe pas...
     }

     return $OK;

}
//--------------------------------

//--------- ESSAIE CONNEXION BDD n28/08/2025
//----Pertinence non évaluée...
function ConnexionBaseDeDonnees($user,$NomBaseDeDonnees,$Port,$TypeBase) {
   
   $serveur="localhost";
   $user="root";
   $password="";

  switch ($TypeBase) {
      case "MARIADB" ://Base de données MariaDB
         break;

      case "SQLEXPRESS" :
         break;

      default :
         $conn = MySQL($serveur,$user,$password);
         break;
  }
  
  function MySQL($serveur,$user,$password) {
      if (empty($Port)) {$Port="3306";}//On part du principe que c'est une base MySQL...
      if (!empty($NomBaseDeDonnees)) {
         //-------
         $conn = mysqli_connect($serveur,$user,$password,$NomBaseDeDonnees);
         //-------
      } else {
         $conn=false;
      }

      return $conn;
  }



   return $conn;

}

//------------------------------

function texte($montexte, $monformat) {
      //** Je crée la fonction TEXTE comme sous excel */
   //$montexte ="7";//Le nombre (chaine) saisie par la personne
   //$monformat = "0000";//Le format que je dois respecter
   $nbformat=strlen($monformat);//Je compte le nombre de lettre dans le format attendu
   $nbsaisie=strlen($montexte);//Je compte le nombre de lettre dans le format attendu

   //***** Je converti en INT (entier) */
   $inbformat = (int)$nbformat;
   $inbsaisie = (int)$nbsaisie;

   /*
   Résultat attendu  : 0999
   */
   //echo "inbformat = ".$inbformat."<br>";
   //echo "inbsaisie = ".$inbsaisie."<br>";

   if ($inbformat>$inbsaisie) {
      $correction="0".$montexte;
      $NbChaineAjout = ($inbformat-$inbsaisie);

   // echo "NbChaineAjout = ".$NbChaineAjout."<br>";
      $reschaine="";

      for ($i=1;$i<=$NbChaineAjout;$i++) {
         $reschaine .= substr($monformat, -strlen($monformat), 1);//On prend la première lettre du format, exemple 0, sur 0000
      }
      //Résultat
      $reschaine = $reschaine.$montexte;
      return $reschaine;

   } else {
      $reschaine = $montexte;
      return $reschaine;
   }

}


//--------------- Trier dans un tableau
function TrieTableau($NomTaleau,$Ordre) {
   $ValeurRecup="";
   //Trier un tableau par ordre croissant
   if($Ordre=="CROISSANT" || $Ordre=="croissant" || $Ordre=="ASC") {
      sort($NomTaleau);
   }

    //Trier un tableau par ordre déroissant
   if($Ordre=="DECROISSANT" || $Ordre=="decroissant" || $Ordre=="DESC") {
      asort($NomTaleau);
   }

   $ligne=0;
   foreach ($NomTaleau as $key => $val) {
    //echo "$key = $val\n";
    if ($ligne==0) {$ValeurRecup=$val;$ValeurRecup .="|".$key;}
   }
   
  
   return $ValeurRecup;


}

function trace($ftrace) {
   //print "<script>alert('trace appelé');</script>";
     //**************** CHEMIN FICHIER CSV */
     if (!$GLOBALS["EnModeTest"]) {//On est en mode déploiement
         $chemin = "D:\\Plesk\\Vhosts\\default\\htdocs\\gomailserver\\data\\";
     } else {//On est en mode développement
         $chemin = "./";//"C:".chr(92)."MesProjets".chr(92)."laragon".chr(92)."www".chr(92)."CLIENTS_".chr(92)."adhaxis_05".chr(92)."archives".chr(92)."template_1".chr(92)."srtdash-admin-dashboard-master".chr(92)."srtdash-admin-dashboard-master".chr(92)."adhaxis_06";
     }
     //*******************************
     //print "<script>alert('$chemin');</script>";
   
     $filename = $chemin.'filetrace.html';
     //echo "Chemin du fichier = ".$filename."<br>\n";
   
     if (file_exists($filename)) {
        // echo "Le fichier $filename existe.<br>\n";
   
         //On récupère le contenu du fichier
         $fichier_trace = file_get_contents($chemin.'filetrace.html');            
         //On ajoute notre nouveau texte à l'ancien
         $fichier_trace .= $ftrace;              
         //On écrit tout le texte dans notre fichier
         file_put_contents($chemin.'filetrace.html', $fichier_trace."\n");
     
   
     } else {
         //echo "Le fichier $filename n'existe pas.<br>\n";
   
         $fichier_trace = $ftrace;
        file_put_contents($chemin.'filetrace.html', $fichier_trace."\n");
   
     }
   
   
   //J'ouvre le popup de trace fRepExe, fRepWeb
   global $url_server;
   $url_server="http://".$GLOBALS["serveur_adresse"]."/CLIENTS_/adhaxis_05/archives/template_1/srtdash-admin-dashboard-master/srtdash-admin-dashboard-master/adhaxis_06/filetrace.html";
   //print $url_server;
   print "
   <script>
     //alert('Test popup');
     //Ouvrir une fenêtre navigateur redimensionnée
     let MonPopup = window.open('$url_server',".chr(34).chr(34).",".chr(34)."width=600,height=600".chr(34).");
   
     //Redmimensionner une fenêtre
     MonPopup.resizeTo(1024, 768);
   </script>
   ";
   
   
   
   
   
   }


/*
$chaine = majuscule($machaine);
echo $chaine."<br>";


$chaine = moisEnLettre();
echo $chaine."<br>";

$mois = moisEnCours();
echo $mois."<br>";

$chaine = texte(5,"IIIIIII");
echo $chaine;
*/




function fFichierExiste_Non($filename, $chemin, $ftrace) {


   if (file_exists($filename)) {
      // echo "Le fichier $filename existe.<br>\n";
 
       //On récupère le contenu du fichier
       $fichier_trace = file_get_contents($chemin.'filetrace.html');            
       //On ajoute notre nouveau texte à l'ancien
       $fichier_trace .= $ftrace;              
       //On écrit tout le texte dans notre fichier
       file_put_contents($chemin.'filetrace.html', $fichier_trace."\n");
   
 
   } else {
       //echo "Le fichier $filename n'existe pas.<br>\n";
 
       $fichier_trace = $ftrace;
      file_put_contents($chemin.'filetrace.html', $fichier_trace."\n");
 
   }



}




function TantQue($inc,$NbLimite) {


   //$inc est un entier=0
   while($inc<$NbLimite) {
      $inc++;
   }


}


function POUR($val_min,$operateur) {
//$operateur = "<=";

   for ($i=1;$i.$operateur.$val_min;$i++) {
	
	
   }


}


 

?>