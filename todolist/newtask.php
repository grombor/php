<?php
session_start();
require_once "connect.php";
$data = [NULL,
         $_SESSION["user_id"],
         $_POST["task_content"],
         $_POST["task_date"],
         $_POST["link"],
         $_POST["task_todo"],
         $_POST["task_total"]
        ];

$sql = "INSERT INTO tasks VALUES (?,?,?,?,?,?,?)";

try {
    $pdo -> prepare($sql) -> execute($data);
    echo "Data added propertly, please click <a href=''><strong>here</strong></a> to come back to the main page.";
}
catch (PDOExeption $e) {
    echo "Error";
};
?>