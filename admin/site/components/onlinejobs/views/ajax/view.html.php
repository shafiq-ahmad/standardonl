<?php
defined('_MEXEC') or die ('Restricted Access');
global $user_name;
global $id;
global $layout;
$sel_row=array();

$from='';
$to='';
$client='';
$search_status='';
$package='';
$franchise='';

if(isset($_GET['getList'])){
	if($_GET['getList']!=''){
		$getList = $_GET['getList'];
	}
}else{$getList='';}

if($getList=="clients"){
	$_list = getClientsList();
}else{
	$_list = getFranchisesList();
}

if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
?>