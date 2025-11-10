<?php
$tableau_structure_page = [
    ["index.php ", "banniere-index", "form-index", "corps"],
    ["catalogue.php ", "texte-catalogue", "liste-catalogue", ""],

]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="header-menu">

<img src="images/logo.png" alt="Logo site web CHOUBROC.FR (TM) à usage pédagogique, merci CHOUBROC" class="logo">

    <nav class="nav-menu">

        <ul class="liste-menu">
            <a class="link-menu couleur_par_defaut" href="index.php?home">
                <li class="menu">Accueil</li>
            </a>

            <a class="link-menu couleur_par_defaut" href="catalogue.php?catalogue">
             <li class="menu">Catalogue</li>
            </a>

            <a class="link-menu couleur_par_defaut" href="contact.php?contact">
                <li class="menu">Contact</li>
            </a>

        </ul>
    </nav>

</header>

<div class="bar">

</div>


<footer class="logo-footer">
    <img src="images/logo.png" alt="Logo site web CHOUBROC.FR (TM) à usage pédagogique, merci CHOUBROC" class="logo-img-footer">
</footer>







</body>
</html>