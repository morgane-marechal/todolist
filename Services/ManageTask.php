<?php
class ManageTask{
    private $id;
    public $task, $id_user, $datecreate;

    function __construct($task, $id_user, $datecreate) {
        $this->task = $task;
        $this->id_user = $id_user;
        $this->datecreate = $datecreate;
    }




}

?>