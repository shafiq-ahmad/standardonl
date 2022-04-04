<?php
defined('_MEXEC') or die ('Restricted Access');

	function getPendingClients($franchise_id){
		global $db;
		$sql  = "SELECT u.*, c.request_package, c.request_date, c.selected_franchise FROM users AS u INNER JOIN client_requests AS c ON (u.id=c.user_id) ";
		$sql  .= "WHERE selected_franchise = {$franchise_id} AND u.user_group='client' AND registration_status ='pending' ";
		$sql .= " ";
		return $db->get_by_sql($sql);
	}

	function getClient($id){
		global $db;
		$sql  = "SELECT u.*, c.id AS cid, ct.name AS country_name, f.id AS fid, ct.id AS ctid FROM users AS u INNER JOIN clients AS c ";
		$sql .= "ON (u.id = c.user_id) INNER JOIN countries AS ct ON (u.country = ct.id) ";
		$sql .= "INNER JOIN franchises AS f ON (c.franchise_id = f.id) WHERE c.id={$id} ";
		$sql .= "LIMIT 1";
		return $db->get_by_sql($sql);
	}

	function getPendingClient($id){
		global $db;
		$sql  = "SELECT u.*, c.request_package, c.ref_client, c.request_date,c.selected_franchise, ct.name AS country_name, f.id AS fid, ct.id AS ctid, pd.cost FROM users AS u INNER JOIN client_requests AS c ";
		$sql .= "ON (u.id = c.user_id) INNER JOIN countries AS ct ON (u.country = ct.id) ";
		$sql .= "INNER JOIN franchises AS f ON (c.selected_franchise = f.user_id) INNER JOIN packages_detail AS pd ON(c.request_package=pd.id) WHERE u.id={$id} ";
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

function registerUser($fields, $task='new'){
		$fields = arrayEscapeValue($fields);
		global $db;
		global $user;
		$dt = time();
		$msg='';
		$mysql_datetime = strftime("%Y-%m-%d", $dt);
		$password = md5($fields['password']);
		$activation = md5($mysql_datetime);
		if ($task=='new'){
		$sql  = "INSERT INTO users (name, e_mail, cnic, login_name, user_type, password, phone, address, ";
		$sql  .= "country, city, registration_status, published, ";
		$sql  .= "register_date, activation, user_group) VALUES( ";
		$sql  .= "'{$fields['name']}', ";
		$sql  .= "'{$fields['email']}', ";
		$sql  .= "'{$fields['cnic']}', ";
		$sql  .= "'{$fields['login_name']}', ";
		$sql  .= "'client', ";
		$sql  .= "'{$password}', ";
		$sql  .= "'{$fields['phone']}', ";
		$sql  .= "'{$fields['address']}', ";
		$sql  .= "'{$fields['country']}', ";
		$sql  .= "'{$fields['city']}', ";
		$sql  .= "'{$fields['registration_status']}', ";
		$sql  .= "0, ";
		$sql  .= "'{$mysql_datetime}',";
		$sql  .= "'{$activation}', '{$fields['request']}' )";
		$client_id = $fields['client'];
		
		if (!$db->insert_by_sql($sql)) {return false;}
		}else{ 
			$sql  = "UPDATE users SET ";
			$sql  .= "register_date='{$mysql_datetime}', ";
			$sql  .= "published=0, ";
			$sql  .= "registration_status='franchise_verified' ";	
			$sql .= "WHERE id = {$fields['id']} ";		
			if (!$db->update_by_sql($sql)) {
				return false;
			}
		}
		$country=getCountryNameById($fields['country']);
		$msg  = "<strong>A client Request form is recieved. </strong><br /> ";
		$msg  .= "<strong>Name: </strong>{$fields['name']}  <br /> ";
		$msg  .= "<strong>E-mail: </strong>{$fields['email']} <br /> ";
		$msg  .= "<strong>CNIC: </strong>{$fields['cnic']} <br /> ";
		$msg  .= "<strong>Login Name: </strong>{$fields['login_name']}  <br /> ";
		$msg  .= "<strong>Amount Received: </strong>{$fields['amount']}  <br /> ";
		$msg  .= "<strong>Type: </strong>client  <br />";
		$msg  .= "<strong>Franchise ID: </strong>{$fields['franchise']}  <br /> ";
		$msg  .= "<strong>Phone: </strong>{$fields['phone']} <br />";
		$msg  .= "<strong>Address: </strong>{$fields['address']}  <br />";
		$msg  .= "<strong>Country: </strong>{$country[0]['name']} <br /> ";
		$msg  .= "<strong>City: </strong>{$fields['city']}  <br /> ";
		$msg  .= "<strong>Date: </strong>{$mysql_datetime}  <br />";
		$row=getElementById('users', 1);
		$to = $row[0]['e_mail'];
		sendEmail($to, $msg);

		$franchise_id = $fields['franchise'];
		$amount = $fields['amount'];
		$adminAmount = $amount * 0.70;
		if(transferAccount($franchise_id, 1, $adminAmount, 'New Client', 'Site-admin', 'Signup Charges')){
			if(isset($client_id) && $client_id > 0){
				$reffererAmount = $amount * 0.05;
				transferAccount(1, $client_id, $reffererAmount, 'Site-admin', 'Client', 'New client Commision');
			}
		}else{	
			return false;
		}
		$user_id =$user->getUserIdByLoginName($fields['login_name']);
		if ($task=='new'){
		if($user_id[0]['id']>0 ){
			$sql  = "INSERT INTO client_requests (user_id, selected_franchise, request_package, ref_client, ";
			$sql  .= "amount_receive, request_date) VALUES( ";
			$sql  .= "'{$user_id[0]['id']}', ";
			$sql  .= "'{$fields['franchise']}', ";
			$sql  .= "'{$fields['package']}', ";
			$sql  .= "'{$fields['client']}', ";
			$sql  .= "'{$fields['amount']}', ";
			$sql  .= "'{$mysql_datetime}' )";
			return $db->insert_by_sql($sql);
		}
		}else{
			$sql  = "UPDATE client_requests SET amount_receive = {$fields['amount']} WHERE user_id={$user_id[0]['id']}";
			return $db->update_by_sql($sql);
		}
		return false;
}

function validateAmount($id=0, $user_id){
	$msg='';
	$package=getPackage($id);
	$frAccount=getAccountByUserId($user_id);
	$packagePrice = 0;
	$frBalance = 0;
	if($package){
		if ($package[0]['cost']>0){
			$packagePrice = $package[0]['cost'];
		}
	}
	
	//print_r($package);
	if($frAccount){
		if ($frAccount[0]['balance']>0){
			$frBalance = $frAccount[0]['balance'];
		}
	}
	$percent = $packagePrice*0.7;
	if ($frBalance >= $percent){
		return $packagePrice;
	}else{
		return 0;
	}
	//return $msg;
}

	function getClientRequest($user_id){
		global $db;
		$sql  = "SELECT * FROM client_requests WHERE user_id = {$user_id} LIMIT 1 ";
		return $db->get_by_sql($sql);
	}
	

?>
