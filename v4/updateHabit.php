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

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $given = $_POST["given"];
    $date = $_POST["date"];
    $q2 = "SELECT * FROM habits WHERE `username`='$name' AND `habit`='$habit' AND `date`='$date'";
    $result2 = $mysqli->query($q2);
    if ($row = $result2->fetch_assoc()){
        die("Today's data entered already.");
    }
    $sql = "INSERT INTO habits (`username`, `habit`, `goal_time`, `time_given`, `date`)
            VALUES ('$name', '$habit', '$goal', '$given', '$date')";
    if($result = $mysqli->query($sql)) {
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
    <title>New Habit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
</head>

<body>
    <h1>Time given today</h1>

    <form  method="post">
        <div>
            <label for="given">Time in min </label>
            <input type="text" name="given" id="given" required>
        </div>
        <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" required>    
        </div>
        <div>
            <button>Update</button>
        </div>
    </form>
</body>

</html>