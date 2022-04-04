<?php
defined('_MEXEC') or die ('Restricted Access');

	function getClientRequest($user_id){
		global $db;
		$sql  = "SELECT * FROM client_requests WHERE user_id = {$user_id} LIMIT 1 ";
		return $db->get_by_sql($sql);
	}
	

function registerUser($fields){
		$fields = arrayEscapeValue($fields);
		global $user;
		$dt = time();
		$msg='';
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		$password = md5($fields['password']);
		$activation = md5($mysql_datetime);
		global $db;
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
		if ($db->insert_by_sql($sql)) {
			$country=getCountryNameById($fields['country']);
			$msg  = "<strong>A client Request form is recieved. </strong><br /> ";
			$msg  .= "<strong>Name: </strong>{$fields['name']}  <br /> ";
			$msg  .= "<strong>E-mail: </strong>{$fields['email']} <br /> ";
			$msg  .= "<strong>CNIC: </strong>{$fields['cnic']} <br /> ";
			$msg  .= "<strong>Login Name: </strong>{$fields['login_name']}  <br /> ";
			$msg  .= "<strong>Type: </strong>client  <br />";
			$msg  .= "<strong>Franchise ID: </strong>{$fields['franchise']}  <br /> ";
			$msg  .= "<strong>Phone: </strong>{$fields['phone']} <br />";
			$msg  .= "<strong>Address: </strong>{$fields['address']}  <br />";
			$msg  .= "<strong>Country: </strong>{$country[0]['name']} <br /> ";
			$msg  .= "<strong>City: </strong>{$fields['city']}  <br /> ";
			$msg  .= "<strong>Date: </strong>{$mysql_datetime}  <br />";
			$row=getElementById('users',$fields['franchise']);
			$to = $row[0]['e_mail'];
			sendEmail($to, $msg);
		}
		$user_id = $user->getUserIdByLoginName($fields['login_name']);
		
		if($user_id){
			$sql  = "INSERT INTO client_requests (user_id, selected_franchise, request_package, ";
			$sql  .= "request_date) VALUES( ";
			$sql  .= "'{$user_id[0]['id']}', ";
			$sql  .= "'{$fields['franchise']}', ";
			$sql  .= "'{$fields['package']}', ";
			$sql  .= "'{$mysql_datetime}' )";
			return $db->insert_by_sql($sql);
		}
		return false;
}

	
?>
