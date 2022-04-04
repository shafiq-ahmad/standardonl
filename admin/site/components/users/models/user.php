<?php
defined('_MEXEC') or die ('Restricted Access');

	function getUsers($offset, $per_page){
		global $db;
		$sql  = "SELECT u.* ";
		$sql  .= " FROM users AS u ";
		$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		return $db->get_by_sql($sql);
	}

	function getUser($id){
		global $db;		
		$sql  = "SELECT u.* ";
		$sql  .= " FROM users AS u ";
		$sql .= "LIMIT 1 ";
		return $db->get_by_sql($sql);
	}

	function updateUser($fields, $id){
		$fields = arrayEscapeValue($fields);
		global $db;
		$franchise=false;
		$sql  = "UPDATE users SET ";
		$sql  .= "name='{$fields['full_name']}', ";
		$sql  .= "phone='{$fields['phone']}', ";
		$sql  .= "cell='{$fields['cell']}', ";
		$sql  .= "e_mail='{$fields['email']}', ";
		$sql  .= "web_site='{$fields['website']}', ";
		$sql  .= "zip_code='{$fields['zipcode']}', ";
		$sql  .= "address='{$fields['address']}', ";
		$sql  .= "city='{$fields['city']}', ";
		$sql  .= "country='{$fields['country']}' ";
		$sql .= "WHERE id = {$id} ";
		$usr = $db->update_by_sql($sql);
		
		$sql  = "UPDATE franchises SET name='{$fields['franchise']}', ";
		$sql  .= "franchise_type='{$fields['type']}', ";
		$sql  .= "published='{$fields['published']}' ";
		$sql .= "WHERE id = {$fields['fid']} ";
		$fr = $db->update_by_sql($sql);
		$result= $usr || $fr;
		return $result;
	}



?>
