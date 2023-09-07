<?php
session_start();
require("../db.php");
class Auth{

	public function hashedPassword($password){
		return password_hash($password, PASSWORD_DEFAULT);
	}

public function registerAdmin($email,$password){
	$dbh = DB();
	$sql = "INSERT INTO admin(email,password) VALUES(?,?)";
	$stmt = $dbh->prepare($sql);
	$stmt->execute([$email, $this->hashedPassword($password)]);
	return $stmt->rowCount();

}

	public function login($email,$password){
		$dbh = DB();
		$sql = "SELECT id,email,password FROM admin WHERE email = ?";
		$stmt = $dbh->prepare($sql);
		$stmt->execute([$email]);
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
		foreach ($data as $row) {
			$user_password = $row["password"];
			 if(password_verify($password, $user_password)){
			 	$_SESSION['id'] = $row['id'];
				return $_SESSION['id'];
			 }else{
			 	return false;
			 }
				
			// echo $user_password;
		}
		


	}
}


?>