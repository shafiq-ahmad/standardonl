<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $layout;
$sel_row=array();

if (isset($_POST["delete_user"])){
	global $message;
	$id=$_POST["id"];
	if (deleteUser($id)){
		$message = '<span class="message">User deleted successfuly.</span>';
		Session::setMessages($message );
		redirect('index.php?option=users');
	}
}

if(isset($_POST['reset_password'])){
	if(validateFields()){
		$message = '<span class="message">Password reset successfuly.</span>';
		Session::setMessages($message );
		redirect('index.php?option=users');
	}
}


$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
$per_page = 20;
$x = count_all('users');
$total_count = $x[0][0];
$pagination = new Pagination($page, $per_page, $total_count);
	
$rows = getUsers($pagination->offset(), $per_page);

if($task=='edit' || $task=='delete'){
	$del_id = $_GET['ItemID'];
	if(isset($del_id)&& $del_id>0){
		$sel_row = getUser($del_id);
	}
}
if(isset($_GET['published'])){
	$publish=$_GET['published'];
	setPublish("users", $id, $publish,"franchises");
}
if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
if(isset($_POST)){unset($_POST);}
?>
