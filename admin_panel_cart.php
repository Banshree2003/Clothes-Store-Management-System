<?php
require 'vendor/autoload.php';

use MongoDB\Client;

$client = new Client("mongodb://localhost:27017");
$database = $client->selectDatabase('styleHaven');

$cartCollection = $database->selectCollection('carts');

$cartData = $cartCollection->find();
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
            <h1 class="jjj">Cart Database</h1>
            <?php
            $cartDataCount = $cartCollection->countDocuments([]);
            if ($cartDataCount == 0) {
                echo "<p>No cart data available.</p>";
            } else {
            ?>
                <table>
                    <tr>
                        <th>Email</th>
                        <th>Timestamp</th>
                        <th>View Full Bill</th>
                    </tr>
                    <?php
                    foreach ($cartData as $document) {
                        $user_email = $document['user_email'];
                        $timestamp = $document['timestamp']->toDateTime()->format('Y-m-d H:i:s');
                        echo "<tr>";
                        echo "<td>{$user_email}</td>";
                        echo "<td>{$timestamp}</td>";
                        echo "<td><a href='invoice.php?id={$document['_id']}'>View</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>