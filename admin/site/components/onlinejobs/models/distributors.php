<?php
defined('_MEXEC') or die ('Restricted Access');

	function getAllDistributors($offset, $per_page){
		global $db;
		$sql  = "SELECT * FROM users WHERE user_group='distributor' ";
		$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		return $db->get_by_sql($sql);
	}

	function getDistributor($id){
		global $db;
		$sql  = "SELECT * FROM users WHERE user_group='distributor' AND id={$id} ";
		$sql .= "LIMIT 1";
		return $db->get_by_sql($sql);
	}


	function updateDistributor($fields, $id){
		$fields = arrayEscapeValue($fields);
		global $db;
		$user=false;
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
		return $db->update_by_sql($sql);	
	}

	function newDistributor($fields){
		$fields = arrayEscapeValue($fields);
		$dt = time();
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		global $db;
		$sql  = "INSERT INTO users (login_name, name, phone, cell, e_mail, ";
		$sql  .= "web_site, zip_code, address, city, country, published, user_group, ";
		$sql  .= "register_date) VALUES( ";
		$sql  .= "'{$fields['user_name']}', ";
		$sql  .= "'{$fields['full_name']}', ";
		$sql  .= "'{$fields['phone']}', ";
		$sql  .= "'{$fields['cell']}', ";
		$sql  .= "'{$fields['email']}', ";
		$sql  .= "'{$fields['website']}', ";
		$sql  .= "'{$fields['zipcode']}', ";
		$sql  .= "'{$fields['address']}', ";
		$sql  .= "'{$fields['city']}', ";
		$sql  .= "'{$fields['country']}', ";
		$sql  .= "'{$fields['published']}', ";
		$sql  .= "'distributor', ";
		$sql  .= "'{$mysql_datetime}' )";
		return $db->insert_by_sql($sql);
	}


?>
