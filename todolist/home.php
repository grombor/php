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
  $stmt = $pdo->prepare("SELECT * FROM tasks WHERE user_id = ?");
  $stmt -> execute([$_SESSION["user_id"]]);
  $result = $stmt -> fetchAll();
  // Run function to print rows
    require_once "code.php";
}

?>


<!doctype html>
<html lang="en">
  <head>
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

      <!-- Navbar -->
      <nav class="navbar fixed-top navbar-dark">
        <span>You are logged in as <?php echo "<b>".$_SESSION['username']."</b>" ?></span>
        <a href="https://poczta.nazwa.pl/">My mail</a>
        <a href="https://www.youtube.com/">YT</a>
        <a href="http://www.colorzilla.com/gradient-editor/">CSS Gradient</a>
        <a href="https://smarkets.com/account/statement">Smarket</a>
        <a class="navbar-brand" href="logout.php"> | Log out</a>
      </nav>
      <h4 class="my-5 pt-5">To do list:</h4>
       <a class="btn btn-sm btn-outline-secondary" href="add.php">Add new task</a>
        <!-- Start table -->
        <div class="table-responsive">
          <table class="table table-dark mt-5">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Content</th>
                <th scope="col">Link</th>
                <th scope="col">Progress</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
          <tbody>
            <?php printRow($result);?>
          </tbody>
        </table>
      </div>
  <!-- end table -->
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
