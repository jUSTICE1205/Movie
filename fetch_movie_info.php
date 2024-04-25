<?php
header("Access-Control-Allow-Origin: *");

$query = isset($_GET['query']) ? $_GET['query'] : '';

if (!empty($query)) {
    $url = 'https://en.wikipedia.org/w/api.php?action=query&list=search&srsearch=' . urlencode($query) . '&format=json';
    $result = file_get_contents($url);

    echo $result;
} else {
    echo json_encode(array('error' => 'Query parameter is required'));
}
