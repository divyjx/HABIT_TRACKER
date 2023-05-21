<?php
session_start();
$mysqli = require __DIR__ . "/database.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO habits (`username`, `habit`, `goal_time`, `time_given`, `date`)
        VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL Error: " . $mysqli . error);
    }

    $query = sprintf(
        "SELECT * FROM habits WHERE username = '%s' AND habit = '%s'",
        $mysqli->real_escape_string($_SESSION['username']),
        $mysqli->real_escape_string($_POST['habit'])
    );
    $result = $mysqli->query($query);
    if ($row = $result->fetch_assoc()) {
        echo "Habit already exists";
    } else {

        $stmt->bind_param(
            "sssss",
            $_SESSION["username"],
            $_POST["habit"],
            $_POST["goal"],
            $_POST["given"],
            $_POST["date"]
        );
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
            margin: 30px;
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
    <h1 align="center">Add a new habit</h1>

    <form method="post">
        <table align="center">
            <tr>
                <td>
                    <div>
                        <label for="habit">Habit</label>
                </td>
                <td>
                    <input type="text" id="habit" name="habit" pattern="[a-zA-Z0-9]*" required>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <label for="goal">Time per day (in min)</label>
                </td>
                <td>
                    <input type="number" id="goal" name="goal" min=0 required>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <label for="given">Time given today </label>
                </td>
                <td>
                    <input type="number" name="given" id="given" min=0 value=0 required>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <label for="date">Date</label>
                </td>
                <td>
                    <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <button>Add</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>