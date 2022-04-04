<?php
defined('_MEXEC') or die ('Restricted Access');

	function getAllFranchises($offset, $per_page){
		global $db;
		$sql  = "SELECT u.*, ";
		$sql  .= " f.id AS fid, f.name AS franchise_name ";
		$sql  .= " FROM users AS u JOIN franchises f ON (u.id = f.user_id) ";
		$sql  .= " WHERE u.user_group='franchise' ";
		$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		return $db->get_by_sql($sql);
	}

	function getFranchise($id){
		global $db;
		$sql  = "SELECT * FROM franchises WHERE id={$id} ";
		$sql .= "LIMIT 1";
		return $db->get_by_sql($sql);
	}

	function updateFranchise($fields, $id){
		$fields = arrayEscapeValue($fields);
		global $db;
		$sql  = "UPDATE franchises SET name='{$fields['name']}', ";
		$sql  .= "phone='{$fields['phone']}', ";
		$sql  .= "cell='{$fields['cell']}', ";
		$sql  .= "e_mail='{$fields['email']}', ";
		$sql  .= "web_site='{$fields['website']}', ";
		$sql  .= "zip_code='{$fields['zipcode']}', ";
		$sql  .= "address='{$fields['address']}', ";
		$sql  .= "city='{$fields['city']}', ";
		$sql  .= "country='{$fields['country']}', ";
		$sql  .= "published='{$fields['published']}' ";
		$sql .= "WHERE id = {$id} ";
		return $db->update_by_sql($sql);
	}

	function deleteFranchise($id){
		global $db;
		$sql  = "DELETE FROM franchises WHERE id={$id}";
		return $db->delete_by_sql($sql);
	}

	function newFranchise($fields){
		$fields = arrayEscapeValue($fields);
		$dt = time();
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		global $db;
		$sql  = "INSERT INTO franchises (name, phone, cell, e_mail, ";
		$sql  .= "web_site, zip_code, address, city, country, published, ";
		$sql  .= "register_date) VALUES( ";
		$sql  .= "'{$fields['name']}', ";
		$sql  .= "'{$fields['phone']}', ";
		$sql  .= "'{$fields['cell']}', ";
		$sql  .= "'{$fields['email']}', ";
		$sql  .= "'{$fields['website']}', ";
		$sql  .= "'{$fields['zipcode']}', ";
		$sql  .= "'{$fields['address']}', ";
		$sql  .= "'{$fields['city']}', ";
		$sql  .= "'{$fields['country']}', ";
		$sql  .= "'{$fields['published']}', ";
		$sql  .= "'{$mysql_datetime}' )";
		return $db->insert_by_sql($sql);
	}




?>
