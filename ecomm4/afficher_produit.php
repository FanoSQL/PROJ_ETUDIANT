
<!--
-->

<?php
$LibelleBouton = "Ajouter au pnaier";

?>

<div class="boite_produit">
    
    <?php if (empty($Photo)) {$Photo="1.png";}?>
    <img class="photo" src="photos/<?=$Photo;?>" alt="<?=$Photo;?>" srcset="">
    <!--<img src="photos/1.png" alt="<?=$Photo;?>">-->
   <!-- <span><?=$Photo;?></span>-->

   <div class="zinfo">
    <span class="libelle">
        <?=$Libelle;?>
    </span>




    <span class="prix">
        <?=$Prix;?>
    </span>

    <p class="description">
        <?=$Description;?>
    </p>
</div>


    <div class="stock">

        <!--Je vais afficher le nombre d'article en stock-->
        <?php
            if($QteDisponible>0) {?>
            <select name="sStock" id="">
                <?php
                for ($i=1;$i<=$QteDisponible;$i++) {?>
                    <option value="<?=$i;?>"><?=$i;?></option>
                <?php }?>

            </select>

            <?php } else {?>
                <span class="stock"><?=$QteDisponible;?>
            <?php }?>
        


    </div>

    <!--
    <a class="BtnAfficherDetail" href="fiche-produit.php?article=<?=$IdProduit;?>">

    <a class="BtnModifierProduit" href="form_produit-modif.php?article=<?=$IdProduit;?>">Modifier la fiche</a>
    <a class="BtnSupprimerProduit" href="suppr-produit.php?article=<?=$IdProduit;?>">Supprimer la fiche</a>
-->
    <a class="BtnAjoutPanier" href="add-panier.php?article=<?=$IdProduit;?>"><?=$LibelleBouton;?></a><!-- INSERT -->


</div>