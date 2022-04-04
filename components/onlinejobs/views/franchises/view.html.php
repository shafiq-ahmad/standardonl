<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $layout;
$sel_row=array();


$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
$per_page = 10;
$x = count_all('franchises');
$total_count = $x[0][0];
$pagination = new Pagination($page, $per_page, $total_count);
	
$rows = getAllFranchises($pagination->offset(), $per_page);

if($task=='edit' || $task=='delete'){
	if(isset($id)&& $id>0){
		$sel_row = getFranchise($id);
	}else{$layout='default';}
}
		//print_r ($sel_row);
if(isset($_GET['published'])){
	$publish=$_GET['published'];
	setPublish($id, $publish);
}
if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
?>
