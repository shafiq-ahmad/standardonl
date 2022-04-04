<?php
defined('_MEXEC') or die ('Restricted Access');


	function getAllAssignments($offset, $per_page){
		global $db;
		$sql  = "SELECT a.id, a.title, a.amount, a.description, a.published, p.title AS package_title, pd.package_name  FROM packages AS p INNER JOIN packages_detail AS pd ON (p.id=pd.package_id) INNER JOIN assignments AS a ON (pd.id=a.package_id) ";
		$sql .= "ORDER BY a.assignment_date DESC ";
		$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		return $db->get_by_sql($sql);
	}

	function getAssignment($id){
		global $db;
		$sql  = "SELECT a.id, a.title, a.amount, a.description, a.details, a.published, pd.id AS pid, p.title AS package_title, pd.package_name FROM packages AS p INNER JOIN packages_detail AS pd ON (p.id=pd.package_id) INNER JOIN assignments AS a ON (pd.id=a.package_id) ";
		$sql .= "WHERE a.id={$id} ORDER BY a.assignment_date DESC ";
		$sql .= "LIMIT 1 ";
		return $db->get_by_sql($sql);
	}

	function deleteAssignment($id){
		$dt = time();
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		global $db;
		$sql  = "DELETE FROM assignments ";
		$sql  .= "WHERE id= {$id}";
		return $db->delete_by_sql($sql);
	}

	function updateAssignment($fields, $id){
		$fields = arrayEscapeValue($fields);
		$dt = time();
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		global $db;
		$sql  = "UPDATE assignments SET ";
		$sql  .= "package_id = '{$fields['package']}', ";
		$sql  .= "title = '{$fields['name']}', ";
		$sql  .= "description = '{$fields['desc']}', ";
		$sql  .= "amount = '{$fields['amount']}', ";
		$sql  .= "details = '{$fields['details']}', ";
		$sql  .= "assignment_date = '{$mysql_datetime}' ";
		$sql  .= "WHERE id= {$id}";
		return $db->update_by_sql($sql);
	}

	function newAssignment($fields){
		$fields = arrayEscapeValue($fields);
		$dt = time();
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		global $db;
		$sql  = "INSERT INTO assignments (package_id, title, description, amount, details, ";
		$sql  .= "assignment_date, published) VALUES( ";
		$sql  .= "'{$fields['package']}', ";
		$sql  .= "'{$fields['name']}', ";
		$sql  .= "'{$fields['desc']}', ";
		$sql  .= "'{$fields['amount']}', ";
		$sql  .= "'{$fields['details']}', ";
		$sql  .= "'{$mysql_datetime}', 1 )";
		return $db->insert_by_sql($sql);
	}




?>
