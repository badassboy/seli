<?php 

require("classes/auth.php");
$auth = new Auth();

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $email = $_GET['email'];
    $activation_code = $_GET['activation_code'];

    // find unverified user based on the email and activation code.
    $user = $auth->find_unverified_user($activation_code, $email);
    // activat the user account
    if ($user && $auth->activate_user($user['id'])) {
    	// redirect to login page after successful activation.
	$msg = '<div class="alert alert-success" role="alert">Email confirmed successful</div>';
	sleep(3);

	header("Location:login.php");
	exit;

    
    }else {

    	$msg = '<div class="alert alert-success" role="alert">User account not found</div>';
    	sleep(3);
    	header("Location:register.php");
    	exit;

    }

}


?>