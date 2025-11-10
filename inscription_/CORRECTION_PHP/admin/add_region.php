<?php
//------------ COMPOSANT DE CONNEXION BDD
require_once "../config/connexion.php";
//---------------------------------
$Libelle="";
$Mode=0;

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

    //SQL
    $SQL_DOUBLON = "SELECT * FROM liste_region WHERE Region LIKE '%$Libelle%'";
    $res_doublon = mysqli_query($conn,$SQL_DOUBLON);
    $NbDoublon = mysqli_num_rows($res_doublon);

    if ($NbDoublon==0) {//On ajoute...
        $SQL_INSERT = "INSERT INTO liste_region (Region) VALUES ('$Libelle')";
        //print $SQL_INSERT;

        $res_add = mysqli_query($conn,$SQL_INSERT);

    }

}

//------------- Dans tous les cas on affiche le listing des pays (ou le tableau)
$SQL_PAYS = "SELECT * FROM liste_region ORDER BY Region ASC";
$res_pays = mysqli_query($conn,$SQL_PAYS);

//-----------------------------------



?>

<?php include_once "retour.php";?>


<h2>Ajouter une nouvelle région</h2>
<form action="add_region.php?mode=1" method="post">
    <div class="zinput">
        <input type="text" name="sLibelle" id="" placeholder="Nouvelle région">
    </div>

    <div class="zbutton">
        <button type="submit">Ajouter une région</button>
    </div>

</form>


<hr>
<!-- LISTE DES PAYS -->
<h2>Liste des région</h2>
<?php
    if ($res_pays) {
        while($ListeDesPays=mysqli_fetch_assoc($res_pays)) {
            print $ListeDesPays["Region"]."<br>";//PS C'est mieux un include !
        }
    }
?>


<!-- -->