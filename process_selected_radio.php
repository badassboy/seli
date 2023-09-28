<?php
// session_start();
require("classes/pagination.php");
$quest = new Questions();
	
	// require(db.php);
	// $dbh = DB();
	$selectedValue ="";
	$userId = "";
	$questionId = "";

if (isset($_POST["selectedValue"]) && isset($_SESSION['id']) && isset($_POST['questionId'])) {

	// get selected option
$selectedValue = $_POST["selectedValue"];
$userId = $_SESSION['id'];
$questionId = $_POST['questionId'];

$quest->insertUserAnswer($userId,$questionId,$selectedValue);
}else {
	echo "No data received";
}




	


	
	
	



?>
