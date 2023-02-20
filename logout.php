<?php
    session_start();
    session_destroy();
    ?>
    <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css" />
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <title>Profil</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
    <div id="logout">
        <?php
        echo '<p>Vous avez été déconnecté de votre session.<br><a href="index.php">Accueil</a></p>';
        ?>
    </div>