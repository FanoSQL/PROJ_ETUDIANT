

        
      <?php
      //------------- Dans tous les cas on affiche le listing des pays (ou le tableau)
       require_once "config/connexion.php";

        $SQL_PAYS = "SELECT * FROM liste_pays ORDER BY Pays ASC";
        print $SQL_PAYS;
        $res_pays = mysqli_query($conn,$SQL_PAYS);
    //-----------------------------------

    if ($res_pays) {
        while($ListeDesPays=mysqli_fetch_assoc($res_pays)) {
            $Libelle =$ListeDesPays["Pays"];
            print "<option value='$Libelle'>$Libelle</option>\n";

        }
    }
?>  
        
