<?php
    //require_once "../../config/mesfonctions.php";
   // require_once "../../config/mesfonctions.php";
    require_once "../config/mesfonctions.php";
    //----------
    //$conn = Connect_MYSQLi(server: "localhost","stephane","exo_rh_immo","","");
   // $conn = Connect_MYSQLi($server, $user,$database,$pass,$port);exo_rh_immo 
    $conn = Connect_MYSQLi("localhost", "stephane","exo_rh_immo","","");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/tableau.css">
</head>
<body>