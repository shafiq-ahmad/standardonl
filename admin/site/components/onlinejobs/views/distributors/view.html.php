<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $task;
global $layout;
$sel_row=array();



function validateDistributorFields($tsk){
	if ($_POST["user_name"] != "" ){
		$fields=array();
		$fields['user_name'] = $_POST["user_name"];
		$fields['full_name'] = $_POST["full_name"];
		$fields['phone'] = $_POST["phone"];
		$fields['cell'] = $_POST["cell"];
		$fields['email'] = $_POST["email"];
		$fields['website'] = $_POST["website"];
		$fields['zipcode'] = $_POST["zipcode"];
		$fields['address'] = $_POST["address"];
		$fields['city'] = $_POST["city"];
		$fields['country'] = $_POST["country"];
		$fields['published'] = 1;
		if($tsk=='edit'){
			if (isset($_POST["id"])){
				$id = $_POST["id"];
				return updateDistributor($fields, $id);
			}
			return false;
		}else{
			return newDistributor($fields);
		}
		return false;
	}else{
		return false;
	}
}

function addDistributor(){
	global $message;
	global $link;
	if (validateDistributorFields("add")){
		$message = '<span class="message">Distributor added successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Distributor add failed.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}

function editDistributor(){
	global $link;
	if (validateDistributorFields("edit")){
		//save();
		$message = '<span class="message">Distributor changed successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
		
	}else{
		$message = '<span class="error">Distributor change failed or no changes.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}

if (isset($_POST["add_distributor"])){
	addDistributor();
}
if (isset($_POST["edit_distributor"])){
	editDistributor();
}

if (isset($_POST["delete_distributor"])){
	global $message;
	$id=$_POST["id"];
	if (deleteUser($id)){
		//redirect("index.php?option=onlinejobs&view=franchises");
	}
}

if($task=='edit' || $task=='delete'){
	$layout='default_'.$task;
}
$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}

$per_page = 20;
$x = count_all('distributors');
$total_count = $x[0][0];
$pagination = new Pagination($page, $per_page, $total_count);
	
$rows = getAllDistributors($pagination->offset(), $per_page);
$country_list = getCountryList();

if($task=='edit' || $task=='delete'){
	if(isset($id)&& $id>0){
		$sel_row = getDistributor($id);
	}else{$layout='default';}
}
if(isset($_GET['published'])){
	$publish=$_GET['published'];
	setPublish("users", $id, $publish, "distributors");
}
if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
?>
