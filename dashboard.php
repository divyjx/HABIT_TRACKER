<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM users
            WHERE id={$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $_SESSION['name'] = $user['username'];
}

?>

<html>

<head>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <title>
        Habit Tracker | Dashboard
    </title>
    <script>
        function myFun() {
            document.getElementById("id_dash_menu").hidden = (document.getElementById("id_dash_menu").hidden == true) ? false : true;
        }

        function closeWarning() {
            if (document.getElementById('browserWarning').hidden != true)
                document.getElementById('browserWarning').hidden = true;
        }
        setTimeout(closeWarning, 5000);
    </script>

    <style>
        * {
            color: white;
            font-size: 20px;
            font-family: Arial;
        }

        .report_container {
            width: 50%;
            scale: 0.5;
            max-width: 700px;
        }

        .home_header {
            width: 100%;
            overflow: hidden;
            height: 44px;
        }

        a {
            text-decoration: none;
            color: white;
            margin: 2px;
            font-weight: bold;
            border-radius: 4px;
        }

        a:hover {
            background-color: #222831;
        }

        #dash_habits,
        #dash_demo_reports,
        #dash_todo {
            margin-inline: 90px;
            background-color: rgba(0, 0, 0, 0.3);
            background-blend-mode: multiply;
            padding: 15px;
            border-radius: 40px;
        }

        #dash_report_container {
            width: 400px;
            height: 300px;
        }

        .main_body {
            padding: 0px 10px;
        }

        header {
            padding: 10px 16px;
            padding-inline: 0px;
            top: 0;
            width: 100%;
            margin-inline: 0px;
            z-index: 2;
        }

        table {
            margin: 20px;
            padding: 20px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th {
            text-align: center;
            padding: 20px;
            font-size: 30px;
            font-weight: bolder;
        }

        td {
            text-align: center;
            padding: 10px;
            font-size: 30px;
        }

        button {
            padding-inline: 10px;
            background-color: transparent;
            border: none;
            border-radius: 4px;
            padding: 5px;
        }

        input {
            padding-inline: 10px;
            background-color: #222831;
            padding: 5px;
        }

        button:hover {
            background-color: #222831;
        }

        .habit_buttons {
            padding-inline: 10px;
            padding: 5px;
        }

        .habit_buttons:hover {
            background-color: #222831;
        }

        body {
            background-color: rgba(0, 0, 0, 0.4);
            background-blend-mode: multiply;
            background-image: url("back2.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .dash_button {
            float: right;
            margin-right: 20px;
            padding-inline: 10px;
            padding: 5px;
            background-color: transparent;
        }

        .menu_button {
            font-weight: bold;
        }

        .dash_button:hover,
        .menu_button:hover {
            background-color: rgb(34, 40, 49);
        }

        #browserWarning {
            position: fixed;
            top: 0%;
            left: 50%;
            transform: translate(-50%);
            background: rgb(34, 40, 49, .6);
        }

        #dash_todo_content {
            text-align: center;
            font-size: 30px;
        }

        #todo_data {
            font-size: 40px;
            color: lightslategrey;
        }

        .todo_button {
            background-color: transparent;
            font-weight: bold;
            border: none;
            border-radius: 4px;
        }

        .todo_button:hover {
            background-color: #222831;
        }

        .habit {
            font-size: 30px;
        }

        h3 {
            font-size: 30px;
            text-decoration-line: underline;
        }
    </style>

</head>

