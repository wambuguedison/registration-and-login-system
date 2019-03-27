<?php
  include "includes/db.php";

  if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($connect, sanitize($_POST['username']));
    $password = mysqli_real_escape_string($connect, sanitize($_POST['password']));
    $password = md5($password);

    $sqlCheck = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
    $results = $connect->query($sqlCheck);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Welcome ".$username;
      header('location: index.php');
    } else {
      $usernameCheck = "SELECT * FROM users WHERE username = '{$username}'";
      $results = $connect->query($usernameCheck);
      if (mysqli_num_rows($results) == 0) {
        $invalidUsername = TRUE;
      } else {
        $passwordCheck = "SELECT * FROM users WHERE username = '{$username}'";
        $con = $connect->query($passwordCheck);
        $success = mysqli_fetch_assoc($con);
        if ($success['password'] != $password) {
          $invalidPassword = TRUE;
        }
      }
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="src/css/all.css" />
    <link rel="stylesheet" href="src/css/bootstrap.min.css" />
    <link rel="stylesheet" href="src/css/main.css" />
    <title>E 'n' C | Login</title>
  </head>
  <body>
    <div class="container-fluid head text-center">
      <h1><em>E 'n' C </em>Recovery Program.</h1>
      <h5>A safe haven you can depend on.</h5>
    </div>
    <div class="img"></div>
    <div class="container-fluid forms text-center">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <h2 class="loginH">Login.</h2>
          <div class="login-form">
            <form method="POST" action="login.php" onsubmit="return validateLogin()">
              <div class="form-group">
                <label for="username"><h5>Username</h5></label>
                <input
                  type="text"
                  id="username"
                  name="username"
                  placeholder="Enter Username"
                  class="form-control"
                  value="<?=(isset($_POST['login'])) ? $_POST['username'] : '' ;?>"
                />
                <span id="username_Error">
                <?=UsernameErr($invalidUsername);?>
                <!--Username validation--></span>
              </div>
              <div class="form-group">
                <label for="password"><h5>Password</h5></label>
                <div class="input-group">
                  <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter Password"
                    class="form-control"
                    value="<?=(isset($_POST['login'])) ? $_POST['password'] : '';?>"
                  />
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <a href="#" onclick="visibility()">
                        <i class="far fa-eye" id="eye"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <span>
                <?=PasswordErr($invalidPassword);?>
                <!--Password validation--></span>
              </div>
              <div class="row">
                <div class="col">
                  <a href="register.php" class="btn btn-lg btn-danger"
                    >Register</a
                  >
                </div>
                <div class="col">
                  <button type="submit" name="login" id="login" class="btn btn-lg btn-primary">
                    &nbsp; Login &nbsp;
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>

    <!--Scripts at end of page to ensure page loads faster -->
    <script src="src/js/jquery-slim.min.js"></script>
    <script src="src/js/popper.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/main.js"></script>
  </body>
</html>
