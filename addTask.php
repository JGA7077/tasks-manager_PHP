<?php 
require_once "Task.php";

$data = json_decode(file_get_contents("php://input"), true);


if (isset($data["title"]) && $data["title"] !== "") {
  echo json_encode(["success" => true]);
} else {
  echo json_encode(["success" => false]);
}
?>