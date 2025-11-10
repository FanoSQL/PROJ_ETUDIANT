
<!--
-->

<div class="boite_produit">
    
    <?php if (empty($Photo)) {$Photo="1.png";}?>
    <img class="photo" src="photos/<?=$Photo;?>" alt="<?=$Photo;?>" srcset="">
    <!--<img src="photos/1.png" alt="<?=$Photo;?>">-->
    <span><?=$Photo;?></span>
    <span class="libelle">
        <?=$Libelle;?>
    </span>




    <span class="prix">
        <?=$Prix;?>
    </span>

    <p class="description">
        <?=$Description;?>
    </p>

    <span class="stock">
        <?=$QteDisponible;?>
    </span>

    <a class="BtnAfficherDetail" href="fiche-produit.php?article=<?=$IdProduit;?>">Voir le détail</a><!-- SELECT -->

    <a class="BtnModifierProduit" href="form_produit-modif.php?article=<?=$IdProduit;?>">Modifier la fiche</a><!-- UPDATE -->
    <a class="BtnSupprimerProduit" href="suppr-produit.php?article=<?=$IdProduit;?>">Supprimer la fiche</a><!-- DELETE -->

    <a class="BtnAjoutPanier" href="add-panier.php?article=<?=$IdProduit;?>">AJouter au pnaier</a><!-- INSERT -->


</div>