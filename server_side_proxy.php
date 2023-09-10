<?php
// Get the URL to fetch from the query parameter
$externalUrl = $_GET['url'];

// Define the CORS headers to allow requests from any origin (adjust as needed)
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Use cURL to fetch data from the external URL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $externalUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    // Handle cURL error
    $error = curl_error($ch);
    echo json_encode(['error' => 'Failed to fetch data: ' . $error]);
} else {
    // Output the fetched data
    echo $response;
}

// Close cURL session
curl_close($ch);
?>
