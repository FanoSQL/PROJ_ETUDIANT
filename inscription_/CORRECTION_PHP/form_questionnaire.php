<?php
    $LabelFor1 = "I evaluate tooling and technology or am the decision-maker for this tool";
    $LabelFor2 = "I am a student or recent grad interested in creating courses";
    $LabelFor3 = "I am a consultant or freelancer who creates leads for companies";
    $LabelFor4 = "Other";
?>


<form action="traitement_5.php?Id=<?=$IdUsers;?>&lang=<?=$Langue;?>" method="post">

<div class="zcontrole_container">

    <div class="zinputradioqcm">
        <input
        class="BtnRadioQCM"
        type="radio"
        value="<?=$LabelFor1;?>"
        name="sDescribes" id="">

        <div class="zlabelqcm">
            <label for=""><?=$LabelFor1;?></label>
        </div>

    </div>

 
    <div class="zinputradioqcm">
        <input
        class="BtnRadioQCM"
        type="radio"
        value="<?=$LabelFor2;?>"
        name="sDescribes" id="">

        <div class="zlabelqcm">
            <label for=""><?=$LabelFor2;?></label>
        </div>

    </div>


    <div class="zinputradioqcm">
        <input
        class="BtnRadioQCM"
        type="radio"
        value="<?=$LabelFor3;?>"
        name="sDescribes" id="">

        <div class="zlabelqcm">
            <label for=""><?=$LabelFor3;?></label>
        </div>

    </div>


    <div class="zinputradioqcm">
        <input
        class="BtnRadioQCM"
        type="radio"
        value="<?=$LabelFor4;?>"
        name="sDescribes" id="">

        <div class="zlabelqcm">
            <label for=""><?=$LabelFor4;?></label>
        </div>

    </div>


</div>


<div class="zbuttonQCM">
    <button type="submit">Continuer</button>
</div>



</form>