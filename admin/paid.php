<?php
require("classes/users.php");
$user = new Users();

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$paid = $user->updatePaymentStatus($id);
}


?>