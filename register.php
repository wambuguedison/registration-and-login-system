<?php
  include "includes/db.php";
  
  if (isset($_POST['register'])) {
    $fName = mysqli_real_escape_string($connect, sanitize($_POST['fName']));
    $lName = mysqli_real_escape_string($connect, sanitize($_POST['lName']));
    $username = mysqli_real_escape_string($connect, sanitize($_POST['username']));
    $email = mysqli_real_escape_string($connect, sanitize($_POST['email']));
    $password = mysqli_real_escape_string($connect, sanitize($_POST['password']));

    $checkUser = "SELECT * FROM users WHERE username = '{$username}' OR email = '{$email}' LIMIT 1";
    $userResult = $connect->query($checkUser);
    $user = mysqli_fetch_assoc($userResult);
    if ($user) {
      if ($user['username'] == $username) {
        $usernameTaken = TRUE;
      }
      if ($user['email'] == $email) {
        $emailTaken = TRUE;
      }
    }
    if (!$usernameTaken && !$emailTaken) {
      $password = md5($password);
      $SQLQuery = "INSERT INTO users(firstname, lastname, username, email, password) VALUES('$fName', '$lName', '$username', '$email', '$password')";
      $insertQuery = $connect->query($SQLQuery);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
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
    <title>E 'n' C | Register</title>
  </head>
  <body style="background-color: rgb(117, 194, 238);">
    <div class="container-fluid head text-center">
      <h1><em>E 'n' C </em>Recovery Program.</h1>
      <h5>A safe haven you can depend on.</h5>
    </div>
    <div class="img"></div>
    <div class="container-fluid register_form text-center">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <h2 class="registrationH">Registration.</h2>
          <div class="login-form">
            <form method="POST" action="register.php" onsubmit="return validateRegister()">
              <div class="form-group">
                <label for="fName"><h5>First Name</h5></label>
                <input
                  type="text"
                  id="fName"
                  name="fName"
                  placeholder="Enter First Name"
                  class="form-control"
                  value="<?=(isset($_POST['register']))? $_POST['fName'] : '';?>"
                />
                <span><!--First Name validation--></span>
              </div>
              <div class="form-group">
                <label for="lName"><h5>Last Name</h5></label>
                <input
                  type="text"
                  id="lName"
                  name="lName"
                  placeholder="Enter Last Name"
                  class="form-control"
                  value="<?=(isset($_POST['register']))? $_POST['lName'] : '';?>"
                />
                <span><!--Last Name validation--></span>
              </div>
              <div class="form-group">
                <label for="username"><h5>Username</h5></label>
                <input
                  type="text"
                  id="username"
                  name="username"
                  placeholder="Enter Username"
                  class="form-control"
                  value="<?=(isset($_POST['register']))? $_POST['username'] : '';?>"
                />
                <span>
                <?=usernameExists($usernameTaken);?>
                <!--Username validation--></span>
              </div>
              <div class="form-group">
                <label for="email"><h5>Email</h5></label>
                <input
                  type="email"
                  id="email"
                  name="email"
                  placeholder="Enter Email"
                  class="form-control"
                  value="<?=(isset($_POST['register']))? $_POST['email'] : '';?>"
                />
                <span>
                <?=emailExists($emailTaken);?>
                <!--Email validation--></span>
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
                    value="<?=(isset($_POST['register']))? $_POST['password'] : '';?>"
                  />
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <a href="#" onclick="visibilityReg()">
                        <i class="far fa-eye" id="eye"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <span><!--Password validation--></span>
              </div>
              <div class="form-group">
                <label for="confirmPassword"><h5>Confirm Password</h5></label>
                <input
                  type="password"
                  id="confirmPassword"
                  name="confirmPassword"
                  placeholder="Confirm Password"
                  class="form-control"
                  value="<?=(isset($_POST['register']))? $_POST['password'] : '';?>"
                />
                <span><!--Confirm Password validation--></span>
              </div>
              <div class="row">
                <div class="col">
                  <a href="login.php" class="btn btn-lg btn-danger"
                    >&nbsp; Login &nbsp;</a
                  >
                </div>
                <div class="col">
                  <button type="submit" name="register" id="register" class="btn btn-lg btn-primary">
                    Register
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
