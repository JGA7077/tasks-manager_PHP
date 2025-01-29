<?php 
$origens_permitidas = [
    "http://localhost",
    "http://127.0.0.1:5500",
    "https://meusite.com",
    "https://www.meusite.com"
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

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  exit(0);
}

header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require_once "../Task.php";


// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//   http_response_code(200);
//   exit;
// } else

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  http_response_code(405);
  echo json_encode(["error" => "Only POST requests are allowed"]);
  exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["title"]) && $data["title"] !== "") {
  $newTask = new Task(
    $data["title"],
    $data["description"],
    uniqid('', true)
  );

  $newTask->saveTaskOnJSON();

  echo json_encode([
    "success" => true,
    "task" => [
      "title" => $newTask->getTitle(),
      "description" => $newTask->getDescription(),
      "id" => $newTask->getId()
    ]
  ]);
  exit;
} else {
  http_response_code(400);
  echo json_encode(["success" => false]);
  exit;
}
?>