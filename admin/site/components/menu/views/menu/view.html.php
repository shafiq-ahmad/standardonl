<?php
defined('_MEXEC') or die ('Restricted Access');
global $user_name;
global $id;
global $layout;
$sel_row=array();


function validateMenuFields($tsk){
	if ($_POST["name"] != "" ){
		$fields=array();
		if (isset($_POST["franchise"])){$fields['franchise'] = $_POST["franchise"];}
		
		$fields['package'] = $_POST["package"];
		$fields['name'] = $_POST["name"];
		$fields['phone'] = $_POST["phone"];
		$fields['cell'] = $_POST["cell"];
		$fields['email'] = $_POST["email"];
		$fields['website'] = $_POST["website"];
		$fields['zipcode'] = $_POST["zipcode"];
		$fields['address'] = $_POST["address"];
		$fields['city'] = $_POST["city"];
		$fields['client'] = $_POST["ref_client"];
		
		$fields['country'] = $_POST["country"];
		if($tsk=='edit'){
			if (isset($_POST["id"])){
				$id = $_POST["id"];
				return updateMenu($fields, $id);
			}
			return false;
		}else{
			return newMenu($fields);
		}
		return false;
	}else{
		return false;
	}
}


function addMenu(){
	global $message;
	if (validateMenuFields("add")){
		//save();
		$message = '<span class="message">Menu added successfuly.</span>';
	}else{
		$message = '<span class="error">Menu add failed.</span>';
		//exit;
	}
}

function editMenu(){
	global $message;
	if (validateMenuFields("edit")){
		//save();
		$message = '<span class="message">Menu changed successfuly.</span>';
		header("Location: index.php?option=onlinejobs&view=clients");
	}else{
		$message = '<span class="error">Menu change failed.</span>';
		//exit;
	}
}

if (isset($_POST["add_menu"])){
	addMenu();
}

if (isset($_POST["edit_menu"])){
	editMenu();
}

if (isset($_POST["delete_menu"])){
	global $message;
	$id=$_POST["id"];
	if (deletemenu($id)){
		//save();
		$message = '<span class="message">Menu deleted successfuly.</span>';
		header("Location: index.php?option=menu&view=menu");
	}else{
		$message = '<span class="error">Menu deletion failed.</span>';
		header("Location: index.php?option=menu&view=menu");
		//exit;
	}
}

$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
$per_page = 20;
$x = count_all('menu');
$total_count = $x[0];
$pagination = new Pagination($page, $per_page, $total_count);


$rows = getMenus();

//$packages = getPackagesList();

if($task=='edit' || $task=='delete'){
	if(isset($id)&& $id>0){
		$sel_row = getMenu($id);
	}
}

if(isset($_GET['published'])){
	$publish=$_GET['published'];
	setPublish("menu", $id, $publish);
}
if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
?>

	


