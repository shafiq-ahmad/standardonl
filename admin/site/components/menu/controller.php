<?php
defined('_MEXEC') or die ('Restricted Access');

$message='';

//if (file_exists("models/{$v_view}.php")) {
	include_once "models/{$v_view}.php";
//}

function display(){
	global $v_view;
	global $task;
	global $layout;

	require_once("views/" . $v_view . "/view.html.php");
}


?>
