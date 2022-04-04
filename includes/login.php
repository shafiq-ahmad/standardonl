<?php
defined('_MEXEC') or die ('Restricted Access');

$message="";

if (isset($task)){
	if ($task == 'logout'){
		$session->logout();
		redirect("index.php");
	}
}

  if (isset($_POST["login"])){
 if($_POST['login']){

 	//get data
 	$username = trim(strtolower($_POST['username']));
	$password = trim($_POST['password']);
	//$remember = $_POST['remember'];
	
	
	//validate
	if(!$username){
		$message = '<span class="message">Username cannot be left blank.</span>';
		Session::setMessages($message );
	}
	
	if(!$password){
		$message = '<span class="message">Password cannot be left blank.</span>';
		Session::setMessages($message );
	}
	
	if(!$message){
	 //validate from db
		$found_user = $user->authenticate_client($username, $password);
		if ($found_user) {
			$session->login($found_user, 'client');
			redirect("index.php");
		} else {
			$message = '<span class="error">Username / Passwrod Invalid.</span>';
			Session::setMessages($message );
		}
	
	}
			
} //end of post
}


?>
 