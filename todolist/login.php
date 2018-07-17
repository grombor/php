<?php
// Make connection to DB
include_once "connect.php";

// Test variables
$username = $password = "";
$usernameErrorMessage = "Try \"guest\"";
$passwordErrorMessage = "Try \"pass123\"";

// Validate ceredentials from POST table
function test_input($string){
  $string = trim($string);
  $string = stripslashes($string);
  $string = htmlspecialchars($string);
  return $string;
}

// If post method called
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['username']) || empty($_POST['password'])) {
    if (empty($_POST['username'])) {
      $usernameErrorMessage = "Field \"username\" should not be empty";
    }
    if (empty($_POST['password'])){
      $passwordErrorMessage = "Field \"password\" should not be empty";
    }
  }
  else {
    // If is eveything ok then start
    // Validate credentials
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    // Check is username exists
    $stmt = $pdo -> prepare(
      'SELECT count(*) FROM users WHERE username=?');
    $stmt->execute([$username]);
    $result = $stmt -> fetchAll();
    // If user exists code
    if ($result) {
      // Prepare query
      $stmt = $pdo -> prepare(
        "SELECT * FROM users WHERE username=? AND password = ?");
      $stmt->execute([$username, $password]);
      // Get the result
      $result = $stmt -> fetch();
      // IF username and password are correct
      if ($result) {
        $_SESSION = [
            "logged" => "true",
            "username" => $username,
            "user_id" => $result["user_id"]
        ];
        header("Location: home.php");
        exit;
      }
      // And if it is incorrect
      else {
        $usernameErrorMessage = $passwordErrorMessage = "Wrong password or username";
      }

    }
    else {
      $usernameErrorMessage = "User doesnt exist";
    }
  }
}

?>
