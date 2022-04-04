<?php
defined('_MEXEC') or die ('Restricted Access');

?>
	<?php
		//global $messages;
		$messages = Session::getMessages();
		if(!empty($messages)){
			echo '<div id="messages">';
				foreach ($messages as $msg){
					echo $msg . '<br />';
				}
			echo '</div>';
		}
	?>

	<div id="main-wrapper">
		<div id="content">
			<h1><span>Reset Password</span></h1>
			<div id="content">
				<div id="frm-ch-password">
					<form id="change-password" action="index.php?option=users&view=user&task=resetPassword" method="post">
						<p><label>New Password: </label><input id="new-pass" class="inputbox" type="password" name="new_password" value="" size="15" /></p>
						<p><label>Confirm Password: </label><input id="confirm-pass" class="inputbox" type="password" name="confirm_password" value="" size="15" /></p>
						<p><input type="submit" name="reset_password" value="Change" /></p>
					</form>
				</div>
			</div>
        </div>

	</div>
