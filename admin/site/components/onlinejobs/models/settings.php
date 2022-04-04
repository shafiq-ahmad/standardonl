<?php
defined('_MEXEC') or die ('Restricted Access');

function updateSettings($fields){
	$fields = arrayEscapeValue($fields);
	global $db;
	$sql  = "UPDATE settings SET e_mail='{$fields['email']}', ";
	$sql  .= "password='{$fields['password']}', ";
	$sql  .= "min_withdraw = {$fields['min_withdraw']}  ";
	$sql .= "WHERE id = 1 ";
	return $db->update_by_sql($sql);
}


?>
