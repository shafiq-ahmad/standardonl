<?php
defined('_MEXEC') or die ('Restricted Access');


	function getUserByActivation($code){
		global $db;		
		$sql  = "SELECT u.* ";
		$sql  .= " FROM users AS u ";
		$sql  .= " WHERE activation = '{$code}' ";
		$sql .= "LIMIT 1 ";
		return array_shift($db->get_by_sql($sql));
	}

	function getUser($code){
		global $db;
		$user = getUserByActivation($code);
		if(!$user){return false;}
		return $user;
	}

	function createCode($user_id){
		global $db;
		$code = md5($user_id . time());
		$sql  = "UPDATE users SET ";
		$sql  .= "activation='{$code}' ";
		$sql .= "WHERE id = {$user_id} ";
		$result = $db->update_by_sql($sql);
		return $code;
	}


	function sendCode($email){
		global $db;
		$user = getUserByEmail($email);
		if(!$user){return false;}
		$user_id = $user['id'];
		$login_name = $user['login_name'];
		$full_name = $user['name'];
		$code = createCode($user_id);
		$mail_body  = "<h3>Hello {$full_name} </h3>";
		$mail_body  .= "<p>Your activation code is here <br />";
		$mail_body  .= "Your Login Name: {$login_name} <br />";
		$mail_body  .= "Activation Code: {$code} <br />";
		$mail_body  .= "</p>";
		//echo $mail_body;
		if(sendEmail($email, $mail_body)){
			return true;
		}
		return false;
	}

	function getUserByEmail($email){
		global $db;
		$sql  = "SELECT * FROM users ";
		$sql .= "WHERE e_mail = '{$email}' ";
		$sql .= "LIMIT 1";
		$result = array_shift($db->get_by_sql($sql));
		return $result;
	}

	function resetPass($user_id, $n){
		$new=md5($n);
		global $db;
		$sql  = "UPDATE users SET password='{$new}' ";
		$sql .= "WHERE id = '{$user_id}' ";
		return $db->update_by_sql($sql);
	}

	function validateFields($user_id, $new_pass, $confirm_pass){
		if ($user_id && $new_pass && $confirm_pass){
			if ($new_pass != "" && $confirm_pass != "" && $user_id != 0){
				if($new_pass == $confirm_pass){
					if(resetPass($user_id, $new_pass)){
						$message = '<span class="message">Password changed.</span>';
						Session::setMessages($message );
						return true;
					}
				}
			}
		}
		$message = '<span class="error">Invalid username or password.</span>';
		Session::setMessages($message );
		return false;
	}


?>
