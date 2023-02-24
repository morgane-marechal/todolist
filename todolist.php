<?php session_start(); ?>
<?php require('db_connect.php'); ?>
<?php require('Services/ManageUser.php'); ?>
<?php require('Services/ManageTask.php'); ?>
<?php require('Services/Displaytask.php'); 
//var_dump($_POST);
?>

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
            <div id="connexion-ok">
                <?php if (isset($_SESSION['login'])&& !empty($_SESSION['login'])){
                        echo "Vous êtes toujours connecté ".$_SESSION['login'];
                }
                function php_func(){
                    echo "Stay Safe";
                    }
                ?>
            </div>

<!-- ajout du formulaire ici -->
        <div id='addtask'></div> 

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
                <input class="submit" id="submit-task"  type="submit" value="Ajouter" >
    </form>


    <?php 
            if(!empty($_POST['task'])&&($_POST['task']!=$_SESSION["task"])) {
                //pour avoir la date
                $mydate=getdate(date("U"));
                $myhour=date("H:i:s");
                //valeur de la date pour le type sql datetime YYYY-MM-DD
                $datecreate="$mydate[year]/$mydate[mon]/$mydate[mday] $myhour";
                $id_user = $_SESSION['id']; 
                $task = htmlspecialchars($_POST['task']);
                $test = new ManageTask($task, $id_user, $datecreate);
                echo $test->addTask();
               $_SESSION["task"]=$task;
            }    

            if (isset($_GET['delete'])){
                $id_user = $_SESSION['id'];
                $deleteTask = new Displaytask($id_user);
                $deleteTask->delete((int) $_GET['delete']);
                die();
            }

            if (isset($_GET['update'])){
                $id_user = $_SESSION['id'];
                $updateTask = new Displaytask($id_user);
                $updateTask->update((int) $_GET['update']);
                die();
            }

      
    ?> 





    <!-- <div id="buttons">
        <button id="task-button">Refresh To do list</button>
    </div> -->

    <!-- appel de la todolist ici -->
        <div id='displaytask'>
            <?php 
                if (isset($_SESSION['login'])&& !empty($_SESSION['login'])){
                    $id_user = $_SESSION['id']; 
                    $testdisplay2=new Displaytask($id_user);
                    echo $testdisplay2->displayTodolist();
                    }  
            ?>
        </div>


 
</main>

    
    <script defer type="text/javascript" src="scripttask.js"></script>
   
</body>