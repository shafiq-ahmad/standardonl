<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $user_id;
global $franchise_id;
global $layout;
$message='';
$sel_row=array();

if(isset($task) && $task != ''){
	$layout='default_'.$task;
}else{
	$layout='default';
}

function validateWithdrawFundFields($tsk){
	$settings = getSettings(); 
	$limit = $settings[0]['min_withdraw'];
	$user_id = $_SESSION['user_id'];
	$account = getAccountByUserId($user_id);
	if ($account){
		$balance = $account[0]['balance'];
	}
	//echo $_POST["amount"] .'-'. $limit . ' - '. $balance ;
	if ($_POST["amount"] != "" ){
		$fields=array();
		$fields['amount'] = $_POST["amount"];
		$fields['user_id'] = $user_id;
		$fields['note'] = $_POST["note"];
		if($tsk=='requestAmount'){
			if($_POST["amount"] < $limit || $balance < $_POST["amount"] ){
				$message = '<span class="error">Amount Request is less then (Min withdraw Limit).</span>';
				Session::setMessages($message );
				return false;
			}
		
			if (isset($user_id)){
				$id = $user_id;
				return submitAmountRequest($fields);
			}
		}
	}
	return false;
}

function validateVoucherFields($tsk){
	$user_id = $_SESSION['user_id'];
	if ($_POST["voucher"] != "" ){
		$fields=array();
		$fields['voucher'] = $_POST["voucher"];
		$fields['user_id'] = $user_id;
		if($tsk=='requestAmount'){

		
		}
	}
	return false;
}


function requestAmount(){
	global $message;
	global $link;
	$link .= '&task=withdraw';

	if (validateWithdrawFundFields("requestAmount")){
		$message = '<span class="message">Amount Requested successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		if (empty($message)){
			$message = '<span class="error">Amount Request failed.</span>';
			Session::setMessages($message );
			//redirect($link);
		}
	}
}

function voucherStatus(){
	global $message;
	global $link;

	if (validateVoucherFields("check")){
		$message = '<span class="message">Amount Requested successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		if (empty($message)){
			$message = '<span class="error">Amount Request failed.</span>';
			Session::setMessages($message );
			//redirect($link);
		}
	}
}

if (isset($_POST['request_amount'])){
	requestAmount();
}

if (isset($_POST['voucher_status'])){
	$user_id = $_SESSION['user_id'];
	if ($_POST["voucher"] != "" ){
		$voucher = $_POST["voucher"];
		$sel_row = getVoucher($voucher, $user_id);
	}
}

if (isset($_POST['process_voucher'])){
	global $message;
	$user_id = $_SESSION['user_id'];
	if ($_POST["voucher"] != "" ){
		$voucher = $_POST["voucher"];
		$sel_row = processVoucher($voucher, $user_id);
		if($sel_row){
			$message = '<span class="message">';
			$message .= "Voucher Paid successfuly <br />To: {$sel_row[0]['login_name']} <br />By: {$sel_row[0]['paid_by_login']}";
			$message .= '</span>';
			Session::setMessages($message );
			//redirect($link);
		}else{
			$message = '<span class="erro">Operation failed.</span>';
			Session::setMessages($message );
			//redirect($link);
		}
	}
}


$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
$per_page = 20;
$x = count_all('clients');
$total_count = $x[0];
$pagination = new Pagination($page, $per_page, $total_count);

$row = getUser($id);
$vouchers = getVouchers($user_id);
//echo $user_id;
if ($task=='statistics'){
	if($id>0){$aRegister=$id;}else{$aRegister=$user_id;}
	if($aRegister!=0){
		$rows = getAccountRegister($aRegister, $pagination->offset(), $per_page);
	}	
}	
if(isset($_GET['published'])){
	$publish=$_GET['published'];
	setPublish($id, $publish);
}

if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");;
}
?>
