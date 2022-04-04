<?php
defined('_MEXEC') or die ('Restricted Access');

	function getAllWithdrawRequests($offset, $per_page){
		global $db;
		$sql  = "SELECT * FROM users AS u INNER JOIN withdraw_requests w ON (u.id=w.user_id) ";
		$sql .= "WHERE status != 'pending' ORDER BY w.id DESC ";
		$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		return $db->get_by_sql($sql);
	}

	function getPendingWithdrawRequests(){
		global $db;
		$sql  = "SELECT * FROM users AS u INNER JOIN withdraw_requests AS w ON (u.id=w.user_id) ";
		$sql .= "WHERE status = 'pending' ORDER BY w.id DESC ";
		return $db->get_by_sql($sql);
	}

	function getRequest($id){
		global $db;
		$sql  = "SELECT u.*, w.id as wid, w.status, w.description, w.amount, w.request_date FROM users AS u INNER JOIN withdraw_requests AS w ON (u.id=w.user_id) WHERE w.id={$id} ";
		$sql .= "LIMIT 1";
		return $db->get_by_sql($sql);
	}

	function acceptRequest($fields){
		$fields = arrayEscapeValue($fields);
		global $db;
		$dt=time();
		$voucher=$dt;
		$now = strftime("%Y-%m-%d", $dt);
		$request_id=$fields['id'];
		$user_id=$fields['user_id'];
		$sql  = "UPDATE withdraw_requests SET amount='{$fields['amount']}', ";
		$sql  .= "description='{$fields['note']}', ";
		$sql  .= "status='accepted' ";
		$sql .= "WHERE id = {$request_id} ";
		if ($db->update_by_sql($sql)) {
			if(transferAccount($fields['user_id'], 1, $fields['amount'], 'Site-Admin', '', 'Withdraw', 'Cr',$fields['note'])){
				$sql  = "INSERT INTO vouchers (user_id, voucher, paid_by, status, description, amount, approve_date) VALUES( ";
				$sql  .= "'{$user_id}', ";
				$sql  .= "'{$voucher}', ";
				$sql  .= "0, ";
				$sql  .= "'Pending', ";
				$sql  .= "'{$fields['note']}', ";
				$sql  .= "'{$fields['amount']}', ";
				$sql  .= "'{$now}' )";
				if ($db->insert_by_sql($sql)) {
					$messages[] = '<span class="message"> Withdraw Successfull.</span>';
					$msg  = "<h1>Your withdraw request approved. </h1><br /> ";
					$msg  .= "<strong>Voucher Number: </strong>{$voucher}  <br /> ";
					$msg  .= "<strong>Note: </strong>{$fields['note']}  <br />";
					$msg  .= "<strong>Date: </strong>{$now}  <br />";
					$row=getElementById('users', $user_id);
					$to = $row[0]['e_mail'];
					sendEmail($to, $msg);
					return true;
				}else{
					$messages[] = '<span class="error"> Withdraw failed.</span>';
					return false;
				}
			
				
				return true;
			}
		}else{
			return false;
		}
	}
	
	function rejectRequest($fields){
		$fields = arrayEscapeValue($fields);
		global $db;
		$sql  = "UPDATE withdraw_requests SET status='rejected', ";
		$sql  .= "description='{$fields['note']}' ";
		$sql .= "WHERE id = {$fields['id']} ";
		return $db->update_by_sql($sql);
	}



?>
