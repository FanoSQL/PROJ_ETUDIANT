<?php

//print "Hello le monde !";

$Nom = $_POST["sNom"];
$Prenom = $_POST["sPrenom"];




?>
<h2><?=$Nom;?></h2>
<h2><?=$Prenom;?></h2>

<?php
$Qte = 20;
$HT = 4500;
$Total = ($Qte*$HT);


?>
<h2> le total est <?=$Total;?>&nbsp;&euro;</h2>