<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM users
            WHERE id={$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habit Tracker | Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <style>
        a{
            text-decoration: none;
            color: black;
            margin: 2px;
        }
        </style>
<script>
    function myFun(){
        document.getElementById("id_home_menu").hidden = (document.getElementById("id_home_menu").hidden==true)? false :true;
    }
</script>
    </head>
<body>
    <h1>Home</h1>
    <?php if (isset($user)):?>
        <p>Welcome, <?= htmlspecialchars($user["username"])?> </p>
        <p><a href="logout.php">Log out</a></p>
    <?php else: ?>
        <p><a href="login.php">Log in</a> or <a href="signup.html">Sign up</a></p>   
    <?php endif; ?>
    <div class="home_header">
            <header>
                <span style="font-size: 25px;">
                    <a href='index.html'>HABIT TRACKER</a>  
                </span>
                <button style = "padding: 0;" onclick="myFun()"><img src="threedash.png" style="width: 20;height: 20;" >
                </button>
                
                <span  >
                    <a id="home_sigin" class="home_button" href="login.php"
                    style="position:right;float: right; border: 2px solid black ;">
                        LOGIN
                    </a>
                    <a id="home_sigup" class="home_button" href="signup.html"style="position:right;float: right;border: 2px solid black ;">
                        SIGNUP
                    </a>
                </span>
            </header>
        </div>
        <hr>
        <div class="home_menu" >
            <p id="id_home_menu" hidden>
                <a href="#id_home_aboutus">About Us</a><br> 
                <a href="#id_home_blogs">Blogs and Motivation</a> <br>
                <a href="#id_home_getstarted">Get Started</a> <br>
                <a href="#id_home_contactus">Contact Us</a> <br>
                <a href="login.php">Sign In</a> <br>
                <a href="signup.php">Sign Up</a> 
            </p>

        </div>
        <br>
        <div class="home_aboutus" id="id_home_aboutus" align="center" style="margin-inline:90px;border: 2px solid black;" >
            <h3 align="center">
                About Us
            </h3>
            <hr>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
            </p>

        </div>
        <br>
        <div class="home_blogs" id="id_home_blogs" align="center" style="margin-inline:90px;border: 2px solid black;" >
            <h3 align="center">
                Blogs And Motivation
            </h3>
            <hr>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
            </p>
        </div>
        <br>
        <div class="home_getstarted" id="id_home_getstarted"align="center" style="margin-inline:90px;border: 2px solid black;" >
            <h3 align="center">
                Get Started
            </h3>
            <hr>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
            </p>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
            </p>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
            </p>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
            </p>
        </div>
        <br>
        <div class="home_contactus" id="id_home_contactus"  style="margin-inline:90px;" >
            <h3 >
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
        <div class="home_footer">
            <hr>
            <a href="#id_home_aboutus">About Us</a>
            <a href="#top" ><img src = "uparrow.png" style="float: right;width:15;height: 15;margin: 0; padding: 0;"></a>
            <br>
            <a href="#id_home_blogs">Blogs and Motivation</a> <br>
            <a href="#id_home_getstarted">Get Started</a> <br>
            <a href="#id_home_contactus">Contact Us</a> <br>
            <!-- <a href="login.php">Log In</a> <br>
            <a href="signup.html">Sign Up</a> -->
        </div>
</body>
</html>






