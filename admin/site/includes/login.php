<?php
defined('_MEXEC') or die ('Restricted Access');

  $msg="";
 
	
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
	   $msg ="<li>Username cannot be left blank.</li>";
	}
	
	if(!$password){
	   $msg .="<li>Password cannot be left blank.</li>";
	}
	
	if(!$msg){
	 //validate from db
		$found_user = $user->authenticate($username, $password);
		if ($found_user) {
			$session->login($found_user, 'site');
			redirect("index.php");
		} else {
			$msg = "<li>Username / Passwrod Invalid</li>";	
		}
	
	}
			
} //end of post
}


if ($msg != ""){
	$message = '<div id="system-message-container">';
	$message .= '<dl id="system-message">';
	$message .= '<dt class="error">Error</dt>';
	$message .= '<dd class="error message"><ul>';
	$message .= $msg;
	$message .= '</ul></dd></dl></div>';
}else{
	$message='';
}


?>
 