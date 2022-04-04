<?php
defined('_MEXEC') or die ('Restricted Access');



class User extends Database {

	
	protected static $table_name="users";
	protected static $db_fields = array('id', 'login_name', 'name', 'password');
	public $id;
	public $login_name;
	public $password;
	public $name;
	
	public static function authenticate($username="", $pass="", $group="admin") {
		global $db;
		$username = $db->escape_value($username);
		$password = $db->escape_value($pass);
		$password=md5($pass);
		$sql  = "SELECT * FROM users ";
		$sql .= "WHERE login_name = '{$username}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "AND user_group = '{$group}' ";
		$sql .= "AND published = 1 ";
		$sql .= "LIMIT 1";
		$result_array = $db->get_by_sql($sql);
		//return !empty($result_array) ? array_shift($result_array) : false;
		return !empty($result_array) ? $result_array : false;
	}

	public function authenticate_franchise($username="", $pass="") {
		$password=md5($pass);
		global $db;
		$sql  = "SELECT u.*, f.id AS fid, f.name AS franchise_name FROM users AS u INNER JOIN franchises AS f ON (u.id=f.user_id) ";
		$sql .= "WHERE login_name = '{$username}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "AND u.published = 1 AND f.published = 1 AND user_group = 'franchise' ";
		$sql .= "LIMIT 1";
		return $db->get_by_sql($sql);
	}

public function authenticate_client($username="", $pass="") {
	$password=md5($pass);
	global $db;
	$sql  = "SELECT u.*, c.id AS fid FROM users AS u INNER JOIN clients AS c ON (u.id=c.user_id) ";
	$sql .= "WHERE login_name = '{$username}' ";
	$sql .= "AND password = '{$password}' ";
	$sql .= "AND u.published = 1 AND user_group = 'client' ";
	$sql .= "LIMIT 1";
	return $db->get_by_sql($sql);
}

public function getUserIdByLoginName($login_name){
	global $db;
	$sql  = "SELECT id FROM users WHERE login_name = '{$login_name}' LIMIT 1 ";
	$row = $db->get_by_sql($sql);
	//print_r($row);
	if ($row) {
		return $row;
	}else{
		return false;
	}
}

function getUserByfrId($id){
	global $db;
	$sql  = "SELECT u.* FROM users AS u INNER JOIN franchises AS f ON (u.id = f.user_id) WHERE f.id = '{$id}' LIMIT 1 ";
	$result_set = $db->get_by_sql($sql);
	if ($result_set) {
		return $result_set;
	}else{
		return 0;
	}
}

public function findLoginName($login_name){
	global $db;
	$sql  = "SELECT * FROM users WHERE login_name = '{$login_name}' LIMIT 1 ";
	return $db->get_by_sql($sql);
}
	
	public function findEmail($email){
		global $db;
		$sql  = "SELECT * FROM users WHERE e_mail = '{$email}' LIMIT 1 ";
		return $db->get_by_sql($sql);
	}
	
	public function validateUser($login_name, $email){
		$msg='';
		if($this->findLoginName($login_name)){$msg .= 'Login name already exist, please try another one. <br />';}
		if($this->findEmail($email)){$msg .= 'E-mail ID already exist, please try another one. <br />';}
		return $msg;
	}

	
}


$user = new User();

