<?php
defined('_MEXEC') or die ('Restricted Access');

	function getAllFranchises($offset, $per_page){
		global $db;
		$sql  = "SELECT u.*, ";
		$sql  .= " f.id AS fid, f.name AS franchise_name, balance ";
		$sql  .= " FROM users AS u JOIN franchises AS f ON (u.id = f.user_id) ";
		$sql  .= "LEFT JOIN accounts AS ac ON (u.id = ac.user_id) ";
		$sql  .= " WHERE u.user_group='franchise' ";
		$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		return $db->get_by_sql($sql);
	}

	function getFranchise($id){
		global $db;		
		$sql  = "SELECT u.*, ";
		$sql  .= " f.id AS fid, f.name AS franchise_name, f.franchise_type ";
		$sql  .= " FROM users AS u JOIN franchises f ON (u.id = f.user_id) ";
		$sql  .= " WHERE u.user_group='franchise' AND u.id={$id} ";
		$sql .= "LIMIT 1 ";
		return $db->get_by_sql($sql);
	}

	function updateFranchise($fields, $id){
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

	function newFranchise($fields){
		$fields = arrayEscapeValue($fields);
		$dt = time();
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		global $db;
		global $user;
		$sql  = "INSERT INTO users (login_name, password, name, phone, cell, e_mail, ";
		$sql  .= "web_site, zip_code, address, city, country, published, ";
		$sql  .= "register_date, user_group, registration_status) VALUES( ";
		$sql  .= "'{$fields['user_name']}', ";
		$sql  .= "'21232f297a57a5a743894a0e4a801fc3', ";
		$sql  .= "'{$fields['full_name']}', ";
		$sql  .= "'{$fields['phone']}', ";
		$sql  .= "'{$fields['cell']}', ";
		$sql  .= "'{$fields['email']}', ";
		$sql  .= "'{$fields['website']}', ";
		$sql  .= "'{$fields['zipcode']}', ";
		$sql  .= "'{$fields['address']}', ";
		$sql  .= "'{$fields['city']}', ";
		$sql  .= "'{$fields['country']}', ";
		$sql  .= "1, ";
		$sql  .= "'{$mysql_datetime}', 'franchise', 'registered' )";
		$new_user=$db->insert_by_sql($sql);
		$row = $user->getUserIdByLoginName($fields['user_name']);
		$new_id = $row[0]['id'];
		//echo '<br />' . $new_id . 'shafique<br />';
		if(createAccount($new_id)){
			if ($new_user) {
				$sql  = "INSERT INTO franchises (user_id, name, franchise_type, ";
				$sql  .= "published) VALUES( ";
				$sql  .= "{$new_id}, '{$fields['franchise']}', '{$fields['type']}', ";
				$sql  .= "'1' )";
				return $db->insert_by_sql($sql);
			}else{
				return false;
			}
		}
	}




?>
