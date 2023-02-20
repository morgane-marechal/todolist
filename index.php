<?php session_start(); ?>

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


    <div id='addtask'>
        <form id="task_form" action="" method="post">
            <h3>Activité à faire</h3>
            <input class= "task-text" type="text" name="comment" id="task-text" placeholder="Nouvelle tâche*" required minlength="20">
            </select>
            <input class="submit" id="submit" onClick="window.location.reload()" type="submit" value="Ajouter">
        </form>
    </div>

    <div id='diplaytask'>

    </div>
 
</main>

    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="scripttask.js"></script>
</body>