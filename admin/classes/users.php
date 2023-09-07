<?php

require("../db.php");

class Users{

public function updatePaymentStatus($user_id){
$dbh = DB();
$sql = "UPDATE users SET paid = 1 WHERE id = ?";
	$stmt = $dbh->prepare($sql);
	$stmt->execute([$user_id]);
	return $stmt->rowCount();
}

}


?>