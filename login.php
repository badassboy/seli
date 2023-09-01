<?php

require("classes/auth.php");
$auth = new Auth();


if (isset($_POST['login'])) {

  
  
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = trim($_POST['password']);

  $user = $auth->login_user($email,$password);

  if ($user) {
    header("Location:homepage.php");
    exit();
  }
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

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>

  <body>

   

<div class="container-fluid wrapper">

    <!-- navigation -->
    <div class="container-fluid">
       <nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
      </li>

    

       <li class="nav-item">
        <a class="nav-link" href="login.php">Register</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>

      
     
    </ul>
   
  </div>
</nav>
    </div>
     

<!-- navigation -->

   <!-- login form -->
    <div class="container login-form">

       <form class="form-signin" method="post">
      <!-- <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
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
