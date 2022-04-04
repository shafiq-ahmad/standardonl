<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $layout;
$sel_row=array();
$user_id=$_SESSION['user_id'];

function validateTransferFields($tsk){
	$user_id=$_SESSION['user_id'];
	if ($_POST["accountno"] != "" && $_POST["amount"] != "" ){
		$fields=array();
		//$fields['to'] = $_POST["to"];
		$to = $_POST["accountno"];
		$amount = $_POST["amount"];
		$criteria = $_POST["criteria"];
		$note = $_POST["note"];
		if(transferAccount($user_id, $to, $amount, 'Site-Admin', '', 'Internal Trasfer', $criteria, $note)){
			return true;
		}
		return false;
	}else{
		return false;
	}
}

function addTransfer(){
	global $message;
	global $link;
	if (validateTransferFields("add")){
		$message = '<span class="message">Transfer successfull.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Transfer failed.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}

if (isset($_POST["add_transfer"])){
	addTransfer();
}

if($task=='edit' || $task=='delete'){
	$layout='default_'.$task;
}

$accounts = getAllAccounts();


if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
?>
