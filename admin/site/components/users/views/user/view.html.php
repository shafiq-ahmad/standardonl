<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $layout;

$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
$per_page = 20;
$x = count_all('users');
$total_count = $x[0][0];
$pagination = new Pagination($page, $per_page, $total_count);
	
$rows = getUsers($pagination->offset(), $per_page);

if(isset($_GET['published'])){
	$publish=$_GET['published'];
	setPublish("users", $id, $publish,"users");
}
if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
if(isset($_POST)){unset($_POST);}
?>
