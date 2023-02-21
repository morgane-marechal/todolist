<?php session_start(); ?>
<?php require('db_connect.php'); ?>
<?php require('Services/ManageUser.php'); ?>
<?php require('Services/ManageTask.php'); ?>

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
            <input class= "task-text" type="text" name="task" id="task-text" 
                <?php if(empty($_SESSION['login'])){  
                    echo "placeholder='Il faut se connecter pour ajouter une action' disabled";
                }else{
                    echo "placeholder='Nouvelle tâche'";
                }
                    ?>>
            </select>
            <input class="submit" id="submit" onClick="window.location.reload()" type="submit" value="Ajouter" >
        </form>
    </div>

    <?php 
        if(!empty($_POST)&& $_POST['task']) {
            //pour avoir la date
            $mydate=getdate(date("U"));
            $myhour=date("H:i:s");
            //valeur de la date pour le type sql datetime YYYY-MM-DD
            $datecreate="$mydate[year]/$mydate[mon]/$mydate[mday] $myhour";
            $id_user = $_SESSION['id']; 
            $login=$_SESSION['login'];
            $password=$_SESSION['password'];
            $task = htmlspecialchars($_POST['task']);
            $testUser = new ManageUser($login,$password);
            $datedone='0000-00-00 00:00:00';
            $taskdone=0;
            $taskcancel=0;
                  
            //$date = "2023-02-09 00:00:00";
            $test = new ManageTask($task, $id_user, $datecreate, $datedone, $taskdone, $taskcancel);
            $_SESSION["task"]=$task;
            $_SESSION["datecreate"]=$datecreate;
            $_SESSION["datedone"]=$datedone;
            

            echo $test->addTask();
            
        }    
    ?>

    <?php if(!empty($_SESSION['login'])){ 
       echo "<div id='buttons'>
            <button id='task-button'>My To Do List</button>
            </div>";
    }?>

    <div id='displaytask'>
        <p>Emplacement to do list</p>;

    </div>
 
</main>

    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="scripttask.js"></script>
</body>