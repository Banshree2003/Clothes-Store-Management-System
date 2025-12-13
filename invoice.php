<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
    <?php
    require 'vendor/autoload.php';

    use MongoDB\Client;

    $client = new Client("mongodb://localhost:27017");
    $database = $client->selectDatabase('styleHaven');

    $cartCollection = $database->selectCollection('carts');

    if (isset($_GET['id'])) {
        $order_id = $_GET['id'];
        $order = $cartCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($order_id)]);

        if ($order) {
            $user_email = $order['user_email'];
            $timestamp = $order['timestamp']->toDateTime()->format('Y-m-d H:i:s');
            $cart_data = $order['cart_data'];
        }
    }

    ?>
    <div class="invoice-main">

        <div class="invoice1">
            <div>
                <div>
                    <h1>INVOICE</h1>
                </div>
                <div>
                    <h2>StyleHaven</h2>
                </div>
            </div>
            <div>
                <div>
                    <p>Date</p>
                </div>
                <div>
                    <?php
                    echo "<p>{$timestamp}</p>";
                    ?>
                </div>
            </div>
        </div>
        <div class="titileinvoice">
            <div>
                <h1>ITEM NAME</h1>
            </div>
            <div>
                <h1>QTY</h1>
            </div>
            <div>
                <h1>PRICE</h1>
            </div>
        </div>
        <div>
            <?php

            foreach ($cart_data as $item) {
                echo "<div class='cart-item-invoice'>";
                echo "<p><span>{$item['name']}</p>";
                echo "<p><span>1</span></p>";
                echo "<p><span>{$item['price']}</span></p>";
                echo "</div>";
            }
            echo "<hr></hr>";

            echo "<p><strong>Email:</strong> {$user_email}</p>";
            ?>

        </div>
    </div>
</body>

</html>