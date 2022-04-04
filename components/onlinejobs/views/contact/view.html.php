<?php
defined('_MEXEC') or die ('Restricted Access');
global $id;
global $layout;
$sel_row=array();




function validateQuestionFields($tsk){
	if ($_POST["name"] != "" && $_POST["message_type"] != "" && $_POST["subject"] != "" ){
		$fields=array();
		$fields['name'] = $_POST["name"];
		$fields['email'] = $_POST["email"];
		$fields['message_type'] = $_POST["message_type"];
		$fields['subject'] = $_POST["subject"];
		$fields['question'] = $_POST["question"];
		if($tsk=='add'){
			return newQuestion($fields);
		}
		return false;
	}else{
		return false;
	}
}

function postQuestion(){
	global $message;
	if (validateQuestionFields("add")){
		$message = '<span class="message">Message posted successfuly.</span>';
	}else{
		$message = '<span class="error">Message post failed.</span>';
		//exit;
	}
}

$page = 1;
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
$per_page = 20;
$x = count_all('messages', 'message_type=\'question\'');
$total_count = $x[0];
$pagination = new Pagination($page, $per_page, $total_count);
	
$rows = getAllQuestions($pagination->offset(), $per_page);

if($task=='question'){
	if($id>0){
		$sel_row = getQuestion($id);
		$replies = getAllReplies($id,$pagination->offset(), $per_page);
	}
}

if(isset($_POST['post_question'])){
	postQuestion();
}

if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}
?>
