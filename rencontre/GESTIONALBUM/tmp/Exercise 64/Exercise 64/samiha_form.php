<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 64</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="container">
        <div class="deuxdiv">
            <div class="left">
                <img class="picture" src="images/suitcase-4813101_1280.jpg" alt="image valise">
            </div>

            <div class="right">
                <h2>Inscription</h2>
                <h3>Créer un compte</h3>

                <div class="form">
                    <div class="nomprenom">
                        
                    <form action="inscription.php" method="post">


                        <div class="sNom">

                            <input type="text" id="sNom" name="sNom" placeholder="Votre nom">

                        </div>
                        <div class="sPrenom">
                            <input type="text" id="sPrenom" name="sPrenom" placeholder="Votre prénom" >
                        </div>
                    </div>

                    <div class="mailpass">

                        <div class="email">
                            <input type="sEmail" id="sEmail" class="sEmail" placeholder="votre@email.com" >
                        </div>

                        <div class="Motdepass">
                            <input type="sPassword" id="sPassword" name="sPassword" placeholder="••••••••">
                        </div>

                        <div class="bouton">
                            <button type="submit">S'inscrire</button>
                        </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>