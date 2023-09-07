<?php

include("../db.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM users");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
	$user_id = $result['id'];
	$fullname = $result['fullName'];
	$email = $result['email'];
	$my_date = $result['register_date'];
	$paid = $result['paid'];

	$json[] = array(
		"user_id" => $user_id,
		"fullname" => $fullname,
		"email" => $email,
		"admin_date" => $my_date,
		"paid" => $paid
		);
}

// Echoinh array in json format
echo json_encode($json);


?>