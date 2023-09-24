<?php
// session_start();
require("db.php");

	$dbh = DB();

if (isset($_POST["selectedValue"])) {

	$selectedValue = $_POST["selectedValue"];
	// $pageLetter = $_POST['pageLetter'];

	// grab the score based on selected value.
	
	
	
// insert selected radio and currentPageLetter into the database.
$sql = "INSERT INTO part1(alphabet,answer) VALUES(?,?)";
$stmt = $dbh->prepare($sql);
$stmt->execute([$pageLetter,$selectedValue]);
	
}else {
	echo "value not reaching server";
}


?>
