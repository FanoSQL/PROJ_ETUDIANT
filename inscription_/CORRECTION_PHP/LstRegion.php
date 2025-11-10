

        
      <?php
      //------------- Dans tous les cas on affiche le listing des pays (ou le tableau)
       require_once "config/connexion.php";

        $SQL_REGION = "SELECT * FROM liste_region ORDER BY Region ASC";
        //print $SQL_REGION;
        $res_region = mysqli_query($conn,$SQL_REGION);
    //-----------------------------------

    if ($res_region) {
        while($ListeDesRegions=mysqli_fetch_assoc($res_region)) {
            $Libelle =$ListeDesRegions["Region"];
            print "<option value='$Libelle'>$Libelle</option>\n";

        }
    }
?>  
        
