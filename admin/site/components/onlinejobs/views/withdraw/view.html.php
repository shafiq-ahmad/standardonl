<?php
defined('_MEXEC') or die ('Restricted Access');
//global $id;
global $layout;
$sel_row=array();

if(isset($_GET['ItemId'])){
	$id=$_GET['ItemId'];
}

function validateWithdrawFields($tsk){
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

function acceptWithdraw(){
	global $message;
	global $link;
	if (validateWithdrawFields("accept")){
		$message = '<span class="message">Withdraw accepted successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Withdraw failed.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}

function rejectWithdraw(){
	global $message;
	global $link;
	if (validateWithdrawFields("reject")){
		$message = '<span class="message">Withdraw rejected successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Reject failed.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}

if (isset($_POST["accept_withdraw"])){
	acceptWithdraw();
}
if (isset($_POST["reject_withdraw"])){
	rejectWithdraw();
}


$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
$per_page = 20;
$x = count_all('withdraw_requests');
$total_count = $x[0][0];
$pagination = new Pagination($page, $per_page, $total_count);
	
$pendingRows = getPendingWithdrawRequests();
	
$rows = getAllWithdrawRequests($pagination->offset(), $per_page);

if($task=='accept' || $task=='reject'){
	if(isset($id)&& $id>0){
		$sel_row = getRequest($id);
	}else{$layout='default';}
}

if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
?>
