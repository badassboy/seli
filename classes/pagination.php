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
		// global $options;
	$dbh = DB();
	$sql = "SELECT question_options.option_text, question_options.option_letter FROM
		question_options INNER JOIN questions ON 
		question_options.questionId=questions.questionId WHERE
		questions.questionId='$questionId'";

		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}

	


	public function getCategory2Questions(){
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
	public function getCategory3Questions(){
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

	try{
		$dbh = DB();
$sql = "INSERT INTO answers(userId,questionId,selected_answer_letter) VALUES (?,?,?)";
$stmt = $dbh->prepare($sql);
return $stmt->execute([$userId,$questionId,$selectedValue]);

	}catch(PDOException $ex){
		echo "Error: " .$ex->getMessage();

	}

		

	}

	// grab user ID through session
	public function checkUserSession(){
		try{

			if (isset($_SESSION['id'])) {
		return $_SESSION['id'];
		
	}else{
	throw new Exception("User session doesn't exist");
	}

		}catch(PDOException $ex){
			echo 'Error: ' .$ex->getMessage();
		}

		// end session when done
		session_write_close();
	
}

	
//get the first 10 alphabets for second category 
public function getLettersForCategoryTwo()
{

	$dbh = DB();
	$sql = "SELECT q.question_letter
FROM answers a
JOIN question_options qo
ON a.questionId=qo.questionId and a.selected_answer_letter=qo.option_letter
JOIN questions q ON q.questionId=qo.questionId
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
limit 4 OFFSET 3";

$stmt = $dbh->prepare($sql);
$stmt->execute();
return $stmt->fetchAll();

}

public function assignAlphabet($items, $alphabets){
	try{

		// Calculate the number of rows each alphabet should have
    $rowsPerAlphabet = floor(count($items) / count($alphabets));

    // Create an array with repeated alphabets to achieve the desired distribution
    $assignedAlphabets = array();
    foreach ($alphabets as $alphabet) {
        $assignedAlphabets = array_merge($assignedAlphabets, array_fill(0, $rowsPerAlphabet, $alphabet));
    }

    // Shuffle the array of assigned alphabets to ensure randomness
    shuffle($assignedAlphabets);

    // var_dump($items);
    
    for ($i = 1; $i < count($items); $i++) {
    $items[$i]["question_letter"] = $assignedAlphabets[$i];
        // print_r($items[$i]);

    }

	}catch(DivisionByZeroError $e){
		// echo $e->getMessage();
	}
	



    // Return the items array with alphabets assigned
    return $items;
}


public function plotUserDataGraph()
{
	$dbh = DB();
	$sql = "SELECT a.selected_answer_letter, sum(qo.option_value) option_value
FROM answers a
JOIN question_options qo
ON a.questionId=qo.questionId and a.selected_answer_letter=qo.option_letter
JOIN questions q ON q.questionId=qo.questionId
where a.userId = ".$this->checkUserSession()."
Group by a.selected_answer_letter";

	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();


}


	
	
	
}


?>