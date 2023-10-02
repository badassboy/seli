<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("classes/auth.php");
$ch = new Auth();

$info = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {


	$email = trim($_POST['email']);
	$pwd = trim($_POST['pwd']);
	// echo $pwd;
	
	if (isset($email) || isset($pwd)) {

		$user = $ch->login($email,$pwd);
		if ($user) {
			
			header("Location: homepage.php");
			exit;

			// return;
		}else{
			$info = "login failed";
		}

	}else {

		$info = "fields are required";	
		
		

	}
}






?> 


 <!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	

	<title></title>

	<link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/admin-index.css">
</head>
<body>

<!-- login page here -->
	<div class="container-fluid auth_page">

		<div class="container-fluid header">

			<h1>ADMIN LOGIN</h1>
		
		</div>

			<h3>LOGIN HERE</h3>
			    <div class="second">
			    	
			    	<form method="post" action="">
			    		<?php

			    		if (isset($info)) {
			    			echo $info;
			    		}

			    		?>
			    	  <div class="form-group">
			    	      <label for="exampleInputEmail1">Email address</label>
			    	      <input type="email" name="email" class="form-control"  placeholder="Email">
			    	      
			    	    </div>

			    	  <div class="form-group">
			    	    <label for="exampleInputPassword1">Password</label>
			    	    <input type="password" name="pwd" class="form-control" placeholder="Password" required="required">
			    	  </div>

			    	  

			    	 <input type="submit" name="login" class="default" value="Login">

			    	  <br>
			    	  <p class="next">Forget Password?<a href="forget_password.php" style="color: #009933;">Click Here</a></p>
			    	</form>
			    </div>

			


		


	</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>