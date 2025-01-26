<?php 
class Task {
  private $title, $description, $id;

  public function __construct($title, $description, $id) {
    $this->setTitle($title);
    $this->setDescription($description);
    $this->setId($id);
  }
  public function saveTaskOnJSON() {
    $task = [
      "title" => $this->getTitle(),
      "description" => $this->getDescription(),
      "id" => $this->getId()
    ];

    $file = "../tasks.json";
    $tasks = file_exists($file) ? json_decode(file_get_contents($file), true) : null;

    $tasks["tasks"][] = $task;

    file_put_contents($file, json_encode($tasks, JSON_PRETTY_PRINT));
  }

  public function getTitle()
  {
    return $this->title;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  } 
  public function getDescription()
  {
    return $this->description;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
}
?>