<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "habit_tracker_db";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_errno) {
    die ("Connection error: " . $mysqli->connect_errno);
}
return $mysqli;
?>