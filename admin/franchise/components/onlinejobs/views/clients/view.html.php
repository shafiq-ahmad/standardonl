<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $franchise_id;
global $layout;
global $user_id;
$sel_row=array();
$message_sent = false;

//echo $user_id;

function validateClientFields($tsk){
	if ($_POST["name"] != "" ){//&& $_POST["address"] != "" && $_POST["city"] != "" && $_POST["country"] != "" && $_POST["published"] != "" ){
		$fields=array();
		$fields['franchise'] = $_POST["franchise"];
		$fields['name'] = $_POST["name"];
		$fields['phone'] = $_POST["phone"];
		$fields['cell'] = $_POST["cell"];
		$fields['email'] = $_POST["email"];
		$fields['website'] = $_POST["website"];
		$fields['zipcode'] = $_POST["zipcode"];
		$fields['address'] = $_POST["address"];
		$fields['city'] = $_POST["city"];
		$fields['country'] = $_POST["country"];
		if($tsk=='edit'){
			if (isset($_POST["id"])){
				$id = $_POST["id"];
				return updateClient($fields, $id);
			}
			return false;
		}else{
			return newClient($fields);
		}
		return false;
	}else{
		return false;
	}
}

function validateUserFields($tsk){
	global $message;
	global $user_id;
	global $user;
	if ($_POST["name"] != "" && $_POST["login_name"] != "" && $_POST["email"] != "" && $_POST["password"] != ""  && $_POST["cnic"] != "" && $_POST["phone"] != ""  && $_POST["address"] != "" && $_POST["amount"] != ""  ){
			
				//echo $user_name;
				echo $_POST["password"];
				echo $_POST["login_name"];
			$isValidAccount=validateAmount($_POST["package"], $user_id);
			if ($isValidAccount ==0){
				$message = "<span class=\"error\">Insufficent Account balance to register a client.</span>";
				Session::setMessages($message );
				return false;
			}
			$fields=array();
			$fields['name'] = $_POST["name"];
			$fields['login_name'] = $_POST["login_name"];
			$fields['email'] = $_POST["email"];
			$fields['cnic'] = $_POST["cnic"];
			$fields['password'] = $_POST["password"];
			$fields['phone'] = $_POST["phone"];
			$fields['franchise'] = $user_id;
			if (isset($_POST["client"])){
				$fields['client'] = $_POST["client"];
			}
			$fields['package'] = $_POST["package"];
			$fields['address'] = $_POST["address"];
			$fields['city'] = $_POST["city"];
			$fields['country'] = $_POST["country"];
			$fields['request'] = $_POST["request"];
			$fields['amount'] = $isValidAccount;
			$fields['registration_status'] = 'franchise_verified';
			if($tsk=='add'){
				$isValidUser=$user->validateUser($_POST["login_name"], $_POST["email"]);
				if ($isValidUser != ''){
					$message = "<span class=\"error\">{$isValidUser}</span>";
					Session::setMessages($message );
					return false;
				}
				return registerUser($fields);
			}elseif($tsk=='approve'){
			if (isset($_POST["id"])){
				$id = $_POST["id"];
				$fields['id'] = $id;
				return registerUser($fields, 'update');
			}
		}
		//}
		return false;
	}else{
		return false;
	}
}


function addUser(){
	global $message;
	if (validateUserFields("add") && $_POST['password'] == $_POST['confirm_password']){
		$message = '<span class="message">User Registered successfull. </span>';
		$message_sent = true;
		Session::setMessages($message );
		//redirect($link);
	}else{
		if ($message == ''){
		$message = '<span class="error">User Registration failed.</span>';
		}
		$message_sent = false;
		Session::setMessages($message );
		//redirect($link);
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
	$result=$user->authenticate_franchise($user_name, $pass);
	if ($result){
		if (validateUserFields("approve")){
			$message = '<span class="message">Client approved successfuly.</span>';
			Session::setMessages($message );
			//redirect($link);
		}else{
			$message = '<span class="error">Client approve failed.</span>';
			Session::setMessages($message );
			//redirect($link);
		}
	}else{
		$message = '<span class="error">Invalid Password try again.</span>';
		Session::setMessages($message );
		//redirect($link);
	}
}


if (isset($_POST["register_user"])){
	addUser();
}

if (isset($_POST["approve_client"])){
	verifyClient();
}

$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
$per_page = 20;
$x = count_all('clients');
$total_count = $x[0];
$pagination = new Pagination($page, $per_page, $total_count);
	
$rows = getAllClientsFranchise($user_id, $pagination->offset(), $per_page);
$pending_clients=getPendingClients($user_id);

$franchise_list = getFranchiseList();
$country_list = getCountryList();
$packages_list = getPackageList();
$clients_list = getClientsList();

if($task=='edit' || $task=='delete'){
	if(isset($id)&& $id>0){
		$sel_row = getClients($id);
	}else{$layout='default';}
}elseif($task=='approve'){
	if(isset($id)&& $id>0){
		$sel_row = getPendingClient($id);
	}
}else


if($task=='register'){
	if(isset($id)&& $id>0){
		$sel_row = getUsers($id);
	}else{$layout='default';}
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
