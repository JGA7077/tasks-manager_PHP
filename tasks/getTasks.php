<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
  http_response_code(405);
  echo json_encode(["error" => "Only GET requests are allowed"]);
  exit;
}

header('Content-Type: application/json');

$file = "../tasks.json";
if (file_exists($file) && file_get_contents($file) !== '') {
    echo file_get_contents($file);
} else {
    echo json_encode([]);
}
?>
