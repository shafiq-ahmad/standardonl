<?php
defined('_MEXEC') or die ('Restricted Access');

include_once "models". DS."change_password.php";
//if (file_exists("models/{$v_view}.php")) {
	include_once "models/{$v_view}.php";
//}

 $msg="";
 

function validatePasswordFields(){
	if (isset($_POST["old_password"]) && isset($_POST["new_password"]) && isset($_POST["confirm_password"])){
		$old_pass = $_POST["old_password"];
		$new_pass = $_POST["new_password"];
		$confirm_pass = $_POST["confirm_password"];
		if ($old_pass != "" && $new_pass != "" && $confirm_pass != ""){
			if($new_pass == $confirm_pass){
				if(save($old_pass, $new_pass)){
					return true;
				}
			}
		}
		return false;
	}else{
		return false;
	}
}

function updatePassword(){
	global $message;
	if (validatePasswordFields()){
		$message = '<span class="message">Password changed successfuly.</span>';
	}else{
		$message = '<span class="error">Password change failed.</span>';
	}
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

function display(){
	global $v_view;
	global $task;
	global $layout;
	if($v_view == 'user'){
		//$layout='changePassword';
	}
	if (isset($_POST["change_password"])){
		updatePassword();
	}
	require_once( "views" . DS . $v_view . DS . "view.html.php");
}


?>

