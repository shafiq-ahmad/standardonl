<?php

define('_MEXEC', 1);
define('_ADMIN', 'site');
define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', dirname(__FILE__) );


$messages=array();
$errors=array();

// Call Framework

require_once 'includes/defines.php';
require_once 'includes/framework.php';

// Template

if ($session->is_logged_in() && $session->getAdminType()=='site') {

	//global $messages;
	$messages = Session::getMessages();
	if(!empty($messages)){
		echo '<div id="messages">';
			foreach ($messages as $msg){
				echo $msg . '<br />';
			}
		echo '</div>';
	}
}
require_once 'components/' . $v_option . '/' . $v_option . '.php';

	
?>