<?php
session_start();
$mysqli = require __DIR__ . "/database.php";
$id = $_GET["updateId"];
$q1 = "SELECT * FROM habits WHERE id=$id";
$result = $mysqli->query($q1);
$row = $result->fetch_assoc();
$name = $row["username"];
$habit = $row["habit"];
$goal = $row["goal_time"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $given = $_POST["given"];
    $date = $_POST["date"];
    $q2 = "SELECT * FROM habits WHERE `username`='$name' AND `habit`='$habit' AND `date`='$date'";
    $result2 = $mysqli->query($q2);
    if ($row = $result2->fetch_assoc()) {
        $qUpdate = "UPDATE habits SET `time_given`='$given' WHERE `username`='$name' AND `habit`='$habit' AND `date`='$date'";
        $res = $mysqli->query($qUpdate);
        header("Location:dashboard.php");
        exit;
    }
    $sql = "INSERT INTO habits (`username`, `habit`, `goal_time`, `time_given`, `date`)
            VALUES ('$name', '$habit', '$goal', '$given', '$date')";
    if ($result = $mysqli->query($sql)) {
        header("Location:dashboard.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Habit</title>
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
            background-color: rgb(70 70 95 / 60%);
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
            background-color: rgb(44 65 95 / 60%);
        }

        input:hover {
            background-color: rgb(70 70 95 / 60%);
        }
    </style>
</head>

<body>
    <h1 align="center">Time given today</h1>

    <form method="post">
        <table align="center">
            <tr>
                <td>
                    <div>
                        <label for="given">Time in min </label>
                </td>
                <td>
                    <input type="number" max="<?= $goal ?>" min=0 name="given" id="given" size="20" required>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <label for="date">Date</label>
                </td>
                <td>
                    <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center ;">
                    <div>
                        <button align="center" style="margin-right:150px">Update</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>