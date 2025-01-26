<?php 
require_once "../Task.php";

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