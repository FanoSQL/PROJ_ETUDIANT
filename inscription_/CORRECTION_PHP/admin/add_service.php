<?php
//------------ COMPOSANT DE CONNEXION BDD
require_once "../config/connexion.php";
//---------------------------------
$Libelle="";
$Mode=0;
$EstPublic=1;
$NomPhoto ="";
$Description = "";

if (isset($_GET["mode"]) && !empty($_GET["mode"])) {
    $Mode=1;
} 

if (isset($_GET["sLibelle"]) && !empty($_GET["sLibelle"])) {
    $Mode=1;
} 





if ($Mode==1) {//Ajouter un pays


    if (isset($_POST["sLibelle"]) && !empty($_POST["sLibelle"])) {
        $Libelle= htmlspecialchars($_POST["sLibelle"]);//Parade guillemets / faille de sécurité
        //print "Libelle OK = ".$Libelle;
    } 

    if (isset($_POST["sDescription"]) && !empty($_POST["sDescription"])) {
        $Description= htmlspecialchars($_POST["sDescription"]);//Parade guillemets / faille de sécurité
        //print "Libelle OK = ".$Libelle;
    } 

    if (isset($_POST["sNomPhoto"]) && !empty($_POST["sNomPhoto"])) {
        $NomPhoto= htmlspecialchars($_POST["sNomPhoto"]);//Parade guillemets / faille de sécurité
        //print "Libelle OK = ".$Libelle;
    } 

   /*if (isset($_POST["sTitreCours"]) && !empty($_POST["sTitreCours"])) {
        $Titre= htmlspecialchars($_POST["sTitreCours"]);//Parade guillemets / faille de sécurité
        //print "Libelle OK = ".$Libelle;
    } */

/*
 	IdCours 	Libelle 	Description 	NomPhoto 	EstPublic 	
*/

    //SQL
    $SQL_DOUBLON = "SELECT * FROM produits WHERE Libelle LIKE '%$Libelle%'";
    $res_doublon = mysqli_query($conn,$SQL_DOUBLON);
    $NbDoublon = mysqli_num_rows($res_doublon);

    if ($NbDoublon==0) {//On ajoute...
        $SQL_INSERT = "INSERT INTO produits (Libelle, Description, NomPhoto, EstPublic) VALUES ('$Libelle', '$Description', '$NomPhoto', '$EstPublic')";
        //print $SQL_INSERT;

        $res_add = mysqli_query($conn,$SQL_INSERT);

    }

}

//------------- Dans tous les cas on affiche le listing des pays (ou le tableau)
$SQL_PAYS = "SELECT * FROM produits ORDER BY Libelle ASC";
$res_pays = mysqli_query($conn,$SQL_PAYS);

//-----------------------------------



?>


<?php include_once "retour.php";?>


<h2>Ajouter un nouveau cours</h2>
<form action="add_service.php?mode=1" method="post">
    <!-- <div class="zinput">
        <input type="text" name="sTitreCours" id="" placeholder="TitreCours">
    </div>-->

    <div class="zinput">
        <input type="text" name="sLibelle" id="" placeholder="Nouveau cours">
    </div>

    <div class="zinput"><!-- Ce n'est pas un IPLOAD, mais idéalement un form upload à faire...-->
        <input type="text" name="sNomPhoto" id="" placeholder="Nouvelle photo">
    </div>

   <div class="zinput">
        <textarea name="sDescription" id="" cols="20" rows="5"></textarea>
    </div>

    <div class="zbutton">
        <button type="submit">Ajouter un cours</button>
    </div>

</form>


<hr>
<!-- LISTE DES PAYS -->
<h2>Liste des cours</h2>
<?php
    if ($res_pays) {
        while($ListeDesPays=mysqli_fetch_assoc($res_pays)) {
            $NomPhoto = $ListeDesPays["NomPhoto"];
            $Libelle=$ListeDesPays["Libelle"];
            //
            print "<img src='photo/$NomPhoto' class='img_course' width='100'>&nbsp;".$Libelle."<br>";//PS C'est mieux un include !
        }
    }
?>


<!-- -->