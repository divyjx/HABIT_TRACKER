<?php
session_start();
$mysqli = require __DIR__ . "/database.php";
$id = $_GET["plotId"];
$q1 = "SELECT * FROM habits WHERE id=$id";
$res = $mysqli->query($q1);
$row = $res->fetch_assoc();
$name = $row["username"];
$habit = $row["habit"];
$goal = $row["goal_time"];
$q2 = "SELECT * FROM habits WHERE `username`='$name'
       AND `habit` = '$habit' ORDER BY `date`";
$result = $mysqli->query($q2);
$xDates = array();
$yTime = array();
while ($row = $result->fetch_assoc()) {
    array_push($xDates, $row['date']);
    array_push($yTime, $row['time_given']);
}
array_push($yTime, $goal);
array_push($xDates, "0-0-0");
?>


<!DOCTYPE html>
<html>

<head>
    <title>Full Report</title>
    <link rel="stylesheet" href="styles2.css">
    <style>
        button {
            background-color: #222831;
            font-weight: bold;
            position: left;
            float: left;
            border: 2px solid white;
            padding: 2px;
        }

        button:hover {
            background-color: #00ADB5;
        }
    </style>
</head>

<!-- plotly script for making plots -->
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

<body>
    <div id="reports_header">
        <div id="habit_details">
            Habit : <?= $habit . ' <br> Goal time : ' . $goal . ' <br><br>' ?>
            <a href="dashboard.php" style="background-color: #12040452;border-radius: 5%;">Back</a>
        </div>
        <div id="myPlot" style="width:100%;max-width:700px;margin-inline: 300px;"></div>

        <script>
            // Generate values
            var xValues = <?php echo json_encode($xDates); ?>;
            var yValues = <?php echo json_encode($yTime); ?>;

            // Define Data
            var data = [{
                x: xValues,
                y: yValues,
                type: "bar"
            }];

            var layout = {
                title: "Full Report",
                width: 1200,
                xaxis: {
                    title: {
                        text: 'Date',
                        font: {
                            family: 'Courier New, monospace',
                            size: 18,
                        }
                    },
                },
                yaxis: {
                    title: {
                        text: 'Time given (in minutes)',
                        font: {
                            family: 'Courier New, monospace',
                            size: 18,
                        }
                    }
                },
                autosize: true,

            };

            // Display using Plotly
            Plotly.newPlot("myPlot", data, layout);
        </script>
</body>

</html>