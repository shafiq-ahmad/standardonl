<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div class="ic"></div>
		<div id="content">
			<center><h1><span>Registeration Successfull</span></h1></center>
			<div id="message">
				<?php
					global $message;
					echo $message;
				?>
			</div>
			<div id="content-wrapper">
				<div class="register-form">
					<form action="index.php?option=onlinejobs" method="post">
						<fieldset>
							<div><h3>An e-mail is sent to you mail box with an activation link, <br />
							Please follow the link to forward your registration request.</h3></div>
							<legend></legend>
							<div class="form-button">
								<span><input type="submit" name="back" value="Ok" style="min-width:40px" /></span>
							</div>
						</fieldset>
					</form>
				</div>

				
			</div>
        </div>

	</div>
