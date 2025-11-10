
<?php
$CodeErreur = 0;
if (isset($_GET["error"]) && !empty($_GET["error"])) {
    $CodeErreur= $_GET["error"];
}

//print "Code erreur récupéré = ".$CodeErreur;

switch ($CodeErreur) {
    case 280 :
        $message="Erreur du système, ce n'est pas vous...";
        break;

    case 200 :
        $message="Remplir complètement le formulaire...";
        break;

    default :
    $message = "";
    break;
}




?>

<span class="message rouge"><?=$message;?></span>


<form action="traitement_3.php" method="post">

    <input type="email" name="sEmail" id="" placeholder="Votre identifiant @"><br>
    <input type="password" name="sPassword" id="" placeholder="Votre mot de passe @"><br>


    <button type="submit">Se connecter</button>

</form>