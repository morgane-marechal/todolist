<?php
class ManageTask{
    private $id;
    public $task, $id_user, $datecreate, $datedone, $taskdone, $taskcancel;

    function __construct($task, $id_user, $datecreate, $datedone, $taskdone, $taskcancel) {
        $this->task = $task;
        $this->id_user = $id_user;
        $this->datecreate = $datecreate;
        $this->datedone = $datedone;
        $this->$taskdone = $taskdone;
        $this->$taskcancel = $taskcancel;
    }


    public function addTask(){
        global $bdd;
                $newTask = $bdd->prepare("INSERT INTO task (task, id_user, datecreate, datedone, taskdone, taskcancel)
                 VALUES(?,?,?,?,?,?)");
               $newTask->execute(array($this->task,$this->id_user,$this->datecreate,$this->datedone,$this->taskdone,$this->taskcancel));
               return "Vous avez ajouté une nouvelle tâche avec succès";
    }


    public function displayTodolist(){
        global $bdd;
        $allComment = $bdd -> prepare("SELECT task.task, task.datecreate, task.datedone, task.taskdone, task.taskcancel, utilisateurs.login from task join utilisateurs on utilisateurs.id = task.id_user where utilisateurs.id = $this->id_user");
        $allComment -> execute();
        $result = $allComment->fetchAll(PDO::FETCH_ASSOC);
        //echo var_dump($result);
        //tableau html -->
        echo "<div id='todolist'><table>
        <thead><tr><td>A faire</td><td>Date de création</td><td>Utilisateur</td></tr></thead><tbody>";
        for ($i = (count($result)-1); $i >= 0; $i--) {
        echo "<tr><td>Le ".$result[$i]['task']."</td><td> ".$result[$i]['datecreate']."</td><td>".$result[$i]['login']."</td></tr>";
        }
        echo "</tbody></table></div>";
    }



}

?>