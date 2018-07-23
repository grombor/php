<?php
    session_start();
    require_once "login.php"
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
    <title>Log in to the system...</title>
  </head>
  <body>
    <div class="container pt-5 w-60">
      <div>
        <form class="my-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <label for="basic-url">Your Credentials:</label>
          <div class="error"><?php echo $usernameErrorMessage; ?></div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">Username:</span>
            </div>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="basic-addon3">
          </div>
          <div class="error"><?php echo $passwordErrorMessage; ?></div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">Password:</span>
            </div>
            <input type="password" class="form-control" id="password" name="password" aria-describedby="basic-addon3">
          </div>
          <input type="submit" name="submit" value="Log In" class="btn btn-primary">
        </form>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
  </body>
</html>
