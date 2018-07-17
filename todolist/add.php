<!doctype html>
<html lang="en">
  <head>
   <?php 
    session_start();

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
          <form action="newtask.php" method="POST" autocomplete="off">
              <p>Date: <br>
                  <input type="date" name="task_date" value="dd-mm-yyyy"></p>
              <p> Content: <br>
                  <textarea name="task_content" cols="30" rows="5">Sample text</textarea></p>
              <p>Link: <br>
                  <input type="url" name="link" maxlength="100" value="http://"></p>
              <p>Progress: <br>
                  <input type="number" name="task_total" value=""></p>
              <p>Total: <br>
                  <input type="number" name="task_todo" value=""></p>
              <p><input type="submit"></p>
          </form>
      </div>
  </body>