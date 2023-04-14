<?php
require_once __DIR__ . '/vendor/autoload.php';

// Set your Africa's Talking API credentials
$username = 'your_username';
$api_key = 'your_api_key';

// Set the phone numbers and messages you want to send
$recipients = array(
    '+254717758400',
    // '+254712345679',
    // '+254712345680'
);
$message = 'Hello, this is a test message from Africa\'s Talking!';

// Set up the API client
require_once('../vendor/autoload.php');
use AfricasTalking\SDK\AfricasTalking;

// Initialize the SDK
$AT = new AfricasTalking($username, $api_key);

// Get the SMS service
$sms = $AT->sms();

// Send the messages
$result = $sms->send([
    'to'      => implode(',', $recipients),
    'message' => $message
]);

// Check the results
if ($result['status'] == 'success') {
    echo 'Messages sent successfully!';
} else {
    echo 'Error sending messages: ' . $result['message'];
}

?>