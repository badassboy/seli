<?php


if (isset($_POST['part2'])) {
	
	// navigate to part 2.
	header("Location:graph.php");
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
					
					<form method="post">

						<div class="form-group">

		<h3>End of Part 3</h3>
		<p>Click below button to access your score</p>
		<button type="submit" name="part2">Go</button>
		
</div>
						
					</form>
			
	
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
<!-- <script type="text/javascript" src="nextbutton.js"></script> -->



</body>
</html>