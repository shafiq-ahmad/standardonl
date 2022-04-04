<?php
defined('_MEXEC') or die ('Restricted Access');

	function getAllQuestions($offset, $per_page){
		global $db;
		$sql  = "SELECT * FROM messages ";
		$sql  .= "WHERE message_type='question' ORDER BY sent_date DESC ";
		$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		return $db->get_by_sql($sql);
	}

	function getAllReplies($id, $offset, $per_page){
		global $db;
		$sql  = "SELECT * FROM messages ";
		$sql  .= "WHERE message_type='answer' AND parent_id={$id} ORDER BY sent_date DESC ";
		$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		return $db->get_by_sql($sql);
	}

	function getQuestion($id){
		global $db;
		$sql  = "SELECT * FROM messages WHERE id={$id} ";
		$sql .= "LIMIT 1";
		return $db->get_by_sql($sql);
	}

	function updateQuestion($fields, $id){
		$fields = arrayEscapeValue($fields);
		global $db;
		$sql  = "UPDATE messages SET name='{$fields['name']}', ";
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
		return $db->update_by_sql($sql);
	}

	function deleteQuestion($id){
		global $db;
		$sql  = "DELETE FROM messages WHERE id={$id}";
		return $db->delete_by_sql($sql);
	}

	function newQuestion($fields){
		$fields = arrayEscapeValue($fields);
		$dt = time();
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		global $db;
		$sql  = "INSERT INTO messages (name, message_from, message_type, subject, ";
		$sql  .= "message_body, user_id, published, parent_id, solved, ";
		$sql  .= "sent_date) VALUES( ";
		$sql  .= "'{$fields['name']}', ";
		$sql  .= "'{$fields['email']}', ";
		$sql  .= "'{$fields['message_type']}', ";
		$sql  .= "'{$fields['subject']}', ";
		$sql  .= "'{$fields['question']}', ";
		$sql  .= "0, ";
		$sql  .= "1, ";
		$sql  .= "0, ";
		$sql  .= "0, ";
		$sql  .= "'{$mysql_datetime}' )";
		return $db->insert_by_sql($sql);
	}




?>
