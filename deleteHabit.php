<?php
session_start();
$mysqli = require __DIR__ . "/database.php";
$id = $_GET["deleteId"];
$q1="SELECT * FROM habits WHERE id=$id";
$res = $mysqli->query($q1);
$row = $res->fetch_assoc();
$name = $row["username"];
$habit = $row["habit"];
$q2 = "DELETE FROM habits WHERE `username`='$name'
       AND `habit` = '$habit'";
$result = $mysqli->query($q2);
if($result){
    header("Location:dashboard.php");   
    exit;
}
 ?>