<?php 
$task_id = $_GET["id"];
require_once "connect.php";
$stmt = pdo->query("DELETE FROM tasks WHERE task_id = $task_id");
?>