
<?php session_start(); ?>
<?php require('db_connect.php'); ?>
<?php require('Services/ManageUser.php'); ?>
<?php require('Services/ManageTask.php'); ?>
<?php
//echo "Task.php => Todolist";
$task="";
$datecreate="0000-00-00 00:00:00";
$datedone="0000-00-00 00:00:00";
$id_user=$_SESSION['id'];
$taskdone=0;
$taskcancel=0;

$testtdl = new ManageTask($task, $id_user, $datecreate, $datedone, $taskdone, $taskcancel);

echo $testtdl->displayTodolist();




?>