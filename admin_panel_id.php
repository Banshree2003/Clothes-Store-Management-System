<?php
require 'vendor/autoload.php';

$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$database = $mongoClient->styleHaven;
$collection = $database->users;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style/admin_id.css" />
</head>

<body>
    <div class="main">
        <div class="panel">
            <div class="admintitle">
                <center>
                    <h2>Admin Panel</h2>
                </center>
            </div>
            <div class="adminlist">
                <div>
                    <a href="admin_panel_id.php">User Database</a>
                </div>
                <div>
                    <a href="admin_panel_cart.php">Cart Database</a>
                </div>
            </div>
        </div>
        <div>
            <h1 class="jjj">User Data</h1>
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = $collection->find();

                    foreach ($users as $user) {
                        echo "<tr>";
                        echo "<td>{$user['_id']}</td>";
                        echo "<td>{$user['name']}</td>";
                        echo "<td>{$user['email']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>