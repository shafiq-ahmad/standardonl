<?php
defined('_MEXEC') or die ('Restricted Access');

global $layout;


if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}

?>