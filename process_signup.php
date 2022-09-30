<?php
if ($_POST["password"] != $_POST["password_confirmation"]) {
    die ("Passwords did not match, please try again");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);


$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO users (`name`, `email`, password_hash)
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (! $stmt->prepare($sql)) {
    die ("SQL Error: " . $mysqli.error);
}

$stmt->bind_param("sss",
                 $_POST["name"],
                 $_POST["email"], 
                 $password_hash);
        
if ($stmt->execute()) {
    header("Location: signup_success.html");
    exit;
}

// print_r($_POST);
// var_dump($password_hash);
?>