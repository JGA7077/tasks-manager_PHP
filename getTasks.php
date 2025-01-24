<?php 

$file = "tasks.json";
if (file_exists($file) && file_get_contents($file) !== '') {
    echo file_get_contents($file);
} else {
    echo json_encode([]);
}
?>
