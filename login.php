<?php
// session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require("classes/auth.php");
$auth = new Auth();


if (isset($_POST['login'])) {

  $email = $_POST['email'];
  echo $email;

  $password = $_POST['password'];
  echo $password;

  $user = $auth->login_user($email,$password);

  if ($user) {
    
    header("Location:homepage.php");
    exit();
    // session_write_close();
  }
}else {
  echo "form not submitted";
}





?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- google fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto:wght@100&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">

    <style type="text/css">
      .wrapper {
        background-image:url("images/seliModel/login.jpeg");
background-position: center center;
background-repeat: no-repeat;
background-size: cover;
      }
    </style>
  </head>

  <body>

   

<div class="container-fluid wrapper">

    <!-- navigation -->
    <div class="container-fluid">
      <?php include("nav.php"); ?>
    </div>
     

<!-- navigation -->

   <!-- login form -->
    <div class="container login-form">

       <form class="form-signin" method="post">
      <!-- <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required>
      <br>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <p class="forget"><a href="forget-password.php">Forget Password?</a></p>
     <!--  <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <button class="btn btn-lg btn-block" name="login" type="submit"
      style="background-color: #005C46; color: white;">Sign in</button>
      <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p> -->
    </form>
      
    </div>
    <!-- end of login form -->
  
</div>
  
 

    <!-- footer -->
     <footer class="footer text-center">
      <div class="container">
        <span class="text-white">Copyright at 2023</span>
      </div>
    </footer>
    <!-- footer -->

   
  </body>
</html>
