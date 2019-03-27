<?php
    include "includes/db.php";

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You Must Log In First!";
        header('location: login.php');
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
?>
<?php 
  $userQuery = "SELECT * FROM users WHERE username = '{$_SESSION['username']}'";
  $user = $connect->query($userQuery);
  $userDetails = mysqli_fetch_assoc($user);
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
    <title>E 'n' C | Home</title>
  </head>
  <body>
    <div class="container-fluid">
      <?php
        include "includes/navbar.php";
      ?>
    </div>
    <div class="container-fluid head text-center">
      <h1><em>E 'n' C </em>Recovery Program.</h1>
      <h5>A safe haven you can depend on.</h5>
    </div>
    
    <div class="text-center">
        <a href="index.php?logout='1'" class="btn btn-danger btn-lg" name="logout" id="logout">Logout</a>
    </div>
    <div>Welcome <?=$userDetails['username'];?></div>
    <p>First Name: <?=$userDetails['firstname'];?></p>
    <p>Last Name: <?=$userDetails['lastname'];?></p>
    <p>Email: <?=$userDetails['email'];?></p>

    <p onclick="test(<?=$userDetails['id']?>)">test</p>
    

    <!--Scripts at end of page to ensure page loads faster -->
    <script src="src/js/jquery-3.3.1.js"></script>
    <script src="src/js/popper.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/main.js"></script>
  </body>
</html>
