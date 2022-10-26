<?php
session_start();
$mysqli = require __DIR__ . "/database.php";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$sql = "INSERT INTO habits (`username`, `habit`, `goal_time`, `time_given`, `date`)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $mysqli->stmt_init();

if (! $stmt->prepare($sql)) {
    die ("SQL Error: " . $mysqli.error);
}

$query = sprintf("SELECT * FROM habits WHERE username = '%s' AND habit = '%s'", 
         $mysqli->real_escape_string($_SESSION['username']), $mysqli->real_escape_string($_POST['habit']));
$result = $mysqli->query($query);
if($row = $result->fetch_assoc()) {
    echo "Habit already exists";
}
else{

    $stmt->bind_param("sssss",
    $_SESSION["username"],
    $_POST["habit"], 
    $_POST["goal"], 
    $_POST["given"], 
    $_POST["date"]);
    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit;
    }
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
    <h1>Add a new habit</h1>

    <form  method="post">
        <div>
            <label for="habit">Habit</label>
            <input type="text" id="habit" name="habit" required>
        </div>
        <div>
            <label for="goal">Time per day (in min)</label>
            <input type="text" id="goal" name="goal" required>
        </div>
        <div>
            <label for="given">Time given today </label>
            <input type="text" name="given" id="given" required>
        </div>
        <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" required>
        </div>
        <div>
            <button>Add</button>
        </div>
    </form>
</body>

</html>