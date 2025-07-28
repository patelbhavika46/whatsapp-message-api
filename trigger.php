<?php
require_once 'sendMessage.php';

// Example: condition fetched from DB or manually input
$customer = [
    "name" => "John Doe",
    "phone" => "15551234567",
    "order_status" => "shipped"
];

if ($customer['order_status'] === 'shipped') {
    $message = "Hello {$customer['name']}, your order has been shipped!";
    $response = sendWhatsAppMessage($customer['phone'], $message);
    echo "Message sent: " . $response;
} else {
    echo "Condition not met.";
}
?>