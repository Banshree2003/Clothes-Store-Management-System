<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $expectedEmail = "admin@gmail.com";
    $expectedPassword = "banshree";

    if ($email === $expectedEmail && $password === $expectedPassword) {

        header("Location: admin_panel_id.php");
        exit;
    } else {
        $error_message = "Invalid email or password. Please try again.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/login.css" />
</head>

<body>
    <div class="loginmain">
        <div class="logincenter">
            <div>
                <center>
                    <h1>Admin Login</h1>
                </center>
            </div>
            <div class="loni">
                <form method="POST" action="admin_panel.php">
                    <div class="email">
                        <h2>Email</h2>
                        <input type="email" name="email" id="email" required />
                    </div>
                    <div class="password">
                        <h2>Password</h2>
                        <input type="password" name="password" id="password" required />
                    </div>
                    <div class="loginbtn">
                        <center><button type="submit">Log in</button></center>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
</body>

</html>