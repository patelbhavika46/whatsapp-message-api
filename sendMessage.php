<?php
/**
 * WhatsApp Message Sender Utility
 *
 * Handles the logic for sending WhatsApp messages via the Meta API.
 * Extensible for other message types or logging.
 *
 * @author
 */

require_once 'config.php';

/**
 * Sends a WhatsApp text message.
 *
 * @param string $to The recipient's phone number in international format (e.g., 15551234567).
 * @param string $message The message body.
 * @return array Associative array with 'success' (bool), 'api_response' (raw string), and 'error' (string|null).
 */
function sendWhatsAppMessage($to, $message) {
    $url = "https://graph.facebook.com/v18.0/" . PHONE_NUMBER_ID . "/messages";
    $payload = [
        "messaging_product" => "whatsapp",
        "to" => $to,
        "type" => "text",
        "text" => ["body" => $message]
    ];

    $headers = [
        "Authorization: Bearer " . WHATSAPP_TOKEN,
        "Content-Type: application/json"
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $api_response = curl_exec($ch);
    $curl_error = curl_error($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $response = [
        'success' => false,
        'api_response' => $api_response,
        'error' => null,
        'http_code' => $http_code
    ];

    if ($curl_error) {
        $response['error'] = "cURL error: $curl_error";
    } elseif ($http_code >= 200 && $http_code < 300) {
        $response['success'] = true;
    } else {
        $response['error'] = "API error: HTTP $http_code";
    }

    return $response;
}

/**
 * Validates a phone number (basic check for international format).
 *
 * @param string $phone
 * @return bool
 */
function isValidPhoneNumber($phone) {
    return preg_match('/^\d{10,15}$/', $phone) === 1;
}

/**
 * Sanitizes and trims input.
 *
 * @param string|null $input
 * @return string
 */
function sanitizeInput($input) {
    return htmlspecialchars(trim((string)$input), ENT_QUOTES, 'UTF-8');
}
?>