<?php
$lang= "fr";
$title="Ma page d'histoire";
?>

<!DOCTYPE html>
<html lang="<?=$lang;?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>
    <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/container.css">
</head>
<body>
    
<?php
/*
la commande INCLUDE_ONCE en PhP, permet d'apporter les fonctionnalités (variables etc...)
d'un autre programme (une autre page ou sous-programme)
UNE FOIS,

Contrairement à la commande INCLUDE.

La commande REQUIRE_ONCE : Indique que le sous-programme est indispensable...
*/
    include_once "menu.php";//J'intègre le menu
    include_once "container.php";//J'intègre le contenu
?>



</body>
</html>