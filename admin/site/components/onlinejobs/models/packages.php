<?php
defined('_MEXEC') or die ('Restricted Access');

	function getPackageDetails($offset, $per_page){
		global $db;
		$sql  = "SELECT p.title, pd.* FROM packages AS p INNER JOIN packages_detail AS pd ON (p.id=pd.package_id) ";
		$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		return $db->get_by_sql($sql);
	}

	function getPackageDetail($id){
		global $db;
		$sql  = "SELECT p.title, pd.* FROM packages AS p INNER JOIN packages_detail AS pd ON (p.id=pd.package_id) WHERE pd.id={$id} ";
		$sql .= "LIMIT 1";
		return $db->get_by_sql($sql);
	}

	function updatePackage($fields, $id){
		$fields = arrayEscapeValue($fields);
		global $db;
		$sql  = "UPDATE packages SET title='{$fields['title']}', ";
		$sql  .= "image='{$fields['image']}', ";
		$sql  .= "description='{$fields['description']}', ";
		$sql  .= "duration='{$fields['duration']}', ";
		$sql  .= "published='{$fields['published']}' ";
		$sql .= "WHERE id = {$id} ";
		return $db->update_by_sql($sql);
	}

	function updatePackageDetail($fields, $id){
		$fields = arrayEscapeValue($fields);
		global $db;
		$sql  = "UPDATE packages_detail SET package_name='{$fields['package_name']}', ";
		$sql  .= "work='{$fields['work']}', ";
		$sql  .= "compilation='{$fields['compilation']}', ";
		$sql  .= "cost='{$fields['cost']}', ";
		$sql  .= "fee='{$fields['fee']}', ";
		$sql  .= "max_earning='{$fields['max_earning']}' ";
		$sql .= "WHERE id = {$id} ";
		return $db->update_by_sql($sql);
	}

	function deletePackage($id){
		global $db;
		$sql  = "DELETE FROM packages WHERE id={$id}";
		return $db->delete_by_sql($sql);
	}

	function newPackage($fields){
		$fields = arrayEscapeValue($fields);
		$dt = time();
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		global $db;
		$sql  = "INSERT INTO packages (title, image, description, duration, published) VALUES( ";
		$sql  .= "'{$fields['title']}', ";
		$sql  .= "'{$fields['image']}', ";
		$sql  .= "'{$fields['description']}', ";
		$sql  .= "'{$fields['duration']}', ";
		$sql  .= "'{$fields['published']}')";
		return $db->insert_by_sql($sql);
	}

	function newPackageDetail($fields){
		$fields = arrayEscapeValue($fields);
		$dt = time();
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		global $db;
		$sql  = "INSERT INTO packages_detail (package_id, package_name, work, compilation, cost, fee, max_earning) VALUES( ";
		
		$sql  .= "'{$_POST['package']}', ";
		$sql  .= "'{$fields['package_name']}', ";
		$sql  .= "'{$fields['work']}', ";
		$sql  .= "'{$fields['compilation']}', ";
		$sql  .= "'{$fields['cost']}', ";
		$sql  .= "'{$fields['fee']}', ";
		$sql  .= "'{$fields['max_earning']}')";
		return $db->insert_by_sql($sql);
	}




?>
