<?php
defined('_MEXEC') or die ('Restricted Access');

function getPendingAssignments(){
	global $db;
	$sql  = "SELECT s.*,u.name, u.id AS uid, a.title, a.amount FROM users AS u INNER JOIN submit_assignments AS s ON (u.id = s.client_id) INNER JOIN assignments AS a ON (a.id=s.assignment_id) ";
	$sql  .= "WHERE s.status='pending' OR s.status='Pending' ";
	return $db->get_by_sql($sql);
}

function getAllAssignments($offset, $per_page){
	global $db;
	$sql  = "SELECT s.*,u.name, u.id AS uid, a.title, a.amount FROM users AS u INNER JOIN submit_assignments AS s ON (u.id = s.client_id) INNER JOIN assignments AS a ON (a.id=s.assignment_id) ";
	$sql  .= "WHERE s.status!='pending' OR s.status!='Pending' ";
	$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
	return $db->get_by_sql($sql);
}

function getAssignment($id){
	global $db;
	$sql  = "SELECT s.*,u.name, u.id AS uid, a.title, a.amount FROM users AS u INNER JOIN  ";
	$sql  .= "submit_assignments AS s ON (u.id = s.client_id) INNER JOIN assignments AS a ";
	$sql  .= "ON (a.id=s.assignment_id) WHERE s.id={$id} ";
	$sql .= "LIMIT 1";
	return $db->get_by_sql($sql);
}

function acceptRequest($fields){
	$fields = arrayEscapeValue($fields);
	global $db;
	$sql  = "UPDATE submit_assignments SET amount_rec='{$fields['amount']}', ";
	$sql  .= "status='accepted' ";
	$sql .= "WHERE id = {$fields['id']} ";
	if ($db->update_by_sql($sql)) {
		if(transferAccount(1, $fields['user_id'], $fields['amount'], 'Site-Admin', 'Cleint', 'Withdraw', 'Cr',$fields['note'])){
			return true;
		}
	}else{
		return false;
	}
}

function rejectRequest($fields){
	$fields = arrayEscapeValue($fields);
	global $db;
	$sql  = "UPDATE submit_assignments SET amount_rec='{$fields['amount']}', ";
	$sql  .= "status='rejected' ";
	$sql .= "WHERE id = {$fields['id']} ";
	return $db->update_by_sql($sql);
}


?>
