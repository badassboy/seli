<?php
require("db.php");

	
class Questions {

	public function displayQuestionText(){
		global $page,$total_pages;
		$dbh = DB();
	$sql = "SELECT * FROM questions";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	// then page to display
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
	return $data;

	}


	// display question options
	public function displayOptions($questionId){
		$dbh = DB();
	$sql = "SELECT question_options.answer_text FROM
		question_options INNER JOIN questions ON 
		question_options.questionId=questions.questionId WHERE
		questions.questionId='$questionId'";

		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}

	public function getValueForSelectedRadio($selectedValue){
		
	}

	
}


?>