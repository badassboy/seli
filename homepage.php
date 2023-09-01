<?php
	require("db.php");

	$dbh = DB();

		// 1.get all questions from database
		// 2.store questions in an array
		// 3. loop through the questions the array and paginate the results.

	

	$sql = "SELECT * FROM questions";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


// the page to display
	 $page = isset($_GET['page']) ? $_GET['page'] : 1;
	// the number of records to display per page
	$page_size = 1;

	// calculate total number of records and total number of page
	$total_records = count($data);
	$total_pages = ceil($total_records / $page_size);

	// validation: Page to display cannot be greater than the total number of pages
	if ($page > $total_pages) {
		$page = $total_pages;
	}

	// validation: Page to display cannot be less than 1
	if ($page < 1) {
		$page = 1;
	}

	// calculate the position of the first record of the page to display
	$offset = ($page - 1) *$page_size;


	// get a subset of records to be dislayed from the array
	$data = array_slice($data, $offset, $page_size);
	// echo gettype($data);
	// var_dump($data);
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
        <a class="nav-link" href="login.php">Logout</a>
      </li>

      
     
    </ul>
   
  </div>
</nav>

<!-- navigation -->


	<div class="container-fluid wrapper">
		
		<!-- video player -->
		<video width="320" height="240" controls>
		  <source src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" type="video/mp4">
		  	Your browser does not support the video tag.
		</video>
		<!-- end of video player -->
		 
		 
		
			
				<!-- user based question -->
	<div class="container questions">
					
			<h5>PART 1 QUESTIONS</h5>	
	<div class="form-group">
		<?php foreach ($data as  $row) 
			{ 
				$scenario = $row['scenario'];
				echo $scenario;
				
			?>

		
	<p class="scenario">Scenario:<?php echo $row['scenario']; ?></p>
<div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
  <label class="form-check-label" for="exampleRadios1">
    <?php echo $row['ans1']; ?>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
  <label class="form-check-label" for="exampleRadios2">
   <?php echo $row['ans2']; ?>
  </label>
</div>
<div class="form-check disabled">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
  <label class="form-check-label" for="exampleRadios3">
   <?php echo $row['ans3']; ?>
  </label>
</div>

<?php } ?>

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
  	<a href="homepage.php?page=<?php echo $page_first; ?>">« First</a>
<a href="homepage.php?page=<?php echo $page_prev; ?>">Prev</a>
<a href="homepage.php?page=<?php echo $page_next; ?>">Next</a>
<a href="homepage.php?page=<?php echo $page_last; ?>">Last »</a>
    <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    
    <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
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

			
		



</body>
</html>