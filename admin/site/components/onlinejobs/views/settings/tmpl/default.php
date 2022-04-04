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
			<h1><span>Settings</span></h1>
			<div id="content-wrapper">
				<div class="form">
					<form id="save-settings" action="index.php?option=onlinejobs&view=settings" method="post">
						<div style="width:46%;">
						<fieldset class="form">
							<legend>System Mailer Settings</legend>
								<p><label>E-mail: </label><input id="email" class="inputbox" type="text" name="email" value="<?php echo $rows[0]['e_mail']; ?>" size="35" />
								<label>Password: </label><input id="password_" class="inputbox" type="password" name="password" value="<?php echo $rows[0]['password']; ?>" size="25" /></p>
								
							<div class="cleaner"></div>
						</fieldset>
						<fieldset class="form">
							<legend>Other Settings</legend>
								<p><label>Min Withdraw amount: </label><input id="email" class="inputbox" type="text" name="min_withdraw" value="<?php echo $rows[0]['min_withdraw']; ?>" size="35" />
								
							<div class="cleaner"></div>
						</fieldset>						

						<fieldset>
							<div class="form-button">
								<span><input type="reset" name="reset" value="Cancel" onclick="history.back()" /></span>
								<span><input type="reset" name="reset" value="Reset" /></span>
								<span><input type="submit" name="save_settings" value="Update" /></span>
							</div>
						</fieldset>
						</div>
					</form>
				</div>

				
			</div>
        </div>

	</div>
