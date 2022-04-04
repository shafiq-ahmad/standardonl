<?php
defined('_MEXEC') or die ('Restricted Access');
 
	function getMenu($id){
		global $db;
		$sql  = "SELECT * FROM menu ";
		$sql .= "WHERE id={$id} ";
		$sql .= "LIMIT 1";
		return $db->get_by_sql($sql);
	}

	function getMenus(){
		global $db;
		$sql  = "SELECT * FROM menu ";
		$sql .= "WHERE id>1 ORDER BY ordering ASC ";
		return $db->get_by_sql($sql);
	}

	function updateMenu($fields, $id){
		global $db;
		$sql  = "UPDATE menu SET name='{$fields['name']}', ";
		$sql  .= "franchise_id='{$fields['franchise']}', ";
		$sql  .= "package_id='{$fields['package']}', ";
		$sql  .= "phone='{$fields['phone']}', ";
		$sql  .= "cell='{$fields['cell']}', ";
		$sql  .= "e_mail='{$fields['email']}', ";
		$sql  .= "web_site='{$fields['website']}', ";
		$sql  .= "zip_code='{$fields['zipcode']}', ";
		$sql  .= "address='{$fields['address']}', ";
		$sql  .= "city='{$fields['city']}', ";
		$sql  .= "country='{$fields['country']}' ";
		$sql .= "WHERE c.id = {$id} ";
		return $db->update_by_sql($sql);
	}

	function deleteMenu($id){
		global $db;
		$sql  = "DELETE FROM menu WHERE id={$id}";
		return $db->delete_by_sql($sql);
	}

	function newMenu($fields){
		$dt = time();
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		global $db;
		$sql  = "INSERT INTO menu (name, franchise_id, phone, cell, e_mail, ";
		$sql  .= "web_site, zip_code, address, city, country, published, ";
		$sql  .= "register_date) VALUES( ";
		$sql  .= "'{$fields['name']}', ";
		$sql  .= "'{$fields['franchise']}', ";
		$sql  .= "'{$fields['phone']}', ";
		$sql  .= "'{$fields['cell']}', ";
		$sql  .= "'{$fields['email']}', ";
		$sql  .= "'{$fields['website']}', ";
		$sql  .= "'{$fields['zipcode']}', ";
		$sql  .= "'{$fields['address']}', ";
		$sql  .= "'{$fields['city']}', ";
		$sql  .= "'{$fields['country']}', ";
		$sql  .= "0, ";
		$sql  .= "'{$mysql_datetime}' )";
		return $db->insert_by_sql($sql);
	}

	
	
	

?>
