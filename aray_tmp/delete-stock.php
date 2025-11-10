<?php
//------------
require_once "config/MesFonctions.php";
//------------
//Utiliser ma fonction de Connexion...
$conn = ConnectMySQLi();//Recup la connexion BDD...
//*---------------****
$idstock=0;
//
if (isset($_GET["idfiche"])) {
    $idstock = $_GET["idfiche"];
}

if ($idstock>0) {//CAS OK

    //1. SQL
    $SQL_DELETE  = "DELETE FROM stock WHERE IdStock=$idstock";
    $res_delete = mysqli_query($conn,$SQL_DELETE);

    if($res_delete) {
        header("location:liste_stock.php?idfiche=$idstock&sucess");
    }
 
} else {//CAS PAS OK idstock=0
        header("location:liste_stock.php?idfiche=$idstock&error=105");
}
?>