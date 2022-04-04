<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $task;
global $layout;
$sel_row=array();


function validatePackageFields($tsk){
	if ($_POST["title"] != "" ){ 
		$fields=array();
		$fields['title'] = $_POST["title"];
		$fields['image'] = $_POST["image"];
		$fields['description'] = $_POST["description"];
		$fields['duration'] = $_POST["duration"];
		$fields['published'] = $_POST["published"];
		if($tsk=='edit'){
			if (isset($_POST["id"])){
				$id = $_POST["id"];
				return updatePackage($fields, $id);
				echo $x.'hello';
			}
			//return false;
		}else{
			return newPackage($fields);
		}
		return false;
	}else{
		return false;
	}
}

function validatePackageDetailFields($tsk){
	if ($_POST["package_name"] != "" ){ 
		$fields=array();
		$fields['package_name'] = $_POST["package_name"];
		$fields['work'] = $_POST["work"];
		$fields['compilation'] = $_POST["compilation"];
		$fields['cost'] = $_POST["cost"];
		$fields['fee'] = $_POST["fee"];
		$fields['max_earning'] = $_POST["max_earning"];
		if($tsk=='edit'){
			if (isset($_POST["id"])){
				$id = $_POST["id"];
				return updatePackageDetail($fields, $id);
			}
			return false;
		}else{
			return newPackageDetail($fields);
		}
		return false;
	}else{
		return false;
	}
}

function addPackage(){
	global $message;
	global $link;
	if (validatePackageFields("add")){
		$message = '<span class="message">Package added successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Package add failed.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}

function addPackageDetail(){
	global $message;
	global $link;
	if (validatePackageDetailFields("add")){
		$message = '<span class="message">Package Detail added successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Package detail add failed.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}

function editPackage(){
	global $message;
	global $link;
	if (validatePackageFields("edit")){
		$message = '<span class="message">Package changed successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Package change failed or no changes.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}
function editPackageDetail(){
	global $message;
	global $link;
	if (validatePackageDetailFields("edit")){
		$message = '<span class="message">Package changed successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Package change failed or no changes.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}

if (isset($_POST["add_package"])){
	addPackage();
}
if (isset($_POST["add_packageDetail"])){
	addPackageDetail();
}
if (isset($_POST["edit_package"])){
	editPackage();
}elseif (isset($_POST["edit_packageDetail"])){
	editPackageDetail();
}

if (isset($_POST["delete_package"])){
	global $message;
	$id=$_POST["id"];
	if (deletePackage($id)){
		$message = '<span class="message">Package deleted successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Package deletion failed.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}

if($task=='edit' || $task=='delete' || $task=='add'){
	$layout='default_'.$task;
}

$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
$per_page = 20;
if ($task=='detail' || $task=='editDetail'){
	$x = count_all('packages_detail');
	$total_count = $x[0][0];
	$pagination = new Pagination($page, $per_page, $total_count);
	$rows = getPackageDetails($pagination->offset(), $per_page);
	if(isset($id)&& $id>0){
		$sel_row = getPackageDetail($id);
	}
}else{
	$x = count_all('packages');
	$total_count = $x[0][0];
	$pagination = new Pagination($page, $per_page, $total_count);
	$rows = getAllPackages($pagination->offset(), $per_page);
	if(isset($id)&& $id>0){
		$sel_row = getMainPackage($id);
	}
}

$packages = getPackages();

if(isset($_GET['published'])){
	$publish=$_GET['published'];
	setPublish("packages", $id, $publish);
}
if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
	
	
?>



