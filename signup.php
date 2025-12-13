<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="style/signup.css" />
</head>

<body>
    <div class="loginmain">
        <div class="logincenter">
            <div>
                <center>
                    <h1>Sign up</h1>
                </center>
            </div>
            <div class="loni">
                <form method="POST" action="signup.php">
                    <div class="name">
                        <center>
                            <h2>Name</h2>
                        </center>
                        <center>
                            <input type="text" name="name" id="name" required />
                        </center>
                    </div>

                    <div class="email">
                        <center>
                            <h2>Email</h2>
                        </center>
                        <center>
                            <input type="email" name="email" id="email" required />
                        </center>
                    </div>
                    <div class="password">
                        <center>
                            <h2>Password</h2>
                        </center>
                        <center>
                            <input type="password" name="password" id="password" required />
                        </center>
                    </div>
                    <div class="loginbtn">
                        <center><button type="submit">Sign up</button></center>
                        <div>
                            <center>
                                <a href="login.php">
                                    <h5>Log in</h5>
                                </a>
                            </center>
                        </div>
                    </div>
                </form>
                <?php
                require_once 'mongodb/db_config.php';

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                    $existingUser = $collection->findOne(['email' => $email]);

                    if ($existingUser) {
                        echo "<p>Email already exists. Please use a different email.</p>";
                    } else {
                        $userDocument = [
                            'name' => $name,
                            'email' => $email,
                            'password' => $password,
                        ];

                        $result = $collection->insertOne($userDocument);

                        if ($result->getInsertedCount() > 0) {
                            header("Location: login.php");
                            exit;
                        } else {
                            $error_message = "Registration failed. Please try again.";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>