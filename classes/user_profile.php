<?php

require("db.php");

class UserProfile {

	public function fetch_user_detail($user_id){
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM users");
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);

	}

	public function checkOldPassword($password)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM users");
		$stmt->execute();
		$data =  $stmt->fetch(PDO::FETCH_ASSOC);
		return password_verify($password, $data['password']);

	}

	public function verify_new_password($password,$confirm_password){
		if ($password === $confirm_password) {
			return true;
		}else{
			return false;
		}
	}

	public function change_password($user_id,$password){
		$dbh = DB();
		// check for old password existence in the database
		if ($this->checkOldPassword() && $this->verify_new_password()) {
			// update user's password
			$sql = "UPDATE users SET password=? WHERE id=?";
			$stmt = $dbh->prepare($sql);
			return $stmt->execute([$password,$user_id]);
		}


	}


	public function change_email($user_id,$email){
		$dbh = DB();
		$sql = "UPDATE users SET email=? WHERE id=?";
		$stmt = $dbh->prepare($sql);
		return $stmt->execute([$email,$user_id]);


	}
}

?>