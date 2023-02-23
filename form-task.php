<?php session_start(); ?>
<?php require('db_connect.php'); ?>
<?php require('Services/ManageUser.php'); ?>
<?php require('Services/ManageTask.php'); ?>
<?php require('Services/Displaytask.php'); ?>
    
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
    ?>