<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $layout;
$sel_row=array();


if(isset($_GET['ItemId'])){
	$id=$_GET['ItemId'];
}

function validateAssignmentFields($tsk){
	if ($_POST["amount"] != "" ){
		$fields=array();
		if (!empty($_POST["id"])){
			$fields['id'] = $_POST["id"];
		}else{return false;}
		$fields['user_id'] = $_POST["user_id"];
		$fields['amount'] = $_POST["amount"];
		$fields['note'] = $_POST["note"];
		if($tsk=='accept'){
				return acceptRequest($fields );
		}else{
			return rejectRequest($fields);
		}
		return false;
	}else{
		return false;
	}
}

function acceptAssignment(){
	global $message;
	global $link;
	if (validateAssignmentFields("accept")){
		$message = '<span class="message">Assignment accepted successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Assignment accept failed.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}

function rejectAssignment(){
	global $message;
	global $link;
	if (validateAssignmentFields("reject")){
		$message = '<span class="message">Assignment rejected successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Assignment reject failed.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}


if (isset($_POST["accept_assignment"])){
	acceptAssignment();
}
if (isset($_POST["reject_assignment"])){
	rejectAssignment();
}

$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
$per_page = 20;
$x = count_all('submit_assignments');
$total_count = $x[0][0];
$pagination = new Pagination($page, $per_page, $total_count);
	
$rows = getAllAssignments($pagination->offset(), $per_page);
	
$pending = getPendingAssignments();

if($task=='accept' || $task=='reject'){
	if(isset($id)&& $id>0){
		$sel_row = getAssignment($id);
	}else{$layout='default';}
}


if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
?>
