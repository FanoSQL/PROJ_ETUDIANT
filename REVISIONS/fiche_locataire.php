
    <!--<link rel="stylesheet" href="css/chercher.css">-->

<div class="maliste">

    <span class="Titre">
        Locataire : <?=$NomDeMonLocataire;?>
    </span>

    <div class="a-ligne">
        <a class="BtnSubmit vert" href="fiche.php?id=<?=$IdLocataire;?>">Consulter la fiche</a>
        <a class="BtnSubmit rouge" href="delete.php?id=<?=$IdLocataire;?>">Supprimer la fiche</a>
        <a class="BtnSubmit blanc" href="pause.php?id=<?=$IdLocataire;?>">Annuler le contrat</a>
    </div>

</div>