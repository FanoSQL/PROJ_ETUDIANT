<!-- PAGE A : attacher "" à traitement-1.php-->

<?php
$CodeErreur = 0;
if (isset($_GET["doublon"]) && !empty($_GET["doublon"])) {
    $CodeErreur= $_GET["doublon"];
}

//print "Code erreur récupéré = ".$CodeErreur;

switch ($CodeErreur) {
    case 100 :
        $message="Votre compte existe déjà, cliquer sur mot de passe oublié...";
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

<form action="traitement_1.php" method="post">

    <div class="zinput">
        <input class="in-put-inscription" type="email" name="sEmail" id="" placeholder="E-mail">
    </div>

    <div class="zinput">
         <input class="in-put-inscription"type="password" name="sMotDePasse" id="" placeholder="Mot de passe">
    </div>

    <div class="zinput_line">

        <input class="in-put-inscription input-line"type="text" name="sNom" id="" placeholder="Nom">
        <input class="in-put-inscription input-line"type="text" name="sPrenom" id="" placeholder="Prénom">

    </div>


    <div class="zinput">
        <input class="in-put-inscription"type="text" name="sDenomination" id="" placeholder="Société">
    </div>

    <div class="zinput">
        <select class="liste_selection" name="LstPays" id="">
            <?php include_once "LstPays.php";?>
       </select>
    </div>

    <div class="zinput">
        <select class="liste_selection" name="LstRegion" id="">
           <?php include_once "LstRegion.php";?>
        </select>
    </div>

    <div class="zradio">
        
        <div class="zcheck_content">
            <input class="check_list" type="checkbox" name="sAgree" id="">
        </div>
        <div class="zcheck_content_label">
            <label class="label_check" for="Agree">
            <span class="span_label">By clicking you are agreeing to our applicable terms and privacy notice, including our cooking policy.</span>
            </label>  
        </div>

    </div>


    <div class="zradio">
       
        <div class="zcheck_content">
            <input class="check_list" type="checkbox" name="sOkEmail" id="">
        </div>
        <div class="zcheck_content_label">
            <label class="label_check" for="OkEmail">
                <span class="span_label">Yes, I would like to receive emails from PGI CUST</span>
            </label> 
        </div>
         
    </div>


<!--
Email, Nom, Prenom, MotDePasse, Denomination, Departement, Region, Telephone, OKAgree, OKEmail
-->

    <button class="Btn CouleurNoir CouleurPolice_blanc" type="submit">Start free trial</button>

</form>