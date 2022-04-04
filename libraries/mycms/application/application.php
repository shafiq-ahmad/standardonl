<?php
defined('_MEXEC') or die ('Restricted Access');



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
  
if (isset($_GET["ItemID"])){
	$id = $_GET["ItemID"];
}else{
	$id = 0;
}
$link = 'index.php?option=' . $v_option . '&view=' . $v_view;

?>