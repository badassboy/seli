<?php

require("db.php");

class UserProfile {

	public function fetch_user_detail($user_id){
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM users");
		$stmt->execute();
		return $stmt->fetchAll();

	}

// 	public function checkOldPassword($user_id,$newPassword,$confirm_password)
// 	{
		
// 		$data = $this->fetch_user_detail($user_id);
// return password_verify($newPassword, $data['password']) && $this->verify_new_password($newPassword,$confirm_password);

// 	}


	public function verify_new_password($newPassword,$confirm_password){
		if ($newPassword === $confirm_password) {
			return true;
		}else{
			return false;
		}
	}

	public function change_password($user_id,$newPassword,$confirm_password){
		try{

			$dbh = DB();
// check if password matches
if ($this->verify_new_password($newPassword,$confirm_password)){
	// hash the new password before storing it inside the database.
	$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
	// update user's password
	$sql = "UPDATE users SET password=? WHERE userId=?";
	$stmt = $dbh->prepare($sql);
	if ($stmt === false) {
		//handle the case where the SQL statement preparation failed
		return false;
	}
	$result = $stmt->execute([$hashedPassword,$user_id]);
	if ($result) {
		return true;
	}else {
		return false;
	}



}else {
	return false;
}

}catch(Exception $e){
	error_log("Error in chanfing password:". $e->getMessage());
	return false;
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