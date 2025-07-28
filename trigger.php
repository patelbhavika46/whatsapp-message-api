<?php
/**
 * WhatsApp Message Trigger
 *
 * Handles POST data from the form and sends a WhatsApp message.
 * Redirects back with status messaging for user feedback.
 */

require_once 'sendMessage.php';

// POST only
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php?status=error&msg=Invalid+request+method');
    exit;
}

// Input validation and sanitization
$phone = sanitizeInput($_POST['phone'] ?? '');
$name = sanitizeInput($_POST['name'] ?? '');
$message = sanitizeInput($_POST['message'] ?? '');

// Validate inputs
if (!isValidPhoneNumber($phone)) {
    header('Location: index.php?status=error&msg=Invalid+phone+number');
    exit;
}
if (empty($message)) {
    header('Location: index.php?status=error&msg=Message+cannot+be+empty');
    exit;
}

// Example: Compose message (extensible for more use-cases)
$finalMessage = $message;
if (!empty($name)) {
    $finalMessage = "Hello $name, $message";
}

// Send the WhatsApp message
$response = sendWhatsAppMessage($phone, $finalMessage);

// Redirect back with result
if ($response['success']) {
    header('Location: index.php?status=success&msg=Message+sent+successfully');
} else {
    $error_msg = urlencode($response['error'] ?: 'Failed to send message');
    header("Location: index.php?status=error&msg=$error_msg");
}
exit;
?>