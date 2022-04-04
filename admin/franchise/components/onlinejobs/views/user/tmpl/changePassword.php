<?php
defined('_MEXEC') or die ('Restricted Access');

?>

<script>
	$(document).ready(function(){
	$("#change_password").validate({
	rules: {
	field: {
	required: true,
	number: true
	}
	}
	});
	});
</script>
	<div id="main-wrapper">
		<div class="ic"></div>
		<div id="content">
			<h1><span>Change Password</span></h1>
			<div id="content">
				<table width="45%" class="form" >
					<tr><th width="30%"></th><th width="70%"></th></tr>
					<form id="change_password" action="index.php?option=onlinejobs&view=user&task=changePassword" method="post">
						<tr><td><label>Old Password: </label></td><td><input id="old-pass" class="required inputbox" type="password" name="old_password" value="" size="15" /></td></tr>
						<tr><td><label>New Password: </label></td><td><input id="new-pass" class="required inputbox" type="password" name="new_password" value="" size="15" /></td></tr>
						<tr><td><label>Confirm Password: </label></td><td><input id="confirm-pass" class="required inputbox" type="password" name="confirm_password" value="" size="15" /></td></tr>
						<tr><td><input type="submit" name="change_password" value="Change" /></td></tr>
					</form>
				</table>
			</div>
        </div>

	</div>
