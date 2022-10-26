<?php
session_start();
$mysqli = require __DIR__ . "/database.php";
$id = $_GET["plotId"];
$q1="SELECT * FROM habits WHERE id=$id";
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
while($row = $result->fetch_assoc()){
    array_push($xDates, $row['date']);
    array_push($yTime, $row['time_given']);
}
?>


<!DOCTYPE html>
<html>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

<body>
<div id="myPlot" style="width:100%;max-width:700px"></div>

<script>

// Generate values
var xValues = <?php echo json_encode($xDates);?>;
var yValues = <?php echo json_encode($yTime);?>;

// Define Data
var data = [{
  x: xValues,
  y: yValues,
  type:"bar"
}];

// Define Layout
var layout = {title: "Progress Report"
            //   yValues:{
            //       autorange: true
            //     }
             };

// Display using Plotly
Plotly.newPlot("myPlot", data, layout);
</script>
Your goal is to do <?= $habit . ' ' . $goal . ' min a day.<br>' ?>
</body>
</html>

