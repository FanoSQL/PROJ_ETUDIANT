


    <?php
    if (isset($_POST["sChercher"]) && !empty($_POST["sChercher"])) {
        $sChercher=  $_POST["sChercher"];
    }

    ?>

    
    <div class="container">

            <?php
            //-------------------- COMPO BDD
            require_once "config/connexion.php";
            //-----------------------

            $SQL_PRODUIT = "SELECT * FROM produit WHERE Libelle like '%$sChercher%'";//WHERE <---CLAUSE

            //2. Exécuter : la requête
            /*
            $res est le résultat
            ce résultat je le test ou non !
            */
            $res = mysqli_query($conn,$SQL_PRODUIT);
            $NbTrouver = mysqli_num_rows($res);//Nbre de ligne trouvées...
            //3. Tableau avec mysqli_fetch_assoc
            //Dans la mémoire il y aura un tableau qui se nomme ListeTrouver

            if ($NbTrouver>0) {//TROUVER ?
                while($ListeProduit = mysqli_fetch_assoc($res)) {//Fabrique
                    $Libelle = $ListeProduit["Libelle"];
                    $IdProduit = $ListeProduit["IdProduit"];
                    $Description = $ListeProduit["Description"];
                    $Photo = $ListeProduit["Photo"];
                    $Prix = $ListeProduit["Prix"];
                    $QteDisponible = $ListeProduit["Stock"];

                    //print $Libelle;
                    //.....Afficher le résultat : On sort ce ce qui est dans la mémoire
                    //pour l'afficher à l'écran...
                    include "afficher_produit.php";
                    //------------------
                }

            } else {
                print "La boutique n'est pas en service !";
            }

            ?>



</header>