<body onload="alertBox()">
    <header>
        <span style="font-size: 25px; font-weight: bold;">
            <button onclick="myFun()">HABIT TRACKER </button>
        </span>


        <span id='browserWarning' hidden align='center'>

        </span>
        <a id="dash_logout" style="float: right;" class="dash_button" href="logout.php">
            LOGOUT
        </a>
        </span>
        <span style="float:right ; margin-right:20px;margin-top:4px; font-weight: bold; vertical-align:middle">
            <?php if (isset($user)) : ?>
                <?= htmlspecialchars($user["username"]) ?>
                &nbsp;&nbsp;
            <?php endif; ?>
    </header>
    <hr>
    <div><br>
        <br>
        <br>
    </div>

    <!-- main -->
    <div class="main_body">
        <div class="dash_menu">
            <p id="id_dash_menu" hidden>

                <a href="#dash_habits">Habit List</a> <br>
                <a href="#dash_demo_reports">Report</a> <br>
                <a href="#dash_todo">To-Do List</a> <br>
                <a href="index.php">Log Out</a>
            </p>
        </div>
        <div id="dash_heading" align="center">
            <h2 style="font-size: 40px; text-decoration-line: underline;">DASHBOARD</h2>
            <button><a href="addHabit.php">ADD HABIT</a></button>
            <button><a href="addExp.php">SHARE EXP.</a></button>

        </div>
        <div id="dash_habits">
            <h3 align="center"> HABITS </h3>
            <hr>
            <table>
                <?php
                $query = sprintf(
                    "SELECT * FROM habits WHERE username = '%s' GROUP BY habit",
                    $mysqli->real_escape_string($user['username'])
                );
                $result =  $mysqli->query($query);
                $i = 0;
                echo "<tr style='font-weight: bold;'><th></th><th>Habit Name<hr></th><th>Progress (in %)<hr></th><th> Goal Time (min) <hr></th><th>Modify<hr></th></tr>";
                $todayDate = date('Y-m-d'); //
                $uncompletedArr = array();
                $compFlag = 0;
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $nameHabit = $row['habit']; // habit name - distinct everytime
                    echo "<tr><td>" . ++$i;
                    echo '</td><td><a class="habit" href="dashboard.php?plotId=' . $id . '">' . $row['habit'] . "</a></td><td>";
                    $query3 = sprintf(
                        "SELECT * FROM habits WHERE username = '%s' AND habit='$nameHabit' AND date='$todayDate'",
                        $mysqli->real_escape_string($user['username'])
                    );
                    $result3 =  $mysqli->query($query3);
                    if ($row3 = $result3->fetch_assoc()) {
                        if ($row3['time_given'] >= $row3['goal_time']) {
                            echo "completed" . "</td>";
                            $compFlag = 1;
                        } else if ($row3['time_given'] == 0) {
                            echo "pending" . "</td>";
                            array_push($uncompletedArr, $nameHabit);
                        } else {
                            echo ceil(($row3['time_given'] / $row3['goal_time']) * 100) . " %</td>";
                            array_push($uncompletedArr, $nameHabit);
                        }
                    } else {
                        echo "pending" . "</td>";
                        array_push($uncompletedArr, $nameHabit);
                    }
                    echo "<td>" . $row['goal_time'] . '</td>';

                    echo '<td align = "right"><button class="habit_buttons"><a href="updateHabit.php?updateId=' . $id . '">UPDATE</a></button>&nbsp;&nbsp;';
                    echo '<button class="habit_buttons"><a href="deleteHabit.php?deleteId=' . $id . '">DELETE</a></button>&nbsp;&nbsp;';
                    echo '<button class="habit_buttons"><a href="plots.php?plotId=' . $id . '">SHOW PROGRESS</a></button>';
                }
                ?>
            </table>
        </div>
        <br>
        <div id="dash_demo_reports">

            <h3 align="center"> REPORTS </h3>
            <hr>
            <p id='no_report_msg'>Click on any habit to see its report</p>

            <?php include('dashboardReport.php') ?>

        </div>
        <br>
        <div id="dash_todo">
            <h3 align="center"> TO-DO LIST</h3>
            <hr>
            <div id='dash_todo_content'>
                <form action="addToDo.php" method="post">
                    <input type="text" name="task" required placeholder="add task" pattern="[a-zA-Z0-9]*">
                    <input type="submit" value="Add">
                </form>
                <form action="toDoList.php" method="post">
                    <?php
                    $todaysdate = date('Y-m-d');
                    $q1 = sprintf(
                        "SELECT * FROM todolist WHERE `name` = '%s' AND date_todo='$todaysdate' GROUP BY task ORDER BY `status`",
                        $mysqli->real_escape_string($user['username'])
                    );
                    $result =  $mysqli->query($q1);
                    $c = 1;
                    echo "<div id = 'todo_data' >";
                    while ($r = $result->fetch_assoc()) {
                        if ($r['status'] == 1) {
                            echo "<del style='position: right; float: right; margin-inline: 20px;'>" . $r['task'] . "</del><br>";
                        } else {
                            echo "<span style='position: left; float: left; margin-inline: 20px;'>" . $r['task'] . "<input type='checkbox' name='tasks[]' value=" . $r['task'] . "></span><br>";
                        }
                        $c++;
                    }
                    echo "</div>";
                    ?>
                    <input type="submit" class="todo_button" name="update" value="UPDATE">
                </form>
            </div>
        </div>
    </div>
    <?php include('remainder.php') ?>

</body>

</html>