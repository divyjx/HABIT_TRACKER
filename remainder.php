
<?php
$message = "Greetings , ".$user['username']." .These are todays pending habits : <br>";
$count=0;
foreach($uncompletedArr as $x){
        $message=$message.$x.', ';
        $count++;
    }
if($count==0)
$message="Greetings , ".$user['username']."<br>Today's all Habits are completed";
else
$message=rtrim($message,", ");           

function function_alert($message) {
echo "<script>
        let altmsg='$message';
        function alertBox(){
            document.getElementById('browserWarning').hidden=false;
            document.getElementById('browserWarning').innerHTML = altmsg;
        }
        </script>";
}
function_alert($message);
?>