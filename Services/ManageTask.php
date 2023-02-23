<?php
class ManageTask{
    private $id;
    public $task, $id_user, $datecreate;
    public $datedone=null;
    public $taskdone=null;
    public $taskcancel=null;

    function __construct($task, $id_user, $datecreate) {
        $this->task = $task;
        $this->id_user = $id_user;
        $this->datecreate = $datecreate;
    }

    public function addTask(){
        global $bdd;
                $newTask = $bdd->prepare("INSERT INTO task (task, id_user, datecreate, datedone, taskdone, taskcancel)
                 VALUES(?,?,?,?,?,?)");
               $newTask->execute(array($this->task,$this->id_user,$this->datecreate,$this->datedone,$this->taskdone,$this->taskcancel));
               return "Vous avez ajouté une nouvelle tâche avec succès";
    }

    public function dateDone($a){
        global $bdd;
         
        $mydate=getdate(date("U"));
        $myhour=date("H:i:s");

        $newDateDone="$mydate[year]/$mydate[mon]/$mydate[mday] $myhour";
         $this->datedone = $newDateDone;   
        $sqlupdate = $bdd -> prepare("UPDATE task SET datedone = '$newDateDone' WHERE datecreate = '$a'");
        $sqlupdate->execute(array($this->datedone));
    }


}

?>