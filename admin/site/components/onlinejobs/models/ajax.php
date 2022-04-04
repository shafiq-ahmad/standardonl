<?php
defined('_MEXEC') or die ('Restricted Access');

	function getClient($id){
		global $db;
		$sql  = "SELECT u.*, c.id AS cid, ct.name AS country_name, c.package_id, c.franchise_id AS fid, ct.id AS ctid FROM users AS u INNER JOIN clients AS c ";
		$sql .= "ON (u.id = c.user_id) INNER JOIN countries AS ct ON (u.country = ct.id) ";
		$sql .= "WHERE u.id={$id} ";
		$sql .= "LIMIT 1";
		return $db->get_by_sql($sql);
	}
?>