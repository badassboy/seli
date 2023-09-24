<?php
// session_start();
require("classes/pagination.php");
$quest = new Questions();

$test = $quest->getLettersForCategoryTwo();
foreach ($test as $row) {
	if (array_key_exists("questionId", $test)) {
		echo $row['questionId'];
	}else {
		echo "key  not found";
	}
}
// pseudocode.
// get the array key
// convert the key string to an array
// update the question_lettter column with the array variables according to the categoryId.













?>