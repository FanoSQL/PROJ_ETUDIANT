
<?php
    include_once "commons/doctype.php";
    //include_once "form_login.php";
    session_start();

    //-------
    if (!isset($_SESSION["email"]) || empty($_SESSION["email"])) {
         header("location:index.php?logout");//Déconnexion quelconque...
    }
    //------------------------------------------------

    //--------- Liste des intervenants
    $res_liste = ListeIntervenant($conn);
    //---------------------------------
?>
    

<table>

    <thead><!-- Zone entete de colonnes -->
        <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th><!-- Mes boutons --></th>
        </tr>
    </thead>



    <tbody><!-- Zone corps du tableau -->
        <?php 
            while($ListeIntervenant = mysqli_fetch_assoc($res_liste)) {
                //$Nom = $ListeIntervenant["Nom"];
        ?>

        <tr>
            <td><?=$ListeIntervenant["Matricule"];?></td>
            <td><?=$ListeIntervenant["Nom"];?></td>
            <td><?=$ListeIntervenant["Prenom"];?></td>
            <td><?=$ListeIntervenant["Email"];?></td>
            <td><?=$ListeIntervenant["Telephone"];?></td>
            <td><!--Zone bouton--></td>
        </tr>

        <?php }?>

    </tbody>


</table>




</body>
</html>