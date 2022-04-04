<?php
defined('_MEXEC') or die ('Restricted Access');

$layout='';
$message='';

include_once "models/{$v_view}.php";



function validatePasswordFields(){
	if (isset($_POST["old_password"]) && isset($_POST["new_password"]) && isset($_POST["confirm_password"])){
		$old_pass = $_POST["old_password"];
		$new_pass = $_POST["new_password"];
		$confirm_pass = $_POST["confirm_password"];
	}else{
		return false;
	}
}


function display(){
	global $v_view;
	global $task;
	global $layout;
	require_once("views/" . $v_view . "/view.html.php");
}


?>
