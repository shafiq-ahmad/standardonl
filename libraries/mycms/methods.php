<?php
defined('_MEXEC') or die ('Restricted Access');

function toggleState($state){
	if($state==1){
		return 0;
	}else{
		return 1;
	}
}
	
function getCheckState($state){
	if($state==1){
		return 'checked="checked"';
	}else{
		return '';
	}
}

function redirect($location = NULL){
	//echo htmlspecialchars($location) ; exit;
	if ($location != NULL) {
		if (headers_sent()) {
			echo "<script>document.location.href='" . $location . "';</script>\n";
		}
		header('Location: ' . $location);
		exit;
	}
}

function getSettings(){
	global $db;
	$sql  = "SELECT * FROM settings ";
	$sql .= "LIMIT 1";
	return $db->get_by_sql($sql);
}
	
function getElementById($table, $id){
	global $db;
	$sql  = "SELECT * FROM {$table} ";
	$sql  .= "WHERE id={$id} ";
	return $db->get_by_sql($sql);
}
	
function getAccountByUserId($id){
	global $db;
	$sql  = "SELECT * FROM accounts WHERE user_id={$id} ";
	$sql .= "LIMIT 1";
	return $db->get_by_sql($sql);
}

function getAllAccounts(){
	global $db;
	$sql  = "SELECT u.*, a.id AS aid, a.balance FROM users AS u INNER JOIN accounts AS a ON (u.id=a.user_id) ";
	$sql .= " ";
	return $db->get_by_sql($sql);
}

function createAccount($id){
	global $messages;
	global $db;
	$sql  = "INSERT INTO accounts (user_id, published, balance) VALUES( ";
	$sql  .= "'{$id}', ";
	$sql  .= "1, ";
	$sql  .= "0 )";
	if ($db->insert_by_sql($sql)) {
		$messages[] = '<span class="message"> Account Created.</span>';
		return true;
	}else{
		$messages[] = '<span class="error"> Account Create fail.</span>';
		return false;
	}
}

function transferAccount($from, $to, $amount=0, $from_type='', $to_type='', $tr_type='', $cr_dr='Cr', $note=''){
	global $messages;
	$dt = time();
	$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
	global $db;

	$to_account=getAccountByUserId($to);
	$from_account=getAccountByUserId($from);
	$to_account_balance=$to_account[0]['balance'];
	$from_account_balance=$from_account[0]['balance'];
	
	if($from > 1){
		if($from_account_balance<=$amount){
		$messages[]='<span class="error">Insufficient sender balance.</span>';
		//echo $messages[0];
		return false;}
	}
	if($to > 1){
		if($to_account_balance< 0){$messages[]='<span class="error">Invalid Recipient balance.</span>';return false;}
	}
	if($to > 1){
		$to_account_balance_new = $to_account_balance + $amount;
		$sql  = "UPDATE accounts SET balance={$to_account_balance_new} ";
		$sql .= "WHERE user_id = {$to} ";
		if ($db->update_by_sql($sql)) {
		}else{
			$messages[]='<span class="error">Update Recipient account fail.</span>';
			return false;
		}
	}else{$to_account_balance_new = 0;}
	
	if($from > 1){
		$from_account_balance_new = $from_account_balance - $amount;
		$sql  = "UPDATE accounts SET balance={$from_account_balance_new} ";
		$sql .= "WHERE user_id = {$from} ";
		if ($db->update_by_sql($sql)) {
		}else{
			$messages[]='<span class="error">Update Sender account fail.</span>';
			// Rollback last transaction.
			$sql  = "UPDATE accounts SET balance={$to_account_balance} ";
			$sql .= "WHERE user_id = {$to} ";
			$result = $db->get_by_sql($sql);
			return false;
		}
	}else{$from_account_balance_new = 0;}
	
	$sql  = "INSERT INTO accounts_register (from_account, to_account, from_account_type, to_account_type, transaction_type, cr_dr, ";
	$sql  .= "amount, to_balance, from_balance, description, transaction_date) VALUES( ";
	
	$sql  .= "'{$from}', ";
	$sql  .= "'{$to}', ";
	$sql  .= "'{$from_type}', ";
	$sql  .= "'{$to_type}', ";
	$sql  .= "'{$tr_type}', ";
	$sql  .= "'{$cr_dr}', ";
	$sql  .= "'{$amount}', ";
	$sql  .= "'{$to_account_balance_new}', ";
	$sql  .= "'{$from_account_balance_new}', ";
	$sql  .= "'{$note}', ";
	$sql  .= "'{$mysql_datetime}' )";
	$result = $db->insert_by_sql($sql); 
	if ($result) {
		return true;
	}else{
		$messages[] = '<span class="error">Can\'t Create Account register record.</span>';
		return false;
	}
}

function arrayEscapeValue($list) { //, $ignore=NULL){
	global $db;
	$result = array();
	foreach($list as $key => $value){
		//if(property_exists($ignore, $key){
		$result[$key] = $db->escape_value($value);
	}
	return $result;
}
	

	function confirm_value($str) {
		if (isset($str)) {
			if(!empty($str)){return $str;}
		}
		return '';
	}
?>
