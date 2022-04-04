<?php
defined('_MEXEC') or die ('Restricted Access');

// System Check



// System Startup

require_once LIB_PATH . DS . 'import.php';
//global $v_option;
//global $v_view;
//global $task;
   
if ($task != '') {$layout='default_'.$task;}else{$layout='default';}
 
require_once "login.php";

if (!$session->is_logged_in() && $session->getAdminType()!='site') { 
	//redirect("index.php?option=login"); 
	$v_option='login';
}else{
	$user_id = $_SESSION['user_id'];
	$user_name = $_SESSION['username'];
}
 /* if(isset($_SESSION['admin']) && isset($_SESSION['username'])){
	if($_SESSION['admin'] == 'site'){
		$user_name = $_SESSION['username'];
		$full_name = $_SESSION['fullname'];
		define('USERNAME', $full_name);
	}else{
		require_once 'components/login/login.php';
		exit;	
	}
 }else{
	exit;
 }
 
*/

 