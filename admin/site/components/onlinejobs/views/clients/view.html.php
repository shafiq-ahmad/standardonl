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
if (isset($_POST["search_client"])){
	global $message;
	$from=$_POST["from"];
	$to=$_POST["to"];
	$client=$_POST["client"];
	$search_status=$_POST["status"];
	if($_POST["package"]!=0){$package=$_POST["package"];}
	$franchise=$_POST["franchise"];

}else{

}

function validateClientFields($tsk){
	if ($_POST["name"] != "" ){//&& $_POST["address"] != "" && $_POST["city"] != "" && $_POST["country"] != "" && $_POST["published"] != "" ){
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
		if(isset($_POST["ref_client"])){
			$fields['client'] = $_POST["ref_client"];
		}
		$fields['country'] = $_POST["country"];
		if($tsk=='edit'){
			if (isset($_POST["id"])){
				$id = $_POST["id"];
				return updateClient($fields, $id);
			}
			return false;
		}elseif($tsk=='register'){
			if (isset($_POST["id"])){
				$id = $_POST["id"];
				if(isset($_POST["amount"]) && $_POST["amount"] !='' ){
					$amount = $_POST["amount"];
					if ($amount > 0 ){
						return registerClient($fields, $id, $amount);
					}
				}
			}
		}else{
			return newClient($fields);
		}
		return false;
	}else{
		return false;
	}
}

function verifyClient(){
	global $user_name;
	global $user;
	global $message;
	global $link;
	if(isset($_POST["password"])){
		$pass=$_POST["password"];
	}else{
		$pass='';
	}
	$result=$user->authenticate($user_name, $pass);
	if ($result){
		if (validateClientFields("register")){
			$message = '<span class="message">Client register successfuly.</span>';
			Session::setMessages($message );
			//redirect($link);
		}else{
			$message = '<span class="error">Client register failed.</span>';
			Session::setMessages($message );
			//redirect($link);
		}
	}else{
		$message = '<span class="error">Invalid Password try again.</span>';
		Session::setMessages($message );
		//redirect($link);
		}
}

function addClient(){
	global $message;
	global $link;
	if (validateClientFields("add")){
		$message = '<span class="message">Client added successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Client add failed.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}

function editClient(){
	global $message;
	global $link;
	if (validateClientFields("edit")){
		//save();
		$message = '<span class="message">Client changed successfuly.</span>';
		Session::setMessages($message );
		//redirect($link);
	}else{
		$message = '<span class="error">Client change failed.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}

if (isset($_POST["register_client"])){
	verifyClient();
}

if (isset($_POST["add_client"])){
	addClient();
}

if (isset($_POST["edit_client"])){
	editClient();
}

if (isset($_POST["delete_client"])){
	global $messages;
	$id=$_POST["id"];
	if (deleteUser($id)){
		//redirect($link);
	}
}


if($task=='edit' || $task=='delete' || $task=='add'){
	$layout='default_'.$task;
}
$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
$per_page = 20;
$x = count_all('clients');
$total_count = $x[0][0];
$pagination = new Pagination($page, $per_page, $total_count);

if(isset($_GET['status'])){
	if($_GET['status']!=''){
		$status = $_GET['status'];
	}
}else{$status='';}

if ($status=='franchise_verified'){
	$rows = getAllPendingClients($pagination->offset(), $per_page, 'franchise_verified');
	//$rows = getAllPendingClients($pagination->offset(), $per_page, $status);	
}else{
	$rows = searchClients($pagination->offset(), $per_page,$from, $to, $client, $package, $franchise, $search_status);
}

$franchise_list = getFranchisesList();
$country_list = getCountryList();
$packages = getPackagesList();

if($task=='edit' || $task=='delete'){
	if(isset($id)&& $id>0){
		$sel_row = getClient($id);
	}
}elseif($task=='register'){
	if(isset($id)&& $id>0){
		$sel_row = getPendingClient($id);
	}
}

if(isset($_GET['published'])){
	$publish=$_GET['published'];
	setPublish("users", $id, $publish, "clients");
}
if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
?>

	


