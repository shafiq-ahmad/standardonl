<?php
defined('_MEXEC') or die ('Restricted Access');


	function getPendingClients($franchise_id){
		global $db;
		$sql  = "SELECT * FROM users AS u INNER JOIN clients AS c ON (u.id=c.user_id) ";
		$sql  .= "WHERE franchise_id = {$franchise_id} AND u.user_group='client' AND registration_status ='pending' ";
		$sql .= " ";
		return $db->get_by_sql($sql);
	}
	
	function getSubmitAssignments($user_id){
		global $db;
		$sql  = "SELECT s.*, a.amount FROM assignments AS a INNER JOIN submit_assignments AS s ON (a.id=s.assignment_id) ";
		$sql  .= "WHERE client_id = {$user_id} ";
		$sql .= " ";
		return $db->get_by_sql($sql);
	}

	function getClient($id){
		global $db;
		$sql  = "SELECT u.*, c.id AS cid, ct.name AS country_name, ";
		$sql .= "p.title AS package, ct.id AS ctid, pd.package_name, pd.work, pd.compilation, pd.max_earning  ";
		$sql .= "FROM users AS u INNER JOIN clients AS c ";
		$sql .= "ON (u.id = c.user_id) INNER JOIN countries AS ct ON (u.country = ct.id) ";
		$sql .= "INNER JOIN packages_detail AS pd ON (c.package_id = pd.id) ";
		$sql .= "INNER JOIN packages AS p ON (pd.package_id = p.id) WHERE u.id={$id} ";
		$sql .= "LIMIT 1";
		return $db->get_by_sql($sql);
	}

	function updateClient($fields, $franchise_id, $id){
		$fields = arrayEscapeValue($fields);
		global $db;
		$sql  = "UPDATE clients SET name='{$fields['name']}', ";
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
		$sql .= "AND franchise_id = {$franchise_id} ";
		return $db->update_by_sql($sql);
	}

	function registerClient($fields, $id){
		$fields = arrayEscapeValue($fields);
		global $db;
		$sql  = "UPDATE users AS u INNER JOIN clients AS c ON (u.id = c.user_id) SET u.name='{$fields['name']}', ";
		$sql  .= "c.franchise_id='{$fields['franchise']}', ";
		$sql  .= "u.phone='{$fields['phone']}', ";
		$sql  .= "u.cell='{$fields['cell']}', ";
		$sql  .= "u.e_mail='{$fields['email']}', ";
		$sql  .= "u.web_site='{$fields['website']}', ";
		$sql  .= "u.zip_code='{$fields['zipcode']}', ";
		$sql  .= "u.address='{$fields['address']}', ";
		$sql  .= "u.city='{$fields['city']}', ";
		$sql  .= "u.country='{$fields['country']}', ";
		$sql  .= "u.published=1, ";
		$sql  .= "u.registration_status='registered' ";	
		$sql .= "WHERE c.id = {$id} ";
		return $db->update_by_sql($sql);
	}


	function submitAmountRequest($fields){
		$fields = arrayEscapeValue($fields);
		$dt = time();
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		global $db;
		$sql  = "INSERT INTO withdraw_requests (user_id, status, description, amount, request_date) VALUES( ";
		$sql  .= "'{$fields['user_id']}', ";
		$sql  .= "'Pending', ";
		$sql  .= "'{$fields['note']}', ";
		$sql  .= "'{$fields['amount']}', ";
		$sql  .= "'{$mysql_datetime}' )";
		return $db->insert_by_sql($sql);
	}


	function newClient($fields){
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
	
function saveAssignmet($file_name, $user_id, $assignment_id){
		$dt = time();
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		global $db;
		$sql  = "INSERT INTO submit_assignments (assignment_id, client_id, file_name, status, ";
		$sql  .= "submition_date) VALUES( ";
		$sql  .= "'{$assignment_id}', ";
		$sql  .= "'{$user_id}', ";
		$sql  .= "'{$file_name}', ";
		$sql  .= "'Pending', ";
		$sql  .= "'{$mysql_datetime}' )";
		return $db->insert_by_sql($sql);
	}


?>
