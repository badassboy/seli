<?php
require("../db.php");
class Auth{

	public function hashedPassword($password){
		return password_hash($password, PASSWORD_BCRYPT);
	}

	public function registerAdmin($email,$password){
		$dbh = DB();
		$sql = "INSERT INTO admin(email,password) VALUES(?,?)";
		$stmt = $dbh->prepare($sql);
		$stmt->execute([$email, $this->hashedPassword()]);
		return $stmt->rowCount();

	}

	public function login($email,$password){
		$dbh = DB();
		$sql = "SELECT * FROM admin WHERE email=?";
		$stmt = $dbh->prepare($sql);
		$stmt->execute([$email]);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		return password_verify($password, $data['password']);





	}
}


?>