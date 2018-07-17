<?php
session_start();
require_once "connect.php";

$sql = "UPDATE tasks SET
            task_date = ?,
            task_content = ?,
            task_total = ?,
            task_todo = ?
        WHERE task_id = ?";
$pdo -> prepare($sql) 
     -> execute([$_POST["date"],$_POST["content"], $_POST["total"], $_POST["todo"], $_SESSION["task_id"]]);
echo "The records has been changed, click <a href='home.php'><strong>here</strong></a> to go back to the page.";

?>