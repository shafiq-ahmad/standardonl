<?php
defined('_MEXEC') or die ('Restricted Access');

// System Check




// System Startup
require_once LIB_PATH . DS . 'import.php';
    
if ($task != '') {$layout='default_'.$task;}else{$layout='default';}

 
 require_once "login.php";
if (!$session->is_logged_in() && $session->getAdminType()!='franchise') { 
	$v_option='login';
}else{
	$user_id = $_SESSION['user_id'];
	$user_name = $_SESSION['username'];
	//echo $user_id;
	$account=getAccountByUserId($user_id);
	$balance=$account[0]['balance'];
	$fr=getFrIdByUserId($user_id);
	$franchise_id=$fr[0]['id'];
}


