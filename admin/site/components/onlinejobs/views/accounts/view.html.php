<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;



$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
$per_page = 30;
$x = count_all('accounts_register');
$total_count = $x[0][0];
$pagination = new Pagination($page, $per_page, $total_count);

$rows = getAccountRegister($id, $pagination->offset(), $per_page);
$row = getUser($id);



require_once ("tmpl/default.php");

?>