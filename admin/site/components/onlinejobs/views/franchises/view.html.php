<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $layout;
$sel_row=array();




function validateFranchiseFields($tsk){
	if ($_POST["user_name"] != "" && $_POST["franchise"] != ""  && $_POST["email"] != "" ){
		$fields=array();
		$fields['user_name'] = $_POST["user_name"];
		$fields['full_name'] = $_POST["full_name"];
		$fields['type'] = $_POST["type"];
		$fields['franchise'] = $_POST["franchise"];
		$fields['phone'] = $_POST["phone"];
		$fields['cell'] = $_POST["cell"];
		$fields['email'] = $_POST["email"];
		$fields['website'] = $_POST["website"];
		$fields['zipcode'] = $_POST["zipcode"];
		$fields['address'] = $_POST["address"];
		$fields['city'] = $_POST["city"];
		$fields['country'] = $_POST["country"];
		$fields['published'] = $_POST["published"];
		if (isset($_POST["fid"])){
			$fields['fid'] = $_POST["fid"];
		}
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


function addFranchise(){
	global $message;
	global $link;
	if (validateFranchiseFields("add")){
		$message = '<span class="message">Franchise added successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Franchise add failed.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}

function editFranchise(){
	global $message;
	global $link;
	if (validateFranchiseFields("edit")){
		$message = '<span class="message">Franchise changed successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Franchise change failed or No changes applied.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
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
	if (deleteUser($id)){
		//redirect($link);
	}
}
$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
$per_page = 20;
$x = count_all('franchises');
$total_count = $x[0][0];
$pagination = new Pagination($page, $per_page, $total_count);
	
$rows = getAllFranchises($pagination->offset(), $per_page);

$country_list = getCountryList();


if($task=='edit' || $task=='delete'){
	if(isset($id)&& $id>0){
		$sel_row = getFranchise($id);
	}
}
if(isset($_GET['published'])){
	$publish=$_GET['published'];
	setPublish("users", $id, $publish,"franchises");
}
if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
if(isset($_POST)){unset($_POST);}
?>
