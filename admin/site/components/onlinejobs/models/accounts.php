<?php
defined('_MEXEC') or die ('Restricted Access');

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