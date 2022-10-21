<script>
    function myFun(){
        document.getElementById("id_dash_menu").hidden = (document.getElementById("id_dash_menu").hidden==true)? false :true;
    }
    function prev(){
        if (document.getElementById("dash_report_container").getAttribute('src')==  "g1.png")
            document.getElementById("dash_report_container").src =   "g3.png";
        else if (document.getElementById("dash_report_container").getAttribute('src')== "g2.png")
            document.getElementById("dash_report_container").src=   "g1.png";
        else
            document.getElementById("dash_report_container").src=   "g2.png";
            // document.getElementById("dash_report_container").innerHTML="hello";

    }
    function next(){
        prev()
        prev()
    }
</script>
<style>
    .home_header{
    width: 100%;
    overflow: hidden;
    height: 44px;   
    }
    a{
        text-decoration: none;
        color: black;
        margin: 2px;
    }
    #dash_habits,#dash_demo_reports ,#dash_todo{
        margin-inline:90px;border: 
        2px solid black;}
    #dash_report_container{
        width: 400px;
        height: 300px;
    }
    .main_body{
        margin-right: 400px; /* Same as the width of the sidenav */
        /* font-size: 28px; Increased text to enable scrolling */
        padding: 0px 10px;
    }
    .side_report_bar{
        height: 90%;
        width: 400px;
        position: fixed;
        z-index: 1;
        bottom: 0;
        right: 0;
        overflow-x: hidden;
        padding-top: 20px;

    }
    header{
        position: fixed;
        background: #555;
        padding: 10px 16px;
        padding-inline: 0px;
        top:0;
        width:100%;
        margin-inline: -8px;
    }
</style>
<!-- <!DOCTYPE html> -->
<html>
    <head>
        <title>
            Habit Tracker | Dashboard
        </title>
    </head>
</html>
<body >
    
        <header>
            <span style="font-size: 25px;">
                <a href='dashboard.php'>HABIT TRACKER</a>  
            </span>
            <button style = "padding: 0;" onclick="myFun()"><img src="threedash.png" style="width: 20;height: 20;" >
            </button>
            
            <span style="  float:right ; margin-right:20px" >
                <?php 
                echo "user";
                ?>
                <a id="dash_logout" class="dash_button" href="index.html"
                style=" border: 2px solid black ; float:right ; margin-right:20px">
                    Logout
                </a>
            </span>
        </header>
    <div ><br>
    <br>
    <br></div>
    <div  class="side_report_bar">
    Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.

Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.

Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.
    </div>

    <!-- main -->
    <div class="main_body">
        <div class="dash_menu" >
            <p id="id_dash_menu" hidden >
                
                <a href="#bottom">Contact Us</a> <br>
                <a href="#bottom">Contact Us</a> <br>
                <a href="#bottom">Contact Us</a> <br>
                <a href="index.html">Log Out</a> 
            </p>
        </div>
        <div id="dash_heading" align="center">
            <h4>DASHBOARD</h4>
        </div>
        <div id="dash_habits" >
            <h5 align="center"> Habits </h5>
            <?php 
            echo "habits<br>";
            echo "habits<br>";
            echo "habits<br>";
            echo "habits<br>";
            echo "habits<br>";
            echo "habits<br>";
            echo "habits<br>";
            echo "habits<br>";
            ?>
        </div>
        <br>
        <div id="dash_demo_reports">
            <h5 align="center"> Reports </h5>
            <button onclick="prev()"  style="scale:0.3;"><img src="backbutton.png"></button>
            <button onclick="next()"  style="scale:0.3;float:right;"><img src="nextbutton.png"></button>

            <p align="center"  >
                <img id="dash_report_container" st src="g1.png">
            </p>
        </div>
        <br>
        <div id="dash_todo">
            <h5 align="center" > To-Do List</h5>
            <?php 
            echo "tasks<br>";
            echo "tasks<br>";
            echo "tasks<br>";
            echo "tasks<br>";
            echo "tasks<br>";
            echo "tasks<br>";
            echo "tasks<br>";
            echo "tasks<br>";
            echo "tasks<br>";
        ?>
        </div>

    </div>    
</body>