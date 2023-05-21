<?php
session_start();
$mysqli = require __DIR__ . "/database.php";
$us = $_SESSION['username'];
if (isset($_POST['usexp'])) {
    $experiance = $_POST['usexp'];
    echo $experiance;
    $q = "UPDATE users SET `exp` = '$experiance' WHERE `username` = '$us' ";
    $res = $mysqli->query($q);
    header("Location:dashboard.php");
    exit;
}
?>
<html>

<head>
    <link rel="stylesheet" href="styles2.css">
    <style>
        * {
            vertical-align: middle;
            font-size: 30px;
        }

        button {
            background-color: transparent;
            font-weight: bold;
            border: none;
            padding: 2px;
        }

        button:hover {
            background-color: #222831;
        }

        table {
            margin-top: auto;
            margin-bottom: auto;
        }

        td {
            text-align: left;
            padding: 15px;
            margin: 30px
        }

        input {
            font-size: 40px;
            border: none;
            border-radius: 2%;
            color: white;
            background-color: transparent;
        }

        input:hover {
            background-color: rgb(70 70 95 / 60%);
        }
    </style>
</head>

<body>
    <form method="POST" style="text-align: center;vertical-align:middle;padding-top:300px">
        <textarea placeholder="Share your experience" maxlength="400" style="background-color: rgb(44 65 95 / 60%);" name="usexp" rows="4" columns="10"></textarea><br><br>
        <input type="submit" value="Share">
    </form>
</body>

</html>