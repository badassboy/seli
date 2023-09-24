<?php
session_start();
require("db.php");

	
class Questions {

	public function displayQuestionText(){
		global $page,$total_pages;
		$dbh = DB();
	$sql = "SELECT * FROM questions WHERE categoryId=1";
		
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


	// get a subset of record098765432a`	 ;'
	// to be dislayed from the array
	$data = array_slice($data, $offset, $page_size);
	return $data;

	}


	// display question options
	public function displayOptions($questionId){

	$dbh = DB();
	$sql = "SELECT question_options.option_text, question_options.option_letter FROM
		question_options INNER JOIN questions ON 
		question_options.questionId=questions.questionId WHERE
		questions.questionId='$questionId'";

		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}

	public function getValueForSelectedRadio($selectedValue){

		
	}

	// display part 2 questions and scenario.
	public function displayQuestion2Text(){
		global $page,$total_pages;
		$dbh = DB();
	$sql = "SELECT * FROM questions WHERE categoryId=2";
		
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


	


	// display part 3 question and scenario.
	public function displayQuestion3Text(){
		global $page,$total_pages;
		$dbh = DB();
	$sql = "SELECT * FROM questions WHERE categoryId=3";
		
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

// insert userId,questionId and selectedValue into the answers table.
public function insertUserAnswer($userId,$questionId,$selectedValue){
		$dbh = DB();
$sql = "INSERT INTO answers(userId,questionId,selected_answer_letter) VALUES (?,?,?)";
$stmt = $dbh->prepare($sql);
return $stmt->execute([$userId,$questionId,$selectedValue]);

	}

	// grab user ID through session
	public function checkUserSession(){

	if (isset($_SESSION['id'])) {
		return $_SESSION['id'];
		
	}
}

	
//get the first 10 alphabets for second category 
public function getLettersForCategoryTwo()
{

	$dbh = DB();
$sql = "SELECT a.userId, a.questionId,a.selected_answer_letter, qo.option_value
FROM answers a
JOIN question_options qo
ON a.questionId=qo.questionId and a.selected_answer_letter=qo.option_letter
where a.userId = ".$this->checkUserSession()."
Order by qo.option_value desc
limit 3";

$stmt = $dbh->prepare($sql);
$stmt->execute();
return $stmt->fetchAll();

}


//get the second 15 alphabets for 3rd category 
public function getLettersForCategoryThree()
{

	$dbh = DB();
$sql = "SELECT a.userId, a.questionId,a.selected_answer_letter, qo.option_value
FROM answers a
JOIN question_options qo
ON a.questionId=qo.questionId and a.selected_answer_letter=qo.option_letter
where a.userId = ".$this->checkUserSession()."
Order by qo.option_value desc
limit 15 OFFSET 14";

$stmt = $dbh->prepare($sql);
$stmt->execute();
return $stmt->fetchAll();

}


	
	
	
}


?>