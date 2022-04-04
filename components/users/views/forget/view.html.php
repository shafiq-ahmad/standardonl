<?php
defined('_MEXEC') or die ('Restricted Access');

global $layout;


if(isset($_POST['submit_mail'])){
	if(isset($_POST['email'])){
		if(sendCode($_POST['email'])){
			$message = '<span class="message">Activation code is sent to your e-mail successfuly.</span>';
			Session::setMessages($message );
			//redirect('index.php?option=users&view=forget');
		}else{
			$message = '<span class="error">Activation code is not sent.</span>';
			Session::setMessages($message );
			//redirect('index.php?option=users&view=forget');
		}
	}
}

if(isset($_POST['submit_code'])){
	if(isset($_POST['vari_code'])){
		$code = $_POST['vari_code'];
		$user = getUser($code);
		if(!$user){
			$message = '<span class="error">Invalid Activation code.</span>';
			Session::setMessages($message );
			redirect("index.php?option=users&view=forget");
		}
		validateFields($user['id'], $_POST['new_password'], $_POST['confirm_password']);
	}
}

if (isset($layout) && $layout != ""){
	require_once ("tmpl/{$layout}.php");
}else{
	require_once ("tmpl/default.php");
}

?>