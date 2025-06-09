<?php
// Receive DLR parameters sent by Kannel
$message_id = $_GET['message_id'] ?? 'unknown';
$status = $_GET['status'] ?? 'unknown';

// Map status codes to human-readable text
$status_map = [
    0 => 'Delivered',
    1 => 'Expired',
    2 => 'Deleted',
    3 => 'Undeliverable',
    4 => 'Accepted',
    5 => 'Unknown',
    6 => 'Rejected'
];

$status_text = $status_map[$status] ?? "Unknown status code: $status";

// Log the delivery report to a file (append mode)
$log_line = date('Y-m-d H:i:s') . " - Message ID: $message_id - Status: $status_text\n";
file_put_contents('dlr_log.txt', $log_line, FILE_APPEND);

// Respond to Kannel with HTTP 200 OK and a simple message
http_response_code(200);
echo "OK";
