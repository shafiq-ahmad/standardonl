<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $layout;
$sel_row=array();




function validateAssignmentFields($tsk){
	if ($_POST["name"] != "" ){
		$fields=array();
		$fields['name'] = $_POST["name"];
		$fields['desc'] = $_POST["description"];
		$fields['amount'] = $_POST["amount"];
		$fields['package'] = $_POST["package"];
		$fields['details'] = $_POST["details"];
		if($tsk=='edit'){
			if (isset($_POST["id"])){
				$id = $_POST["id"];
				return updateAssignment($fields, $id);
			}
			return false;
		}else{
			return newAssignment($fields);
		}
		return false;
	}else{
		return false;
	}
}

function addAssignment(){
	global $message;
	global $link;
	if (validateAssignmentFields("add")){
		$message = '<span class="message">Assignment created successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Assignment create failed.</span>';
		Session::setMessages($message );
	}
}

function editAssignment(){
	global $message;
	global $link;
	if (validateAssignmentFields("edit")){
		$message = '<span class="message">Assignment changed successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Assignment change failed or no changes.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}

if (isset($_POST["add_assignment"])){
	addAssignment();
}
if (isset($_POST["edit_assignment"])){
	editAssignment();
}

if (isset($_POST["delete_assignment"])){
	global $message;
	global $link;
	$id=$_POST["id"];
	if (deleteAssignment($id)){
		$message = '<span class="message">Assignment deleted successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Assignment deletion failed.</span>';
		Session::setMessages($message );
		//redirect($link);
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
$x = count_all('clients');
$total_count = $x[0][0];
$pagination = new Pagination($page, $per_page, $total_count);
	
$rows = getAllAssignments($pagination->offset(), $per_page);
$packages_list = getPackageList();
	
if($task=='edit' || $task=='delete'){
	if(isset($id)&& $id>0){
		$sel_row = getAssignment($id);
	}else{$layout='default';}
}
if(isset($_GET['published'])){
	$publish=$_GET['published'];
	setPublish('assignments', $id, $publish);
}
if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
?>
