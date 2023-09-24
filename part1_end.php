<?php
// checking if user is logged in using sessions.
// session_start();
// if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == "true") {
	
// }else{
// 	header("Location:index.php");
// 	exit();
// }

if (!empty($_POST['part2'])) {
	
	// navigate to part 2.
	header("Location:part2.php");
	exit();

}




?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	 <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<link rel="stylesheet" type="text/css" href="cover.css">


</head>
<body>

	 <!-- navigation -->
     <?php include("header.php"); ?>
<!-- navigation -->


	<div class="container-fluid wrapper">
		
	
		
		<!-- end of video player -->
		 
		 <!-- user based question -->
	<div class="container questions">
					
			
	<div class="form-group">

		<h3>End of Part 1</h3>
		<p>Click below button to enter Part 2</p>
		<button type="submit" name="part2">Go</button>
		
</div>
<!-- end of form group -->

<!-- pagination tabs. -->

  	



<!-- end of pagination tabs -->

</div>
<!-- end of container -->

</div>
<!-- end of whole div -->

<!-- footer -->
 <footer class="footer text-center">
      <div class="container">
        <span class="text-white">Copyright at 2023</span>
      </div>
    </footer>
<!-- footer -->



			
		 <!-- Bootstrap core JavaScript
    ================================================== -->
   
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- script to process click event handler -->
<script type="text/javascript" src="nextbutton.js"></script>



</body>
</html>