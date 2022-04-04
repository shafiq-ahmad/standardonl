<?php
defined('_MEXEC') or die ('Restricted Access');

?>

  <script type="text/javascript">
	window.addEvent('domready', function () {
		document.getElementById('form-login').username.select();
		document.getElementById('form-login').username.focus();
	});
</script>
	<div id="content-box">
			<div id="element-box" class="login">
				<div class="m wbg">
					<h1>Administration Login</h1>
					
<div id="system-message-container"><?php echo $message; ?>
</div>
							<div id="section-box">
			<div class="m">
				<form action="index.php" method="post" id="form-login">
	<fieldset class="loginform">

				<label id="mod-login-username-lbl" for="mod-login-username">User Name</label>
				<input name="username" id="mod-login-username" class="inputbox" size="15" type="text">

				<label id="mod-login-password-lbl" for="password">Password</label>
				<input name="password" id="password" class="inputbox" size="15" type="password">

				<div class="button-holder">
					<div class="button1">
						<div class="next">
							<a href="#" onclick="document.getElementById('submit').click();">
								Log in</a>
						</div>
					</div>
				</div>

		<div class="clr"></div>
							<!-- <input type="submit" value="Log in" name="login" /> -->
		<input  id="submit"class="hidebtn" value="Log in" type="submit" name="login" />
		<input name="option" value="login" type="hidden">
		<input name="task" value="login" type="hidden"></fieldset>
</form>
				<div class="clr"></div>
			</div>
		</div>
		
					<p>Use a valid username and password to gain access to the administrator backend.</p>
					<p><a href="">Go to site home page.</a></p>
					<div id="lock"></div>
				</div>
			</div>
			<noscript>
				Warning! JavaScript must be enabled for proper operation of the Administrator backend.			</noscript>
	</div>

