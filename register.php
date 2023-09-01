<?php
require("classes/auth.php");
  $auth = new Auth();
  $msg = "";

  if (isset($_POST['signup'])) {
    $name = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
    // validate email for correct input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
    // remove leading and trailing whitespaces from a string.
    $password = trim($_POST['password']);


    $activation_code = $auth->generate_activation_code();

    $user = $auth->RegisterUser($name,$email,$city,$phone,$gender,$password,$activation_code);
    if ($user) {
      
      // send activation email
      $auth->send_activation_email($email,$activation_code);

      // redirect user to login page
      $msg = '<div class="alert alert-success" role="alert">Please check your email to activate your email before signing in</div>';
      sleep(3);
      header("Location:login.php");
      exit;
      

     
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
    <link href="css/register.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post">
      <!-- <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
      <?php if (isset($msg)) {echo $msg; } ?>
      <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>

       <label for="inputText" class="sr-only">FullName</label>
      <input type="text" name="fullname" id="inputText" class="form-control" placeholder="FullName" required>
      <br> 

     <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
       

       <label for="inputText" class="sr-only">City</label>
      <input type="text" name="city" id="inputText" class="form-control" placeholder="City" required autofocus>
      <br>
      <label for="inputPassword" class="sr-only">Phone</label>
      <input type="text" name="phone" id="inputPassword" class="form-control" placeholder="Phone" required>
      <br>

       <label for="inputText" class="sr-only">Gender</label>
        <select class="form-control" id="inputText" name="gender">
          <option>Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
         
        </select>
        <br>
         <label for="password" class="sr-only">Confirm Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autofocus>
      <br>
       <label for="inputPassword" class="sr-only">Confirm Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Confirm Password" required>

     <!--  <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <button class="btn btn-lg btn-primary btn-block" name="signup" type="submit">Sign up</button>
      <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p> -->
    </form>
  </body>
</html>
