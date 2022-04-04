<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $layout;
$sel_row=array();




if($task=='fee'){
	$layout='default_'.$task;
	$row = getAjaxPackage($id);
}


if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
?>
