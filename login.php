<?php
require_once 'mongodb/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $collection->findOne(['email' => $email]);

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['_id'];

        setcookie('email', $email, time() + 3600, '/');

        setcookie('user_name', $user['name'], time() + 3600, '/');

        header("Location: index.php");
        exit;
    } else {
        $error_message = "Invalid email or password.";
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
                    <h1>Login</h1>
                </center>
            </div>
            <div class="loni">
                <form method="POST" action="login.php">
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
                <div>
                    <center>
                        <a href="signup.php">
                            <h5>Sign up</h5>
                        </a>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
</body>

</html>