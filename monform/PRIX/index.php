<?php
$prix=45;
$code=0;
$resultat=0;
if (isset($_GET["code"]) && !empty($_GET["code"])) {
    $code = $_GET["code"];

    if ($code==1) {
        $resultat=$prix-5;
    } else {
        $resultat=$prix-10;
    }

} else {
    header("location:test.php?error=100");
}
?>
<h1>Votre commande : <?=$resultat;?> &euro;</h1>