<?php
defined('_MEXEC') or die ('Restricted Access');


class Services {

	//public $total_count;

	public function __construct(){
		$this->loadServices();
	}

	public function loadServices() {
		if($this->paymentService()){
			return true;
		}
	}

	public function paymentService(){
		$dt = time();
		$now = strftime("%Y-%m-%d", $dt);
		//$next_due = strftime("%Y-%m-%d", $dt + (60*60*24*30));
		$clients = getAllClients(-1, -1, 'registered');
		$a = array();
		foreach ($clients as $client){
			$next_due = $this->next_date($client['due_date']);
			if ($now >= $client['due_date']){
				//echo floor(22.93333). '<br />';
				$a['id']=$client['id'];
				$a['name']=$client['name'];
				$a['fee']=$client['fee'];
				$a['user_group']=$client['user_group'];
				
				$user = getElementById('users',$a['id']);
				$admin = getElementById('users',1);
				$a['user_mail']=$user[0]['e_mail'];
				$a['admin_mail']=$admin[0]['e_mail'];
				
				//print_r($client);
				if (transferAccount($a['id'], 1, $a['fee'], $a['user_group'], 'admin', 'Monthly fee', 'Cr', '')){
					global $db;
					$sql  = "UPDATE clients SET due_date='{$next_due}' ";
					$sql .= "WHERE user_id = {$a['id']} ";
					if (!$db->update_by_sql($sql)) {
						return false;
					}
				
					$msg = "<h2>Monthly fee received from {$a['name']} </h2>";
					$msg .= "<p>Amount: {$a['fee']} </p>";
					if (!empty($messages)){
						foreach ($messages as $message){
							$msg .= $message . "<br />";
						}
					}
					//sendEmail($a['admin_mail'], $msg);
					$msg = "<h2>Monthly fee Charged from your account</h2>";
					$msg .= "<p>Amount: {$a['fee']} </p>";
					//sendEmail($a['user_mail'], $msg);
				}else{
					$msg = "<h2 style=\"color:red;\">Monthly fee receive from {$a['name']} failed.</h2>";
					$msg .= "<p>Amount: {$a['fee']} </p>";
					if (!empty($messages)){
						foreach ($messages as $message){
							$msg .= $message . "<br />";
						}
					}
					//sendEmail($a['admin_mail'], $msg);
				}
			}
		}
	}
	
	function add_date($givendate,$day=0,$mth=0,$yr=0) {
		$cd = strtotime($givendate);
		$newdate = date('Y-m-d', mktime(date('h',$cd),
		date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
		date('d',$cd)+$day, date('Y',$cd)+$yr));
		return $newdate;
	}
	
	function next_date($givendate) {
		$cd = strtotime($givendate);
		$day = date('d',$cd);
		if ($day>27){
			$newdate = date('Y-m-d', mktime(0, 0, 0, date('m',$cd)+1, 28, date('Y',$cd)));
		}else{
			$newdate = date('Y-m-d', mktime(0, 0, 0, date('m',$cd), 28, date('Y',$cd)));
		}
		return $newdate;
	}
}


$services = new Services();


?>