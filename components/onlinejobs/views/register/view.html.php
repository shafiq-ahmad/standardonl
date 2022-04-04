<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $user_id;
global $layout;
$sel_row=array();
$message_sent = false;



function validateUserFields($tsk){
	global $message;
	global $user;
	if ($_POST["name"] != "" && $_POST["login_name"] != "" && $_POST["email"] != "" && $_POST["password"] != ""  && $_POST["cnic"] != "" && $_POST["phone"] != ""  && $_POST["address"] != ""  ){
			$isValid = $user->validateUser($_POST["login_name"], $_POST["email"]);
			if ($isValid != ''){
				$message = "<span class=\"error\">{$isValid}</span>";
			}
			if(isset($_POST["agree"]) && $_POST['password'] == $_POST['confirm_password']){
			$fields=array();
			$fields['name'] = $_POST["name"];
			$fields['login_name'] = $_POST["login_name"];
			$fields['email'] = $_POST["email"];
			$fields['cnic'] = $_POST["cnic"];
			$fields['password'] = $_POST["password"];
			$fields['phone'] = $_POST["phone"];
			$fields['franchise'] = $_POST["franchise"];
			$fields['package'] = $_POST["package"];
			$fields['address'] = $_POST["address"];
			$fields['city'] = $_POST["city"];
			$fields['country'] = $_POST["country"];
			$fields['request'] = $_POST["request"];
			$fields['registration_status'] = 'pending';
			if($tsk=='add'){
				return registerUser($fields);
			}
		}
		return false;
	}else{
		return false;
	}
}

function addUser(){
	global $message;
	if (validateUserFields("add")){
		$message = '<span class="message">User Registered successfull. </span>';
		$message_sent = true;
		//header("Location: index.php?option=onlinejobs&view=register&task=regOk");
	}else{
		if ($message == ''){
		$message = '<span class="error">User Registration failed.</span>';
		}
		$message_sent = false;
	}
}


if (isset($_POST["register_user"])){
	addUser();
}

if($task=='register'){
	$layout='default_'.$task;
}
$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
$per_page = 20;
$x = count_all('clients');
$total_count = $x[0];
$pagination = new Pagination($page, $per_page, $total_count);
	
//$rows = getAllFranchises($pagination->offset(), $per_page);
	
$franchise_list = getFranchiseList();
		
$packages_list = getPackageList();
	
$country_list = getCountryList();
$clients_list = getClientsList();

if($task=='edit' || $task=='delete' || $task=='register'){
	if(isset($id)&& $id>0){
		$sel_row = getUsers($id);
	}else{$layout='default';}
}
if(isset($_GET['published'])){
	$publish=$_GET['published'];
	setPublish($id, $publish);
}
if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
?>
