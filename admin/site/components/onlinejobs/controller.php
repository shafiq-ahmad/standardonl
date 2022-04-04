<?php
defined('_MEXEC') or die ('Restricted Access');

$message='';

//if (file_exists("models/{$v_view}.php")) {
	include_once "models/{$v_view}.php";
//}

function store(){

}
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
		echo $_SESSION['username'].'sssssssssssssssssss';
	global $message;
	if (validatePasswordFields()){
		$message = '<span class="message">Password changed successfuly.</span>';
	}else{
		$message = '<span class="error">Password change failed.</span>';
	}
}

function display(){
	global $v_view;
	global $task;
	global $layout;
	if($v_view == 'user'){
		$layout='changePassword';
	}
	if (isset($_POST["change_password"])){
		$layout='changePassword';
		updatePassword();
	}


	require_once("views/" . $v_view . "/view.html.php");
}


?>
