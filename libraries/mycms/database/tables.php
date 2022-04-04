<?php
defined('_MEXEC') or die ('Restricted Access');

	function setPublish($table, $id, $state,$view=""){
		global $db;
		global $v_option;
		if ($view==""){
			$view="&view={$table}";
		}else{
			$view="&view={$view}";
		}
		$sql  = "UPDATE {$table} SET published='{$state}' ";
		$sql .= "WHERE id = '{$id}' ";
		if ($db->update_by_sql($sql)) {
			if($v_option!=''){
				$link="index.php?option={$v_option}{$view}";
				redirect($link);
			}
			return true;
		}else{
			return false;
		}
	}

	function getCountryNameById($id){
		global $db;
		$sql  = "SELECT name FROM countries WHERE id={$id} ";
		return $db->get_by_sql($sql);
	}
	
	function getCountryList(){
		global $db;
		$sql  = "SELECT * FROM countries ";
		return $db->get_by_sql($sql);
	}
	
	
	function getPackagesList(){
		global $db;
		$sql  = "SELECT d.id, CONCAT (p.title, ' - ', d.package_name) AS name FROM packages AS p INNER JOIN packages_detail AS d ON (p.id=d.package_id) WHERE p.published=1 ";
		return $db->get_by_sql($sql);
	}
	
	function getPackageList(){
		global $db;
		$sql  = "SELECT d.id, p.title, d.package_name FROM packages AS p INNER JOIN packages_detail AS d ON (p.id=d.package_id) WHERE p.published=1 ";
		return $db->get_by_sql($sql);
	}
	
	function getAllPackages($offset, $per_page){
		global $db;
		$sql  = "SELECT * FROM packages  ";
		$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		return $db->get_by_sql($sql);
	}	
			
	function getPackages($offset=0, $per_page=0){
		global $db;
		$sql  = "SELECT id, title AS name, image, title AS title, description, published, duration FROM packages WHERE published=1  ";
		if($per_page>0){
			$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		}
		return $db->get_by_sql($sql);
	}	
	
	function getFrIdByUserId($user_id){
		global $db;
		$sql  = "SELECT id FROM franchises WHERE user_id={$user_id} ";
		return $db->get_by_sql($sql);
	}
	
	function getClientAssignments($user_id){
		global $db;
		$sql  = "SELECT a.* FROM clients AS c INNER JOIN packages_detail AS pd ON (c.package_id=pd.id) ";		
		$sql  .= "INNER JOIN assignments AS a ON (c.package_id=a.package_id) WHERE c.user_id = {$user_id} ";
		return $db->get_by_sql($sql);
	}

	function getFranchiseList(){
		global $db;
		$sql  = "SELECT u.*, f.id AS fid, f.name AS franchise_name FROM users AS u INNER JOIN franchises AS f ON (u.id = f.user_id) ";
		$sql  .= " WHERE u.published=1 AND f.published=1 AND user_group='franchise'  ";
		return $db->get_by_sql($sql);
	}

	function getFranchisesList(){
		global $db;
		$sql  = "SELECT u.id, u.login_name AS name, u.city, u.address FROM users AS u INNER JOIN franchises AS f ON (u.id = f.user_id) ";
		$sql  .= " WHERE u.published=1 AND f.published=1 AND user_group='franchise' ";
		return $db->get_by_sql($sql);
	}

	function getAllClientsFranchise($franchise_id, $offset, $per_page){
		global $db;
		$sql  = "SELECT u.*, ct.name AS country_name FROM users AS u INNER JOIN clients AS c ON (u.id=c.user_id) INNER JOIN countries AS ct ON(u.country=ct.id) ";
		$sql  .= "WHERE franchise_id = {$franchise_id} AND registration_status ='registered' ";
		$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		return $db->get_by_sql($sql);
	}

	function getClients(){
		global $db;
		$sql  = "SELECT u.*, c.id AS cid FROM users AS u JOIN clients AS c ON (u.id = c.user_id) ";
		$sql  .= "WHERE user_group = 'client' AND registration_status='registered' AND u.published=1  ";
		return $db->get_by_sql($sql);
	}

	function getClientsList(){
		global $db;
		$sql  = "SELECT id, login_name AS name FROM users ";
		$sql  .= "WHERE user_group = 'client' AND registration_status='registered' AND published=1  ";
		return $db->get_by_sql($sql);
	}

	function getAllClients($offset=-1, $per_page=-1,$state=''){
		global $db;
		if ($state!=''){
			$status=" AND registration_status='{$state}' ";
		}else{
			$status="";
		}
		$sql  = "SELECT u.*, c.id AS cid, c.franchise_id, c.package_id, c.image, c.activation_date, c.due_date, ";
		$sql  .= "pd.fee, balance ";
		$sql  .= "FROM users AS u LEFT JOIN clients AS c ON (u.id = c.user_id) ";
		$sql  .= "LEFT JOIN packages_detail AS pd ON (c.package_id=pd.id) ";
		$sql  .= "LEFT JOIN accounts AS ac ON (u.id=ac.user_id) ";
		$sql  .= "WHERE user_group = 'client' {$status} ";
		if ($offset>=0 && $per_page>0){
			$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		} 
		return $db->get_by_sql($sql);
	}
	
	function searchClients($offset, $per_page,$from='', $to='', $client, $package=0, $franchise=0, $state=''){
		global $db;
		$status="";
		$from_date="";
		$to_date="";
		if ($state!=''){
			if ($state=='pending' || $state=='registered' || $state=='franchise_verified'){
				$status=" AND registration_status='{$state}' ";
			}elseif($state=='0'){
				$status=" AND u.published=0 ";
			}elseif($state=='1'){
				$status=" AND u.published=1 ";
			}
		}
		if ($from!=''){
			$from_date="AND c.activation_date > '{$from}' ";
		}
		
		if ($to!=''){
			$to_date="AND c.activation_date < '{$to}' ";
		}
		if ($client!=''){
			$client="AND u.name LIKE '%{$client}%' ";
		}else{
			$client=" ";
		}
		if ($franchise!=0){
			$franchise="AND c.franchise_id = '{$franchise}' ";
		}else{$franchise='';}
		if ($package!=0){
			$package="AND c.package_id = '{$package}' ";
		}else{$package='';}
		
		$sql  = "SELECT u.*, c.id AS cid, c.package_id, balance, fr.name AS franchise_name ";
		$sql  .= "FROM users AS u LEFT JOIN clients AS c ON (u.id = c.user_id) ";
		$sql  .= "LEFT JOIN accounts AS ac ON (u.id = ac.user_id) ";
		$sql  .= "LEFT JOIN users AS fr ON (c.franchise_id = fr.id) ";
		$sql  .= "WHERE u.user_group = 'client' {$from_date} {$to_date}  {$client} {$status} {$franchise} {$package} ";
		$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		return $db->get_by_sql($sql);
	}

	
	function getEmailByFranchiseId($franchise_id){
		global $db;
		$sql  = "SELECT e_mail from users AS u INNER JOIN franchises AS f ON (u.id=f.user_id) WHERE f.id='{$franchise_id}' LIMIT 1 ";
		return $db->get_by_sql($sql);
	}
	
	function getAccountRegister($account=0, $offset, $per_page){
		global $db;
		if ($account>0){
			$where = " WHERE from_account = {$account} OR to_account = {$account} ";
		}else{
			$where = "";
		}
		$sql  = "SELECT a.*, fu.name AS user_from, tu.name AS user_to, fu.user_group AS from_group, tu.user_group AS to_group FROM users AS fu ";
		$sql  .= "INNER JOIN accounts_register AS a ON (fu.id=a.from_account) INNER JOIN users AS tu ON (tu.id=a.to_account) ";
		$sql  .= "{$where} ORDER BY transaction_date DESC ";
		$sql .= "LIMIT {$per_page} OFFSET {$offset} ";
		//echo $sql;
		
		$rows = $db->get_by_sql($sql);
		if ($rows) {
			$rows_list = array();
			$counter=0;
			foreach ($rows as $row ) {
			  $rows_list[$counter]['transaction_date'] = $row['transaction_date'];
			  $rows_list[$counter]['perticullar'] = 'To ' . ucfirst($row['to_group'] )
					. ' ' . $row['transaction_type'] . ' ' . ucfirst($row['from_group']);
				
				$rows_list[$counter]['credit'] = '';
				$rows_list[$counter]['debit'] = '';
			    $rows_list[$counter]['user_from'] = $row['user_from'];
			    $rows_list[$counter]['user_to'] = $row['user_to'];
				if ($account==0){
					if($row['to_account']>0){
						$rows_list[$counter]['credit'] = $row['amount'];
						$rows_list[$counter]['amount'] = $row['from_balance'];

					}elseif($row['from_account']>0){
						$rows_list[$counter]['debit'] = $row['amount'];

						$rows_list[$counter]['amount'] = $row['to_balance'];
					}
				}else{

					if($row['to_account']==$account){
						$rows_list[$counter]['credit'] = $row['amount'];
						$rows_list[$counter]['amount'] = $row['from_balance'];

					}elseif($row['from_account']==$account){
						$rows_list[$counter]['debit'] = $row['amount'];
						$rows_list[$counter]['amount'] = $row['to_balance'];
					}			  
				}
			  
			  //$rows_list[$counter]['balance'] = ;
			  $rows_list[$counter]['cr_dr'] = $row['cr_dr'];
			  $counter++;
			}
			return $rows_list;
		}else{
			return false;
		}
	}
