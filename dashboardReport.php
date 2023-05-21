<?php 
    if(isset($_GET["plotId"])){
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
        $Today=date_create(date('Y-m-d'));
        $currDate=date_create(date('Y-m-d'))->modify("-6 days");
        $counter=7;
    while ($counter!=0){
        array_push($xDates,$currDate->format("Y-m-d"));
        $currDate->modify("+1 days");
        $counter--;
    }
    $allXdate=array();
    $allYtime=array();
    while($row=$result->fetch_assoc()){
        array_push($allXdate,$row['date']);
        array_push($allYtime,$row['time_given']);
    }
    $j=0;
    $i=-1;
    foreach($xDates as $x){
        if (in_array($x,$allXdate)){
            $i=array_search($x,$allXdate);
            array_push($yTime,$allYtime[$i]);   
        }
        else{
            array_push($yTime,0);
        }
    }

    $flag=0;
    foreach ($yTime as $val)  
    if($val==0){
        $flag++;
    }
    if($flag==7)
        echo "<p id='inactivity'> No activity in past seven days <br> click show progress to see full details.<br></p> ";
    array_push($yTime, $goal);
    array_push($xDates, "0-0-0");
    echo "<p id='habit_details'>Habit Name : $habit<br>";
    echo "Goal Time : $goal<br></p>
    <div id='report_container' style=' margin-inline:300px '></div>";
    echo"<script>
            document.getElementById('no_report_msg').hidden=true;
            var xValues = " ?><?php echo json_encode($xDates); ?><?php
            echo "; var yValues = "?><?php echo json_encode($yTime);
            echo "; 
            // Define Data
            var data = [{
            x: xValues,
            y: yValues,
            type:'bar',
            marker: {
                color: 'rgba(34, 123, 128, 0.8)'
              }
            }];
            var layout = {
                            title: 'Weekly Report',
                            autosize: false,
                                width: 1000,
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
                            }
                Plotly.newPlot('report_container', data, layout);
            </script>
            ";
    }
?>
        