<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $layout;
$sel_row=array();




function validateSettingFields($tsk){
	if ($_POST["email"] != "" && $_POST["password"] != "" ){
		$fields=array();
		$fields['email'] = $_POST["email"];
		$fields['password'] = $_POST["password"];
		$fields['min_withdraw'] = $_POST["min_withdraw"];

		return updateSettings($fields);
	}else{
		return false;
	}
}

function saveSettings(){
	global $message;
	global $link;
	if (validateSettingFields("edit")){
		$message = '<span class="message">Settings changed successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Settings change failed.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}

if (isset($_POST["save_settings"])){
	saveSettings();
}

$rows = getSettings();


if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
?>
