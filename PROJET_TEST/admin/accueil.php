<?php
require_once "../config/config.php";

session_start();
/*$Nom = $_SESSION["NomClient"];
$Prenom = $_SESSION["PrenomClient"];*/
?>

<header>
    <a href="../Liste_boutique.php">Retour à la boutique</a>
</header>

<h1>Espace client</h1>
<hr>


<h2>Bienvenue <?=$_SESSION["NomClient"]."&nbsp;".$_SESSION["PrenomClient"];?></h2>

<!-- DASHBOARD -->

<div class="container-compte-client">

    <div class="z-button">
        <a class="link-button" href="liste_commandes.php">Vos Commandes</a>
    </div>

    <div class="z-button">
        <a class="link-button" href="#">Liste des envies</a>
    </div>

    <div class="z-button">
        <a class="link-button" href="#">Vos paiements</a>
    </div>

    <div class="z-button">
        <a class="link-button" href="#">Ma messagerie</a>
    </div>

    <div class="z-button">
        <a class="link-button" href="#">Adresses</a>
    </div>


    <div class="z-button"><!-- Modifier son mot de passe -->
        <a class="link-button" href="#">Connexion & Sécurité</a>
    </div>    
    <!--
    Liste des clients + recherche de client
    Liste des livraisons + logistique
    Liste des litiges (Avoirs, Remboursements, Contentieux)
-->

</div>