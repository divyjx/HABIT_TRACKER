<?php
$mysqli = require __DIR__ . "/database.php";
// connection to database using database.php for localhost,root,password,database
$sql = "SELECT * FROM users";
$result = $mysqli->query($sql);

// for motivation section
$users = array();
$exps = array();

while ($user = $result->fetch_assoc()) {
    if (isset($user['exp'])) {
        array_push($users, $user['username']);
        array_push($exps, $user['exp']);
    }
} ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- for web-optimization -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habit Tracker | Home</title>

    <link rel="stylesheet" href="styles2.css">
    <style>
        .left_button {
            position: left;
            float: left;
            background-color: transparent;
            border: none;
        }

        .right_button {
            position: right;
            float: right;
            background-color: transparent;
            border: none;
        }

        .home_getstarted,
        .home_aboutus,
        .home_contactus,
        .home_blogs {
            border-radius: 40px;
        }
    </style>
    <script>
        function myFun2() {
            document.getElementById("id_home_menu").hidden = true;
        }

        function myFun() {
            document.getElementById("id_home_menu").hidden = (document.getElementById("id_home_menu").hidden == true) ? false : true;
            setTimeout(myFun2, 5000);
        }
        <?php echo
        "var users = " ?><?php echo json_encode($users) . ";"; ?><?php
                                                                    echo "\nvar exps = " ?> <?php echo json_encode($exps) . ";"; ?>

        var i = 0;
        var maxm = exps.length;

        function next() {
            document.getElementById("expCont").innerHTML = '"' + exps[i] + '"';
            document.getElementById("userCont").innerHTML = "- " + users[i];
            i = i + 1;
            if (i >= maxm) {
                i = 0;
            }
        }

        function prev() {
            document.getElementById("expCont").innerHTML = '"' + exps[i] + '"';
            document.getElementById("userCont").innerHTML = "- " + users[i];
            i = i - 1;
            if (i == -1) {
                i = maxm - 1;
            }
        }
        setInterval(next, 5000);
    </script>
    </script>
</head>

<body onload="next()">
    <div class="home_header">
        <header>
            <span>
                <a href="javascript:myFun()" tooltip=>HABIT TRACKER</a>
            </span>
            <span>
                <a id="home_sigin" class="home_button" href="login.php">
                    SIGNIN
                </a>
                <a id="home_sigup" class="home_button" href="signup.html">
                    SIGNUP
                </a>
            </span>
        </header>
    </div>
    <hr>
    <div class="home_menu">
        <p id="id_home_menu" hidden style="position:fixed;">
            <!-- navigation -->
            <a href="#id_home_aboutus">About Us</a><br>
            <a href="#id_home_blogs">Motivation</a> <br>
            <a href="#id_home_getstarted">Get Started</a> <br>
            <a href="#id_home_contactus">Contact Us</a> <br>
            <a href="login.php" onclick="myFunClose()">Sign In</a> <br>
            <a href="signup.html" onclick="myFunClose()">Sign Up</a>
        </p>

    </div>
    <div class="main_body">
        <div class="home_getstarted" id="id_home_getstarted" align="center">
            <h3 align="center">
                Get Started
            </h3>
            <hr>
            Habit building in its essential steps:<br> <b>Choose a habit</b>, <b>actually remember to do it</b>, <b>and track your development</b>.
            <br>
            <br>

            <table align="center">
                <tr style="padding: 10px">
                    <td>
                        <b>1.Set up your Habits</b><br>
                    </td>
                    <td>
                        <b>2.Get the Cue</b><br>
                    </td>
                    <td>
                        <b>3.See your Progress</b><br>
                    </td>
                </tr>
                <tr>
                    <td align="center"><img src="./image/1.jpg" class="gs_image"></td>
                    <td align="center"><img src="./image/2.6.jpg" class="gs_image"></td>
                    <td align="center"><img src="./image/3.1.jpg" class="gs_image i3"></td>
                </tr>
                <tr>
                    <td style="font-size: 25px">Make a list of habits to create your daily routines and start your journey.</td>
                    <td style="font-size: 25px">Stay accountable and never forget your habits with multiple reminders.</td>
                    <td style="font-size: 25px">View your habit development through the weeks and months with detailed reports.</td>
                </tr>
            </table>
        </div>
        <br>
        <div class="home_blogs" id="id_home_blogs" align="center" style="margin-inline:90px;height:550px">
            <h3 align="center">
                Motivation
            </h3>
            <hr>
            <div class="exp">
                <p id='expCont' align="center" style="margin-inline:100px"></p>
                <p id='userCont' align="right"></p>
            </div>
            <button class="left_button" onclick="prev()">
                < </button>
                    <button class="right_button" onclick="next()"> > </button>
                    <br>
        </div>
        <br>
        <div class="home_aboutus" id="id_home_aboutus" align="center" style="margin-inline:90px;">
            <h3 align="center">
                About Us
            </h3>
            <hr>
            <p>
                Habit Tracker is a data-driven website aimed at helping you build your golden habits and unlock your true potential. Habit Tracker has an easy-to-use interface. You tell it what you want to track, it reminds you to do it and then you can input your performance. Habit Tracker shows you the progress you’re making and it helps to fuel you with motivation to keep going. The ultimate aim of Habit Tracker is to build a community of habit builders who strive to better themselves every day.
            </p>

        </div>
        <br>

        <div class="home_contactus" id="id_home_contactus" style="margin-inline:90px;">
            <h3 align="center">
                Contact Us
            </h3>
            <hr>
            <p>
                <a href="mailto:210010001@iitdh.ac.in">Aditya Zanjurne</a> <br>
                <a href="mailto:210010015@iitdh.ac.in">Divy Jain</a> <br>
                <a href="mailto:210010022@iitdh.ac.in">Karthik Hegde</a> <br>
                <a href="mailto:210010052@iitdh.ac.in">Sunay Patil</a>
            </p>
        </div>
        <br>
    </div>
</body>

</html>