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

	function getPendingClient($id){
		global $db;
		$sql  = "SELECT u.*, c.selected_franchise, c.request_package, c.ref_client, c.request_date, c.amount_receive, ct.name AS country_name, f.id AS fid, ct.id AS ctid FROM users AS u INNER JOIN client_requests AS c ";
		$sql .= "ON (u.id = c.user_id) INNER JOIN countries AS ct ON (u.country = ct.id) ";
		$sql .= "INNER JOIN franchises AS f ON (c.selected_franchise = f.user_id) WHERE u.id={$id} ";
		$sql .= "LIMIT 1";
		return $db->get_by_sql($sql);
	}

	function updateClient($fields, $id){
		global $db;
		$fields = arrayEscapeValue($fields);
		$sql  = "UPDATE users AS u INNER JOIN clients AS c ON (u.id = c.user_id) SET u.name='{$fields['name']}', ";
		$sql  .= "c.franchise_id='{$fields['franchise']}', ";
		$sql  .= "c.package_id='{$fields['package']}', ";
		$sql  .= "u.phone='{$fields['phone']}', ";
		$sql  .= "u.cell='{$fields['cell']}', ";
		$sql  .= "u.e_mail='{$fields['email']}', ";
		$sql  .= "u.web_site='{$fields['website']}', ";
		$sql  .= "u.zip_code='{$fields['zipcode']}', ";
		$sql  .= "u.address='{$fields['address']}', ";
		$sql  .= "u.city='{$fields['city']}', ";
		$sql  .= "u.country='{$fields['country']}' ";
		$sql .= "WHERE u.id = {$id} ";
		return $db->update_by_sql($sql);
	}

	function registerClient($fields, $id, $amount){
		$dt = time();
		$fields = arrayEscapeValue($fields);
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		$day = date('d',$cd);
		if ($day>27){
			$dd  = mktime(0, 0, 0, date("m")+1  , 28, date("Y"));
		}else{
			$dd  = mktime(0, 0, 0, date("m")  , 28, date("Y"));
		}
		$next_due = strftime("%Y-%m-%d %H:%M:%S", $dd);
		//$next_due = strftime("%Y-%m-%d", $dt + (60*60*24*30));
		global $message;
		global $db;
		$franchise=$_POST['franchise'];
		$sql  = "UPDATE users  SET name='{$fields['name']}', ";
		$sql  .= "phone='{$fields['phone']}', ";
		$sql  .= "cell='{$fields['cell']}', ";
		$sql  .= "e_mail='{$fields['email']}', ";
		$sql  .= "web_site='{$fields['website']}', ";
		$sql  .= "zip_code='{$fields['zipcode']}', ";
		$sql  .= "address='{$fields['address']}', ";
		$sql  .= "city='{$fields['city']}', ";
		$sql  .= "country='{$fields['country']}', ";
		$sql  .= "published=1, ";
		$sql  .= "registration_status='registered' ";	
		$sql .= "WHERE id = {$id} ";
		if ($db->update_by_sql($sql)) {
			$sql  = "INSERT INTO clients (user_id, franchise_id, package_id, activation_date, due_date) VALUES( ";
			$sql  .= "'{$id}', ";
			$sql  .= "'{$franchise}', ";
			$sql  .= "'{$_POST['package']}', ";
			$sql  .= "'{$mysql_datetime}' , ";
			$sql  .= "'{$next_due}' )";
			if ($db->insert_by_sql($sql)) {
				createAccount($id);

				$sql  = "DELETE FROM client_requests WHERE user_id={$id}";
				$result = $db->delete_by_sql($sql);;
				if (!$result) {
					return false;
				}
				$messages[] = '<span class="message">Account-register record Created .</span>';
				$currentAssignment=getClientAssignments($id);
				$msg="<h1>You are registered successfully.</h1><p>";
				if($currentAssignment){
					foreach ($currentAssignment as $current){
						$msg .= "<strong>Title: </strong>{$current['title']} <br />";
						$msg .= "<strong>Description: </strong>{$current['description']} <br />";
						$msg .= "<strong>Amount: </strong>{$current['amount']} <br />";
						$msg .= "<strong>Date: </strong>{$current['assignment_date']} <br />";
						$msg .= "<strong>Detail: </strong>{$current['details']} <br />";
					}
				}
				$msg .= "</p>";
				$usr=getElementById('users', $id);
				$to = $usr[0]['e_mail'];
				sendEmail($to, $msg);
				return true;
			}else{
				return false;
			}			
	
		}else{
			return false;
		}
	}


	function newClient($fields){
		$fields = arrayEscapeValue($fields);
		$dt = time();
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		global $db;
		$sql  = "INSERT INTO clients (name, franchise_id, phone, cell, e_mail, ";
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

	function getAllPendingClients($offset, $per_page,$state=''){
		global $db;
		if ($state!=''){
			$status=" AND registration_status='{$state}' ";
		}else{
			$status="";
		}
		$sql  = "SELECT u.*, c.selected_franchise, c.ref_client, c.request_package, c.request_date, balance ";
		$sql  .= "FROM users AS u ";
		$sql  .= "LEFT JOIN client_requests AS c ON (u.id = c.user_id) ";
		$sql  .= "LEFT JOIN accounts AS ac ON (u.id = ac.user_id) ";
		$sql  .= "WHERE user_group = 'client' {$status} ";
		$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		return $db->get_by_sql($sql);
	}



?>
