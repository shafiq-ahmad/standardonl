<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $user_id;
global $franchise_id;
global $layout;
$sel_row=array();
global $login;

if (!$login){
	header("Location: index.php");
	exit;
}


$user_id = $_SESSION['user_id'];

$client = getClient($user_id);


function validateWithdrawFundFields($tsk){
	$settings = getSettings(); 
	$limit = $settings[0]['min_withdraw'];
	$user_id = $_SESSION['user_id'];
	$account = getAccountByUserId($user_id);
	if ($account){
		$balance = $account[0]['balance'];
	}
	//echo $_POST["amount"] .'-'. $limit . ' - '. $balance ;
	if ($_POST["amount"] != "" ){
		$fields=array();
		$fields['amount'] = $_POST["amount"];
		$fields['user_id'] = $user_id;
		$fields['note'] = $_POST["note"];
		if($tsk=='requestAmount'){
			if($_POST["amount"] < $limit || $balance < $_POST["amount"] ){
				$message = '<span class="error">Amount Request is less then (Min withdraw Limit).</span>';
				return false;
			}
		
			if (isset($user_id)){
				$id = $user_id;
				return submitAmountRequest($fields);
			}
			return false;
		}else{
			//return newFranchise($fields);
		}
		return false;
	}else{
		return false;
	}
}

function submitAssingmentFile(){
	$user_id = $_SESSION['user_id'];
	if ((($_FILES["file"]["type"] == "text/plain") ))
	{
	if ($_FILES["file"]["error"] > 0)
	 {
	 echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
	 }
	else
	 {
	 
	if (!is_dir(ROOT_PATH . DS . "uploads" . DS . $user_id . DS . "assignments"  )){
		mkdir(ROOT_PATH . DS . "uploads" . DS . $user_id . DS . "assignments" ,0777,true);
	}
	
	
	 if (file_exists(ROOT_PATH . DS . "uploads" . DS . $user_id . DS . "assignments" . DS . $_FILES["file"]["name"]))
	   {
	   echo $_FILES["file"]["name"] . " already exists. ";
	   }
	 else
	   {
	   move_uploaded_file($_FILES["file"]["tmp_name"],
	   ROOT_PATH . DS . "uploads" . DS . $user_id . DS . "assignments" . DS . $_FILES["file"]["name"]);
	   $file_name = $_FILES["file"]["name"];
	   $assignment_id = $_POST["assignment"];
	   
	   saveAssignmet($file_name, $user_id, $assignment_id);
	   }
	 }
	}
	else
	{
	echo "Invalid file type, only .txt supported";
	}
}

function requestAmount(){
	global $message;

	if (validateWithdrawFundFields("requestAmount")){
		//save();
		$message = '<span class="message">Amount Requested successfuly.</span>';
	}else{
		if (empty($message)){ $message = '<span class="error">Amount Request failed.</span>';}
		//exit;
	}
}

if (isset($_SESSION['fullname'])){
	$full_name = $_SESSION['fullname'];
}else{
	header("Location: index.php");
}


function verifyClient(){
	global $user_name;
	global $message;
	if(isset($_POST["password"])){
		$pass=$_POST["password"];
	}else{
		$pass='';
	}
	$result=authenticate_franchise($user_name, $pass);
	if ($result){
		if (validateClientFields("register")){
			$message = '<span class="message">Client register successfuly.</span>';
		}else{
			$message = '<span class="error">Client register failed.</span>';
		}
	}else{$message = '<span class="error">Invalid Password try again.</span>';}
}

$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
$per_page = 20;
$x = count_all('clients');
$total_count = $x[0];
$pagination = new Pagination($page, $per_page, $total_count);
	
$rows = getSubmitAssignments($user_id); //, $pagination->offset(), $per_page);


if (isset($_POST['request_amount'])){
	requestAmount();
}elseif (isset($_POST['submit_assignment'])){
	submitAssingmentFile();
}
$currentAssignment=getClientAssignments($user_id);
$balance = 0;
$row = array_shift(getBalance($user_id));
$balance = $row['balance'];
?>
<div class="balance-top" style="font-weight:bold; text-align:right;">Account Balance: <?php echo $balance; ?></div>
<?php if($task=='edit' || $task=='delete'){
	if(isset($id)&& $id>0){
		$sel_row = getClients($id);
	}else{$layout='default';}
}elseif($task=='approve'){
	if(isset($id)&& $id>0){
		$sel_row = getClient($id);
	}
}elseif($task=='history'){
		$history = getAccountRegister($user_id, $pagination->offset(), $per_page);
}


   
   
if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
?>

 
 