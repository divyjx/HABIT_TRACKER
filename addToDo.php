<?php
session_start();
$mysqli = require __DIR__ . "/database.php";
$name = $_SESSION['name'];
$task = $_POST['task'];
$date = date('Y-m-d');
$q = "INSERT INTO `todolist` (`name`, `task`, `date_todo`) VALUES ('$name', '$task','$date')";
$res = $mysqli->query($q);
header("Location:dashboard.php");
exit;
?>