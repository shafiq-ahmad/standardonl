<?php
defined('_MEXEC') or die ('Restricted Access');
global $v_view;
$class = '';

?>
<?php
	$messages = Session::getMessages();
	if(!empty($messages)){
		echo '<div id="messages">';
			foreach ($messages as $msg){
				echo $msg . '<br />';
			}
		echo '</div>';
	}
?>
<style>
	.loginBox {margin-top:20px;}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$("#login-form").validate({
	rules: { field: {required: true, number: true} }
	});
});
</script>
<div class="loginBox" style="width:400px;">
	<h3>Enter your Username Password</h3>
	<form action="index.php?option=users&view=login" class="loginFrm" id="login-form" method="post" style="width:400px;">
		<p style="width:300px;"><label>User name</label><input id="username" type="text" class="required typeInput" name="username" style="width:175px;" /></p>
		<p style="width:300px;"><label>Password</label><input id="password" type="password" class="required typeInput" name="password" style="width:175px;" /></p>
		<p style="width:300px;"><a href="index.php?option=users&view=forget" class="forgetTxt">Forget password?</a></p>
		<p style="width:300px;"><input type="submit" class="sub-Botton" value="Login" name="login" /></p>
	</form>
</div>