<?php
if ($_POST["password"] != $_POST["password_confirmation"]) {
    die ("Passwords did not match, please try again");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);


$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO users (`username`, `email`, password_hash)
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (! $stmt->prepare($sql)) {
    die ("SQL Error: " . $mysqli.error);
}

$stmt->bind_param("sss",
                 $_POST["username"],
                 $_POST["email"], 
                 $password_hash);
        
$query1 = sprintf("SELECT * FROM users
WHERE username='%s' ", $mysqli->real_escape_string($_POST["username"]));
$row1 = $mysqli->query($query1);

$query2 = sprintf("SELECT * FROM users
WHERE email='%s' ", $mysqli->real_escape_string($_POST["email"]));
$row2 = $mysqli->query($query2);

if($row1->fetch_assoc()) {
    echo "This username already exits, try a different one";
}
else if($row2->fetch_assoc()){
    echo "This email already exits, try a different one";
}
else {

    if ($stmt->execute()) {
        header("Location: signup_success.html");
        exit;
    }
}

?>