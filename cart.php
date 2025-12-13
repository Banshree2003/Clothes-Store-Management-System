<?php
require 'vendor/autoload.php';

use MongoDB\Client;

$client = new Client("mongodb://localhost:27017");
$database = $client->selectDatabase('styleHaven');

session_start();

function isUserLoggedIn()
{
    return isset($_SESSION['user_id']);
}

function loginUser($user_id)
{
    $_SESSION['user_id'] = $user_id;
}

function logoutUser()
{
    unset($_SESSION['user_id']);
}

if (!isUserLoggedIn()) {
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

function removeFromCart($index)
{
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
    }
}

function calculateTotal()
{
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $price_numeric = floatval(preg_replace('/[^\d.]/', '', $item['price']));
        $total += $price_numeric;
    }
    return '₹' . number_format($total, 2);
}

function saveCartToMongoDB($cartData, $user_email)
{
    global $database;

    $cartCollection = $database->selectCollection('carts');

    $document = [
        'user_email' => $user_email,
        'timestamp' => new MongoDB\BSON\UTCDateTime(),
        'cart_data' => $cartData,
    ];

    $cartCollection->insertOne($document);

    return $document['timestamp'];
}

if (isset($_GET['remove'])) {
    $index = $_GET['remove'];
    removeFromCart($index);
    header("Location: cart.php");
    exit();
}

if (isset($_COOKIE['email'])) {
    $user_email = $_COOKIE['email'];
} else {
    $user_email = '';
}

if (isset($_POST['save_cart'])) {
    if (!empty($_SESSION['cart'])) {
        $timestamp = saveCartToMongoDB($_SESSION['cart'], $user_email);
        echo "<p>Thank you for your purchase! " . $timestamp->toDateTime()->format('Y-m-d H:i:s') . "</p>";
        $_SESSION['cart'] = [];
    } else {
        echo "<p>Your cart is empty. There's nothing to save.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            background-image: url(https://imagescdn.pantaloons.com/img/app/brands/pantaloons/bg-login.png);
        }

        .cart {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            background-color: #00b0b5;
        }

        .cart-header {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            justify-content: space-between;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 20px;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            justify-content: space-between;
            border-bottom: 1px solid #ccc;
            padding: 5px 0;
            margin-bottom: 5px;
        }

        .remove-link {
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }

        .remove-link:hover {
            color: red;
        }

        .cart-total {
            font-weight: bold;
            margin-left: 32%;
            font-size: 20px;
        }

        .placeorderbtn {
            background-color: #00b0b5;
            padding: 10px 24px;
            margin-left: 64%;
            color: #fff;
            border: green;
            border-radius: 20px;
        }

        .backtoproduct input {
            border: black 1px solid;
            padding: 12px 20px;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <div class="main">
        <center>
            <h1>Shopping Cart</h1>
        </center>

        <?php
        if (empty($_SESSION['cart'])) {
            echo "<p>Your cart is empty.</p>";
        } else {
            echo "<div class='cart'>";
            echo "<div class='cart-header'><strong>Product Name</strong><strong>Price</strong><strong>Action</strong></div>";
            foreach ($_SESSION['cart'] as $index => $item) {
                echo "<div class='cart-item'>";
                echo "<span>{$item['name']}</span>";
                echo "<span>{$item['price']}</span>";
                echo "<a href='cart.php?remove={$index}' class='remove-link'>Remove</a>";
                echo "</div>";
            }
            echo "<div class='cart-total'>Total: " . calculateTotal() . "</div>";
            echo "</div>";
            echo "<form action='cart.php' method='post'>";
            echo "<input type='submit' name='save_cart' value='Place order' class='placeorderbtn'>";
            echo "</form>";
        }
        ?>

        <div class="backtoproduct">
            <a href="index.php"><input type="submit" value="< Back to Products"></a>
        </div>
    </div>
</body>

</html>