function save($o, $n){
		$old=md5($o);
		$new=md5($n);
		$user_name = $_SESSION['username'];
		if (checkPassword($user_name, $old)){
			global $db;
			$sql  = "UPDATE users SET password='{$new}' ";
			$sql .= "WHERE login_name = '{$user_name}' ";
			return $db->update_by_sql($sql);
		}else{
			return false;
		}
}

function checkPassword($user_name, $password){
		global $db;
		$sql  = "SELECT name FROM users ";
		$sql .= "WHERE login_name = '{$user_name}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "LIMIT 1";
		return $db->get_by_sql($sql);
}


function getPackage($id){
	global $db;
	$sql  = "SELECT pd.*, p.id AS pid, p.title, p.image, p.description, p.published, p.duration FROM packages AS p INNER JOIN packages_detail AS pd ON (p.id=pd.package_id) ";
	$sql  .= "WHERE pd.id = {$id} ";
	$sql .= "LIMIT 1";
	return $db->get_by_sql($sql);
}

function getMainPackage($id){
	global $db;
	$sql  = "SELECT * FROM packages WHERE id={$id} AND published=1 ";
	$sql .= "LIMIT 1";
	return $db->get_by_sql($sql);
}

function count_all($tableName, $where=null) {	
	global $db;
	$sql  = "SELECT COUNT(*) FROM {$tableName} ";
	if ($where != null){
		$sql  .= "WHERE {$where}";	
	}
	return $db->get_by_sql($sql);
}	

	function deleteUser($id){
		global $db;
		$msg = array();
		$sql  = "DELETE FROM clients WHERE user_id={$id}";
		if($db->delete_by_sql($sql)){
			$msg[] = '<span class="message" >Client data removed</span>';
		}
		$sql  = "DELETE FROM accounts WHERE user_id={$id}";
		if($db->delete_by_sql($sql)){
			$msg[] = '<span class="message" >Account data removed</span>';
		}
		$sql  = "DELETE FROM client_requests WHERE user_id={$id}";
		if($db->delete_by_sql($sql)){
			$msg[] = '<span class="message" >Client request data removed</span>';
		}
		$sql  = "DELETE FROM distributors WHERE user_id={$id}";
		if($db->delete_by_sql($sql)){
			$msg[] = '<span class="message" >Distributor data removed</span>';
		}
		$sql  = "DELETE FROM franchises WHERE user_id={$id}";
		if($db->delete_by_sql($sql)){
			$msg[] = '<span class="message" >Franchise data removed</span>';
		}
		$sql  = "DELETE FROM messages WHERE user_id={$id}";
		if($db->delete_by_sql($sql)){
			$msg[] = '<span class="message" >Messages data removed</span>';
		}
		$sql  = "DELETE FROM submit_assignments WHERE client_id={$id}";
		if($db->delete_by_sql($sql)){
			$msg[] = '<span class="message" >Assignment data removed</span>';
		}
		$sql  = "DELETE FROM vouchers WHERE user_id={$id}";
		if($db->delete_by_sql($sql)){
			$msg[] = '<span class="message" >Vouchers data removed</span>';
		}
		$sql  = "DELETE FROM withdraw_requests WHERE user_id={$id}";
		if($db->delete_by_sql($sql)){
			$msg[] = '<span class="message" >Client data removed</span>';
		}
		$sql  = "DELETE FROM users WHERE id={$id}";
		if($db->delete_by_sql($sql)){
			$msg[] = '<span class="message" >User removed successfully</span>';
		}
		Session::setMessages($msg);
		if(empty($msg)){
			$msg[]='<span class="" >User doest not remove</span>';
			return $msg;
		}else{
			return $msg;
		}
	}
	
	function getBalance($id){
		global $db;
		$sql  = "SELECT balance FROM accounts ";
		$sql .= "WHERE user_id = {$id} ";
		$sql .= "LIMIT 1";
		return $db->get_by_sql($sql);
	}

?>