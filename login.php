<?php
$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = require __DIR__ . "/database.php";
    $sql = sprintf(
        "SELECT * FROM users
            WHERE email ='%s' ",
        $mysqli->real_escape_string($_POST["email"])
    );
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_start();
            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];

            header("Location: dashboard.php");
            exit;
        }
    }
    $is_invalid = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habit Tracker | SignIn</title>
    <link rel="stylesheet" href="styles2.css">
    <style>
        * {
            vertical-align: middle;
            font-size: 30px;
        }

        button {
            background-color: transparent;
            font-weight: bold;
            border: 2px solid white;
            padding: 2px;
        }

        button:hover {
            background-color: #00ADB5;
        }

        table {
            margin-top: auto;
            margin-bottom: auto;
        }

        td {
            text-align: left;
            padding: 30px;
            margin: 30px
        }

        input {
            font-size: 40px;
            border: none;
            border-radius: 2%;
            color: white;
            background-color: rgb(44 65 95 / 60%);
        }

        input:hover {
            background-color: rgb(70 70 95 / 60%);
        }

        #login_button {
            background-color: transparent;
        }

        #login_button:hover {
            background-color: rgb(70 70 95 / 60%);
        }

        .cen {
            margin-top: 200px;
        }
    </style>
</head>

<body align="center">
    <?php if ($is_invalid) : ?>
        <em>Invalid Login</em>
    <?php endif; ?>
    <form method="post">
        <div class="cen">
            <table align="center">
                <tr>
                    <td>
                        <label for="email"> Email: </label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                    </td>
                </tr>
                <td>
                    <label for="password"> Password: </label>
                </td>
                <td>
                    <input type="password" name="password" id="password">
                </td>
                <tr>
                    <td colspan=2 style='text-align:center'><input type="submit" align="center" id="login_button" value="Sign In"></td>
                </tr>
            </table>
    </form>
    </div>
</body>

</html>