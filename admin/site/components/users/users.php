<?php
defined('_MEXEC') or die ('Restricted Access');

if ($session->is_logged_in()) {
	require_once("controller.php");

	display();
}
	
?>
