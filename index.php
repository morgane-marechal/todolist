<?php session_start(); ?>
<?php require('db_connect.php'); ?>
<?php require('Services/ManageUser.php'); ?>
<?php require('Services/ManageTask.php'); ?>
<?php require('Services/Displaytask.php'); ?>

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css" />
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <title>Home</title>
</head>

<body>
    <?php
    require('header.php');
    ?>
    <main>
        
        <div id="buttons">
            <button id="inscription-button">Inscription</button>
            <button id="connexion-button">Connexion</button>        
        </div>

            <div id="inscription-place"></div>

            <div id="connexion-ok">
                <?php if (isset($_SESSION['login'])&& !empty($_SESSION['login'])){
                        echo "Vous êtes toujours connecté ".$_SESSION['login'];
                }
                ?>
            </div>
 
</main>

    <script defer type="text/javascript" src="script.js"></script>
    <script defer type="text/javascript" src="scripttask.js"></script>
    <script defer type="text/javascript" src="scriptDOM.js"></script>
   
</body>