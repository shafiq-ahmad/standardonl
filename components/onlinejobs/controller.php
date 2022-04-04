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
		//echo "Password Changed {$old_pass}, {$new_pass}, {$confirm_pass}";
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

function validateFranchiseFields($tsk){
	if ($_POST["name"] != "" ){//&& $_POST["address"] != "" && $_POST["city"] != "" && $_POST["country"] != "" && $_POST["published"] != "" ){
		$fields=array();
		$fields['name'] = $_POST["name"];
		$fields['phone'] = $_POST["phone"];
		$fields['cell'] = $_POST["cell"];
		$fields['email'] = $_POST["email"];
		$fields['website'] = $_POST["website"];
		$fields['zipcode'] = $_POST["zipcode"];
		$fields['address'] = $_POST["address"];
		$fields['city'] = $_POST["city"];
		$fields['country'] = $_POST["country"];
		$fields['published'] = $_POST["published"];
		if($tsk=='edit'){
			if (isset($_POST["id"])){
				$id = $_POST["id"];
				return updateFranchise($fields, $id);
			}
			return false;
		}else{
			return newFranchise($fields);
		}
		return false;
	}else{
		return false;
	}
}

function updatePassword(){
	global $message;
	if (validatePasswordFields()){
		//save();
		$message = '<span class="message">Password changed successfuly.</span>';
	}else{
		$message = '<span class="error">Password change failed.</span>';
		//exit;
	}
}


function display(){
	global $v_view;
	global $task;
	global $layout;
	if($v_view=='franchises'){
		if($task != ''){
			$layout='default_' . $task;
		}else{
			$layout='default';
		}
	}elseif($v_view == 'user'){
		$layout='changePassword';
	}
	if (isset($_POST["change_password"])){
		$layout='changePassword';
		updatePassword();
	}
	if (isset($_POST["add_franchise"])){
		addFranchise();
	}
	if (isset($_POST["edit_franchise"])){
		editFranchise();
	}

	if (isset($_POST["delete_franchise"])){
		global $message;
		$id=$_POST["id"];
		if (deleteFranchise($id)){
			//save();
			$message = '<span class="message">Franchise deleted successfuly.</span>';
		}else{
			$message = '<span class="error">Franchise deletion failed.</span>';
			//exit;
		}
	}

	require_once("views/" . $v_view . "/view.html.php");
}


?>
