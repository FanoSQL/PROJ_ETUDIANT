<!--
 <link rel="stylesheet" href="css/box.css">
Ici j'ai préparé le modèle qui affichere la liste des locations...
-->
<div class="box_container">

    <div class="zimg-annonce">
        <img src="photos/<?=$photo_maison;?>" alt="" class="img-annonce">
    </div>

    <div class="ztexte">
        <span class="titre-maison"><?=$titre_maison;?></span>
        <span class="prix-maison"><?=$prix_maison;?>&nbsp;&euro;</span>
        <div class="villeCodePostal">
            <span class="ville-maison"><?=$ville_maison." ".$codepostal_maison;?> - </span>
            <span class="date-anonce"><?=$date_annonce;?></span>
        </div>
    </div>

</div>
