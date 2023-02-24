
<?php session_start(); ?>
<?php require('db_connect.php'); ?>
<?php require('Services/ManageUser.php'); ?>
<?php require('Services/ManageTask.php'); ?>
<?php require('Services/Displaytask.php'); ?>
<?php
//echo "Task.php => Todolist";

// ------methode pour afficher la todolist-------------



if (isset($_SESSION['login'])&& !empty($_SESSION['login'])){
    $id_user = $_SESSION['id']; 
    $testdisplay2=new Displaytask($id_user);
    echo $testdisplay2->displayTodolist();
}


?>

