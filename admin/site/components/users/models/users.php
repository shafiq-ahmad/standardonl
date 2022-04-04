<?php
defined('_MEXEC') or die ('Restricted Access');

	function getUsers($offset, $per_page){
		global $db;
		global $user_id;
		$sql  = "SELECT u.* ";
		$sql  .= " FROM users AS u ";
		$sql  .= " WHERE id != {$user_id} ";
		$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		return $db->get_by_sql($sql);
	}

	function getUser($id){
		global $db;		
		$sql  = "SELECT u.* ";
		$sql  .= " FROM users AS u ";
		$sql  .= " WHERE id = {$id} ";
		$sql .= "LIMIT 1 ";
		return $db->get_by_sql($sql);
	}

	function updateUser($fields, $id){
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

	function resetPass($user_id, $n){
			$new=md5($n);
			global $db;
			$sql  = "UPDATE users SET password='{$new}' ";
			$sql .= "WHERE id = '{$user_id}' ";
			return $db->update_by_sql($sql);
	}

	function validateFields(){
		if (isset($_POST["user_id"]) && isset($_POST["new_password"]) && isset($_POST["confirm_password"])){
			$new_pass = $_POST["new_password"];
			$confirm_pass = $_POST["confirm_password"];
			$user_id = $_POST['user_id'];
			if ($new_pass != "" && $confirm_pass != "" && $user_id != 0){
				if($new_pass == $confirm_pass){
					if(resetPass($user_id, $new_pass)){
						return true;
					}
				}
			}
			$message = '<span class="error">Invalid username or password.</span>';
			Session::setMessages($message );
			return false;
		}else{
			$message = '<span class="error">Invalid username or password.</span>';
			Session::setMessages($message );
			return false;
		}
	}


?>
