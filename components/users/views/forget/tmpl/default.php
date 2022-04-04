<?php
defined('_MEXEC') or die ('Restricted Access');

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
	fieldset {border:1px solid gray; padding:20px 10px;}
	#or {text-align:center; font-size:1.2em; font-weight:bold;}
</style>

<script type="text/javascript">
$(document).ready(function(){
	$("#get-code").validate({
	rules: { field: {required: true, number: true} }
	});
	
	$("#submit-code").validate({
	rules: { field: {required: true, number: true} }
	});

});
</script>
<fieldset>
<legend>Enter the email address</legend>
<p>Please enter the email address for your account. A verification code will be sent to you.
Once you have received the verification code, you will be able
to choose a new password for your account.</p>
<form id="get-code" method="post" action="index.php?option=users&view=forget">
	<div>
		<span><label>E-mail Address</label></span><span><input type="text" class="email required inputbox" name="email" value="" id="email" size="25" /></span>
		<span><input type="submit" name="submit_mail" id="submit_mail" value="Submit" /></span>
	</div>
</form>
</fieldset>

<div id="or">-OR-</div>
<fieldset>
<legend>Reset Password</legend>
<form id="submit-code" method="post" action="index.php?option=users&view=forget">
	<div>
		<p><span><label>Verification code</label></span><span><input type="text" class="required inputbox" name="vari_code" value="" id="vari_code" size="25" /></span></p>
		<p><label>New Password: </label><input id="new-pass" class="required inputbox" type="password" name="new_password" value="" size="15" /></p>
		<p><label>Confirm Password: </label><input id="confirm-pass" class="required inputbox" type="password" name="confirm_password" value="" size="15" /></p>
		<p><span><input type="submit" name="submit_code" id="submit_code" value="Submit" /></span></p>
	</div>
</form>
</fieldset>

