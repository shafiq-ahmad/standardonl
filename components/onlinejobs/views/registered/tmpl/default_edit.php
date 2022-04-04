<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div class="ic"></div>
		<div id="content">
			<h1><span>Edit Franchise</span></h1>
			<div id="message">
				<?php
					global $message;
					//global $sel_row;
					echo $message;
				?>
			</div>
			<div id="content-wrapper">
				<div class="table">
					<form id="edit-franchise" action="index.php?option=onlinejobs&view=franchises&task=edit" method="post">
						<fieldset class="form">
							<div class="column cols-2" id="column1">
								<input id="id" type="hidden" name="id" value="<?php echo $sel_row[0]['id']; ?>"/>
								<p><label>Name: </label><input id="name" class="inputbox form-field" type="text" name="name" value="<?php echo $sel_row[0]['name']; ?>" size="15" /></p>
								<p><label>Phone #: </label><input id="phone" class="inputbox form-field" type="text" name="phone" value="<?php echo $sel_row[0]['phone']; ?>" size="15" /></p>
								<p><label>Cell #: </label><input id="cell" class="inputbox form-field" type="text" name="cell" value="<?php echo $sel_row[0]['cell']; ?>" size="15" /></p>
								<p><label>E-mail: </label><input id="email" class="inputbox form-field" type="text" name="email" value="<?php echo $sel_row[0]['e_mail']; ?>" size="15" /></p>
								<p><label>Web site: </label><input id="website" class="inputbox form-field" type="text" name="website" value="<?php echo $sel_row[0]['web_site']; ?>" size="15" /></p>
							</div>
							<div class="column cols-2" id="column2">
								<p><label>Zip Code: </label><input id="zipcode" class="inputbox form-field" type="text" name="zipcode" value="<?php echo $sel_row[0]['zip_code']; ?>" size="15" /></p>
								<p><label>Address: </label><input id="address" class="inputbox form-field" type="text" name="address" value="<?php echo $sel_row[0]['address']; ?>" size="15" /></p>
								<p><label>City: </label><input id="city" class="inputbox form-field" type="text" name="city" value="<?php echo $sel_row[0]['city']; ?>" size="15" /></p>
								<p><label>Country: </label><input id="country" class="inputbox form-field" type="text" name="country" value="<?php echo $sel_row[0]['country']; ?>" size="15" /></p>
								<p><label>Publish: </label><input id="published" class="inputbox form-field" type="text" name="published" value="<?php echo $sel_row[0]['published']; ?>" size="15" /></p>
							</div>
							<div class="cleaner"></div>
							<div class="form-button">
								<span><input type="reset" name="reset" value="Cancel" onclick="history.back()" /></span>
								<span><input type="reset" name="reset" value="Reset" /></span>
								<span><input type="submit" name="edit_franchise" value="Update" /></span>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
        </div>

	</div>
