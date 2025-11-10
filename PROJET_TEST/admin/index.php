<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Connexion</title>
</head>
<body>
    
<h2>Se connecter</h2>
<form action="auth.php" method="post">

    <div class="zinput">
        <input type="email" name="sEmail" id="" placeholder="toto@gmail.com" required>
    </div>

    <div class="zinput">
        <input type="password" name="sMotDePasse" id="" placeholder="Votre mot de passe" required>
    </div>

    <div class="zbtn">
        <button clas="BtnConnex" type="submit">Se connecter</button>
    </div>

</form>


</body>
</html>