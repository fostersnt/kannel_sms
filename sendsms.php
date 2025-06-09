<?php
// Kannel sendsms URL
$kannel_url = "http://127.0.0.1:13013/cgi-bin/sendsms";

// Credentials (must match your sendsms-user config)
$username = "myuser";
$password = "mypass";

// SMS details
$to = "233501234567";      // recipient phone number (international format)
$from = "MyBrand";         // sender ID
$text = "Hello, this is a test message with DLR!";

// Unique message ID for tracking (could be a database ID)
$message_id = uniqid();

// URL to receive delivery reports (make sure this is accessible publicly or locally as needed)
$dlr_url = "http://yourserver.com/dlr_receiver.php?message_id=$message_id&status=%d";

// Build the GET query with DLR params
$params = http_build_query([
    'username'   => $username,
    'password'   => $password,
    'to'         => $to,
    'from'       => $from,
    'text'       => $text,
    'dlr-mask'   => 31,             // request all status updates
    'dlr-url'    => $dlr_url,
    'dlr-method' => 'GET',
    'dlr'        => $message_id     // your unique ID to track the message
]);

// Create full URL
$url = $kannel_url . "?" . $params;

// Send the HTTP GET request to Kannel
$response = file_get_contents($url);

// Output Kannel's response
echo "Kannel response: " . $response;
