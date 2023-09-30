<?php
// session_start();
require("classes/pagination.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (!$_SESSION["id"]) {
    header("Location:index.php");
    exit();
}



$quest = new Questions();
$questionId = "";
$alphabet = "";
$question_letter = "";



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
					
			<h5>PART 1 QUESTIONS</h5>	
	<div class="form-group">
		<?php 
		$data = $quest->displayQuestionText();
		foreach ($data as  $row) 
			{ 
				// var_dump($data);
				$questionId = $row["questionId"];
				$question_letter = $row['question_letter'];
				// echo $question_letter
				// echo $questionId;
				
			?>

		
	<p class="scenario">Scenario:<?php echo $row['scenario']; ?></p>
		<?php } ?>
		<!-- end of displaying questions here -->

		<!-- display option here -->

		<?php 
		$options = $quest->displayOptions($questionId);
		
		?>
		
		<form method="post" action="">
			<?php
		$index  = 0;
		foreach($options as $option){
			$alphabet = $option['option_letter'];
			// echo $alphabet;
			$index= $index+1;
		?>

	
<div class="form-check">
  <input class="form-check-input"  type="radio" name="exampleRadios"  value="<?php echo $alphabet; ?>">
  <label class="form-check-label" for="exampleRadios<?php echo $index?>">
    <?php echo $option["option_text"]; ?>
  

  </label>
</div>

<?php }?>
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
  

	<button onClick="captureRadioValue('homepage.php?page=<?php echo $page_next; ?>'
	,'<?php echo $questionId; ?>','<?php echo $question_letter; ?>','<?php echo $page; ?>','<?php echo $total_pages; ?>')" >Next</button>

  </ul>

</nav>
<!-- end of pagination tabs -->

</div>
<!-- end of container -->

</div>
<!-- end of whole div -->

<!-- footer -->
 <footer class="footer text-center ">
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