<?php
defined('_MEXEC') or die ('Restricted Access');

function change_franchise_password($o, $n){
	global $db;
	$old=md5($o);
	$new=md5($n);
	$user_name = $_SESSION['username'];
	if (checkFranchisePassword($user_name, $old)){
		$sql  = "UPDATE users SET password='{$new}' ";
		$sql .= "WHERE login_name = '{$user_name}' ";
		return $db->update_by_sql($sql);
	}else{
		return false;
	}
}

function checkFranchisePassword($user_name, $password){
	global $db;
	$sql  = "SELECT * FROM users ";
	$sql .= "WHERE login_name = '{$user_name}' ";
	$sql .= "AND password = '{$password}' ";
	$sql .= "AND user_group = 'franchise' ";
	$sql .= "LIMIT 1";
	return $db->get_by_sql($sql);
}




?>
