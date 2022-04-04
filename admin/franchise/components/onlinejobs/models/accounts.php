<?php
defined('_MEXEC') or die ('Restricted Access');

function submitAmountRequest($fields){
	$fields = arrayEscapeValue($fields);
	$dt = time();
	$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
	global $db;
	$sql  = "INSERT INTO withdraw_requests (user_id, status, description, amount, request_date) VALUES( ";
	$sql  .= "'{$fields['user_id']}', ";
	$sql  .= "'Pending', ";
	$sql  .= "'{$fields['note']}', ";
	$sql  .= "'{$fields['amount']}', ";
	$sql  .= "'{$mysql_datetime}' )";
	return $db->insert_by_sql($sql);
}

function getVoucher($voucher, $by_user=null){
	global $db;
	$sql  = "SELECT u.*, v.approve_date, v.status, v.amount, v.description, v.paid_by, ";
	$sql .= "p_by.name AS paid_by_name, p_by.login_name AS paid_by_login ";
	$sql .= "FROM users AS u INNER JOIN vouchers AS v ON (u.id=v.user_id) ";
	$sql .= "LEFT JOIN users AS p_by ON (v.paid_by=p_by.id) ";
	$sql .= "WHERE voucher={$voucher} ";
	$sql .= "LIMIT 1";
	return $db->get_by_sql($sql);
}

function getVouchers($by_user=null){
	global $db;
	$sql  = "SELECT u.*, v.id AS vid, v.approve_date, v.status, v.amount, v.description, v.paid_by, ";
	$sql .= "p_by.name AS paid_by_name, p_by.login_name AS paid_by_login ";
	$sql .= "FROM users AS u INNER JOIN vouchers AS v ON (u.id=v.user_id) ";
	$sql .= "LEFT JOIN users AS p_by ON (v.paid_by=p_by.id) ";
	$sql .= "WHERE paid_by={$by_user} ";
	$sql .= "ORDER BY vid DESC ";
	$sql .= "LIMIT 100";
	return $db->get_by_sql($sql);
}

function processVoucher($voucher, $user_id){
	global $db;
	$sql  = "UPDATE vouchers SET status='Paid', paid_by = {$user_id} WHERE voucher={$voucher} AND status='Pending' ";
	if($db->update_by_sql($sql)){
		$result = getVoucher($voucher);
		return $result;
	}
	return false;
}
	

	function getUser($id){
		global $db;		
		$sql  = "SELECT u.*, ";
		$sql  .= " ac.id AS acid, ac.balance ";
		$sql  .= " FROM users AS u JOIN accounts ac ON (u.id = ac.user_id) ";
		$sql  .= " WHERE u.id={$id} ";
		$sql .= "LIMIT 1 ";
		return array_shift($db->get_by_sql($sql));
	}


?>