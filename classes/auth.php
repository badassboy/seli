<?php
session_start();
require("db.php");

class Auth {

public function check_existing_user($email){

		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM users WHERE email = ?");
		$stmt->execute([$email]);
		return $stmt->fetch(PDO::FETCH_ASSOC);

}



public function RegisterUser($fullName,$email,$city,$phone,$gender,$password,$activation_code){
		
		$dbh = DB();
		
		$join_date = date("m.d.y");
		$user =$this->check_existing_user($email);
		if ($user >  0) {
			return false;
		}else {


		$hashed = password_hash($password,PASSWORD_DEFAULT);
		$stmt = $dbh->prepare("INSERT INTO users(fullName,email,city,phone,gender,
			password,register_date,activation_code) VALUES(?,?,?,?,?,?,?,?)");
		$stmt->execute([$fullName,$email,$city,$phone,$gender,$hashed,$join_date,
			password_hash($activation_code, PASSWORD_DEFAULT)]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return $dbh->errorInfo();
		}
			
		}
	}

	// get verified users from the database
	public function find_user_by_email($email)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM users WHERE email = ?");
		$stmt->execute([$email]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	// checks if a user is verified
	// public function is_user_verified($user)
	// {
	// 	return (int)$user['status'] === 1;
	// }

	// tthis function logs user in.
	public function login_user($email,$password)
	{

		$dbh = DB();
		$stmt = $dbh->prepare("SELECT userId,email,password,paid FROM users WHERE email = ?");

		$stmt->execute([$email]);
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($data as $row) {
			// var_dump($data);
			$user_password = $row["password"];
 if(password_verify($password, $user_password) &&
	$row['paid'] == 1){
			 	$_SESSION['id'] = $row['userId'];
				return $_SESSION['id'];
			 }else{
			 	return false;
			 }
				
			// echo $user_password;
		}
		
			
		

	}

	// find unverified users.
	public function find_unverified_user(string $activation_code, string $email)
	{	
		$dbh = DB();
		$sql = "SELECT id, activation_code FROM users WHERE status = 0 AND email=:email";
		$stmt = $dbh->prepare($sql);
		$stmt->execute([$email]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		// verify the activation code
		if (password_verify($activation_code, $user['activation_code'])) {
			return $user;
		}
		return null;


	}

	public function activate_user(int $user_id):bool
	{
		$dbh = DB();
		$sql = "UPDATE users SET status = 1 WHERE id=:id";
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(':id', $user_id, PDO::PARAM_INT);
		return $stmt->execute();
	}

	// verify users email
	public function send_activation_email(String $email, String $activation_code):bool
	{
		//activation link
		$activation_link = "activation.php?email=$email&activation_code=$activation_code";

		// set email body
		$to = $email;
		$subject = "Please activate your account";
		$message = "Click <a href='.$activation_link.'>here</a> to activate your acccount";

		// additional headers
		$headers = "From: info@selimodel.com\r\n";
$headers .= "Reply-To: no-reply@example.com\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
		

		// $headers[] = 'MIME-Version: 1.0';
		// $headers[] = 'Content-type: text/html; charset=iso-8859-1';

		return mail($to, $subject, $message, $headers);

		
	}

	public function generate_activation_code():string
	{
		return bin2hex(random_bytes(16));
	}

	public function insert_token($email,$token)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("INSERT INTO password_reset(email,token) VALUES(?,?)");
		$stmt->execute([$email,$token]);
		return $stmt->rowCount();

	}

	public function sendUserEmail($to,$subject,$msg)
	{
		 	$headers[] = 'MIME-Version: 1.0';
		   	$headers[] = 'Content-type: text/html; charset=iso-8859-1';

		return mail($to, $subject, $message, implode("\r\n", $headers));
	}



	// send password reset link to users email.
	public function sendUserLink($email){
			$dbh = DB();

			// validate email
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				return false;
			}else {

				try{
					// checking if user email already exist in the  system
					$user_detail = $this->check_existing_user($email);
					foreach ($user_detail as $row) {
						
						$email = $row['email'];
						$password = password_hash($row['password'], PASSWORD_DEFAULT);

							// generate a unique random token of length 100
						$token = $this->generate_activation_code();
						$count = $this->insert_token($email,$token);

						if ($count>0) {
							
				

			   $email_sent = $this->sendUserEmail($email, "Reset your password on xsoftgh",

			   	"Click <a href='www.xsoftgh.com/booking/admin_new_password.php?token=$token' >here</a> to reset your password", implode("\r\n", $headers));

							   if ($email_sent) {
							   		// return true;
							   		header('Location: admin_new_password.php?email=' . $email);
							   }else {
							   	return false;
							   }
						}


					}
				
				// end of foreach loop

				}catch(ErrorException $ex){
					echo "Message: ". $ex->getMessage();
				}
			}
			// end of else
		}



		// update users password
		public function newUserPassword($password){
			$dbh = DB();
			$token = "";
			if (isset($_GET['token'])) {
				$token = $_GET['token'];

				$stmt = $dbh->prepare("SELECT email FROM password_reset WHERE token = ?");
				$stmt->execute([$token]);
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$email = $row['email'];

					if ($email) {
						$new_password = password_hash($password, PASSWORD_DEFAULT);
						$stmt = $dbh->prepare("UPDATE users SET password = ? WHERE email = ?");
						$stmt->execute([$new_password,$email]);
						$row = $stmt->rowCount();
						if ($row>0) {
							return true;
						}else {
							return false;
						}

					}
				}

			}
		}	


	


}
?>