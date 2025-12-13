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
        echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>Full Bill Details</title>";
        echo "<style>";
        echo "body {";
        echo "font-family: Arial, sans-serif;";
        echo "margin: 0;";
        echo "padding: 0;";
        echo "background-color: #f2f2f2;";
        echo "}";
        echo "h1 {";
        echo "background-color: #0B7A75;";
        echo "color: #fff;";
        echo "padding: 20px;";
        echo "text-align: center;";
        echo "}";
        echo "</style>";
        echo "</head>";
        echo "<body>";
        echo "<h1>Full Bill Details</h1>";
        echo "<p><strong>Email:</strong> {$user_email}</p>";
        echo "<p><strong>Timestamp:</strong> {$timestamp}</p>";

        echo "<h2>Cart Data</h2>";
        foreach ($cart_data as $item) {
            echo "<p>{$item['name']} - {$item['price']}</p>";
        }

        echo "</body>";
        echo "</html>";
    } else {
        echo "<p>Order not found.</p>";
    }
} else {
    echo "<p>Order ID not provided.</p>";
}
