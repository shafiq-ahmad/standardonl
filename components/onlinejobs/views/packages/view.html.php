<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $layout;
$sel_row=array();




if($task=='show'){
	$layout='default_'.$task;
}
$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
$per_page = 5;
$x = count_all('packages');
$total_count = $x[0][0];
$pagination = new Pagination($page, $per_page, $total_count);
	
$rows = getPackages($pagination->offset(), $per_page);

if($task=='show'){
	if(isset($id)&& $id>0){
		$sel_row = getMainPackage($id);
		$rows = $sel_row;
		$package_details = getPackageDetails($id);
		$detail_row = $package_details;
	}
}
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
