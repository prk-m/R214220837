<?php

$externalUrl = $_GET['url'];
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $externalUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    $error = curl_error($ch);
    echo json_encode(['error' => 'Failed to fetch data: ' . $error]);
} else {
    // Output the fetched data
    echo $response;
}

curl_close($ch);
?>
