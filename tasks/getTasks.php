<?php
/*$origens_permitidas = [
    "http://localhost",
    "http://127.0.0.1:5500",
    "https://tasks-manager-php.vercel.app/",
    "https://tasks-manager-php.vercel.app"
];

if (isset($_SERVER['HTTP_ORIGIN'])) {
    $origem = $_SERVER['HTTP_ORIGIN'];

    if (in_array($origem, $origens_permitidas)) {
        header("Access-Control-Allow-Origin: $origem");
    } else {
        http_response_code(403);
        echo json_encode(["erro" => "Acesso negado. Origem não permitida."]);
        exit;
    }
} else {
    header("Access-Control-Allow-Origin: http://localhost");
}
*/
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  exit(0);
}

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//   http_response_code(200);
//   exit;
// } else 
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
