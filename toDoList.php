<?php
session_start();
if (isset($_POST['tasks'])){
    $name = $_SESSION['name'];
    $mysqli = require __DIR__ . "/database.php";
    foreach($_POST['tasks'] as $task){
        $q = "UPDATE todolist SET `status` = 1 WHERE `name` = '$name' AND `task` = '$task' ";
        $res = $mysqli->query($q);
    }
}
header("Location:dashboard.php");
exit;
?>