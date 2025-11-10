<?php
//------------ parametre de langue
require_once "config/langue.php";
//---------------------------------

//Seulement par ma navigation et le deboguage
$etape =0;
if (isset($_GET["etape"]) && !empty($_GET["etape"])) {
    $etape= $_GET["etape"];
}

switch ($etape) {
    case 2 :
        header("location:page_2.php");
        break;
    case 3 :
        header("location:page_2.php");
        break;
    case 4 :
        header("location:page_4.php");
        break;
    case 5 :
        header("location:page_5.php");
        break;
    case 6 :
        header("location:page_6.php");
        break;
}
//-------------------------------------


?>

<!DOCTYPE html>
<html lang="<?=$lang;?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Micro Projet PgI CUST</title>
    <link rel="stylesheet" href="css/siteweb.css">
</head>
<body>
    

<div class="zcontainer">


    <div class="zcontenu">

        <h1 class="titrecontent">PGI CUSTOM  1.0</h1>
        <h1 class="titrecontent_2">Create somes customers for your enterprise easy…</h1>

        <ul class="ul_content">    
            <li class="liste_titre">Integrate AI gestion customers</li>
            <li class="liste_titre">Crated AI business documents</li>
            <li class="liste_titre">Use with support and save data base</li>
        </ul>

        
    </div>

    <div class="zform">
        <?php include_once "form_inscription.php";?>
    </div>

</div>


</body>
</html>