<?php
defined('_MEXEC') or die ('Restricted Access');

// System Check



// System Startup


require_once 'libraries' . DS . 'import.php';
$login = false;
$full_name='';
$user_id=0;
$user_name='';



if (isset($_GET["option"])){
	$v_option = $_GET["option"];
}else{
	$v_option = 'onlinejobs';
}

if (isset($_GET["view"])){
	$v_view = $_GET["view"];
}else{
	$v_view = $v_option;
}
 
if (isset($_GET["task"])){
	$task = $_GET["task"];
}else{
	$task = '';
}
  
if ($task != '') {$layout='default_'.$task;}else{$layout='default';}

if (isset($_GET["ItemID"])){
	$id = $_GET["ItemID"];
}else{
	$id = 0;
}

require_once "login.php";

if (!$session->is_logged_in() && $session->getAdminType()!='client') { 
	//$v_option='login';
}else{
	$user_id = $_SESSION['user_id'];
	$user_name = $_SESSION['username'];
	$full_name = $_SESSION['fullname'];
	define('USERNAME', $full_name);
	$login = true; 
}

 
 
?>

 