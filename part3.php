<?php
// checking if user is logged in using sessions.
// session_start();
// if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == "true") {
	
// }else{
// 	header("Location:index.php");
// 	exit();
// }
error_reporting(E_ALL);
ini_set('display_errors', 1);
require("classes/pagination.php");
$quest = new Questions();
$questionId = "";
$questionIds = [];
$options = [];


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
	<!-- <link rel="stylesheet" type="text/css" href="css/homepage.css"> -->
	<link rel="stylesheet" type="text/css" href="cover.css">


</head>
<body>

	 <!-- navigation -->
     <?php include("header.php"); ?>
<!-- navigation -->


	<div class="container-fluid wrapper">
		
		<!-- video player -->
		<div class="container uservideo">
			<video width="320" height="240" controls>
		  <source src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" type="video/mp4">
		  	Your browser does not support the video tag.
		</video>
		</div>
		
		<!-- end of video player -->
		 
		 <!-- user based question -->
	<div class="container questions">
					
			<h5>PART 3 QUESTIONS</h5>	
	<div class="form-group">

			<?php 

			
		
$data = $quest->getAllCategory3Info();
	

		foreach ($data as  $row) 
			{ 

			$questionId = $row["questionId"];

				// echo $questionId;
			$quest->displayOptions($questionId);
			// var_dump($options);
			$questionIds[] = $questionId;
			// var_dump($questionIds);

			?>

<p>Scenario:<?php echo wordwrap($row['scenario'],75, "<br>\n"); ?></p>
		<?php } ?>

			<!-- display options here -->
	<form method="post" action="">

			<?php

				foreach ($questionIds as $qid) {
    $options = $quest->displayOptions($qid);
    // var_dump($options);

    	// $index  = 0;
		foreach($options as $option){
			// echo $option['option_letter'];
	// $index= $index+1;

  echo '

	<div class="form-check">
  <input class="form-check-input"  type="radio" name="exampleRadios"  value="'.$option["option_letter"].'">
  <label class="form-check-label" for="exampleRadios">'.$option["option_text"].'
  </label>
</div>
';

}

}



?>

</form>
		
</div>
<!-- end of form group -->

<!-- pagination tabs. -->
	<nav aria-label="Page navigation example">
	<?php
		// displaying pagination links
	$page_first = $page > 1 ? 1: "";
	$page_prev = $page > 1 ? $page-1: "";
	$page_next = $page < $total_pages ? $page + 1 : "";
	$page_last  = $page < $total_pages ? $total_pages : '';

	 ?>
  <ul class="pagination justify-content-center" style="margin: 20px 0;">
  

	<button onClick="captureRadioValue('part3.php?page=<?php echo $page_next; ?>'
	,'<?php echo $questionId; ?>','<?php echo $page ?>','<?php echo $total_pages; ?>')" >Next</button>

  </ul>

</nav>
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
<script type="text/javascript" src="part3nextbutton.js"></script>



</body>
</html>