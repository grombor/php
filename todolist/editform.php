<!doctype html>
<html lang="en">
  <head>
   <?php 
    session_start();
    $_SESSION["task_id"] = $_GET["task_id"];

    // Check if the user is logged in.

    if(!isset($_SESSION['username']) || !isset($_SESSION['logged'])){
        //User not logged in. Redirect them back to the login.php page.
        header('Location: index.php');
        exit;
    }
    else {
      // Set up connection to DB
      require_once "connect.php";
      // Make a query
      $stmt = $pdo->prepare("SELECT * FROM tasks WHERE user_id = ? AND task_id = ?");
      $stmt -> execute([$_SESSION["user_id"],$_GET["task_id"]]);
      $result = $stmt -> fetch();
      // Run function to print rows
      //  require_once "code.php";
       // echo var_dump($result);
    }
      
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="css/my.css">
    <title>Hello <?php echo $_SESSION['username'];?></title>
  </head>
  <body>
      <div class="container">
          <form action="edit.php" method="POST" autocomplete="off">
              <p>Date: <br>
                  <input type="date" name="date" value="<?php echo($result["task_date"]); ?>"></p>
              <p> Content: <br>
                  <textarea name="content" cols="30" rows="5"><?php echo($result["task_content"]); ?></textarea></p>
              <p>Link: <br>
                  <input type="url" name="link" maxlength="100" value="<?php echo($result["link"]); ?>"></p>
              <p>Progress: <br>
                  <input type="number" name="total" value="<?php echo($result["task_total"]); ?>"></p>
              <p>Total: <br>
                  <input type="number" name="todo" value="<?php echo($result["task_todo"]); ?>"></p>
              <p><input type="submit"></p>
          </form>
      </div>
  </body>