<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div class="ic"></div>
		<div id="content">
			<h1><span>Edit Distributor</span></h1>
				<?php
					//if(empty($sel_row)){redirect("index.php?option=onlinejobs&view=distributors");}
				?>
			<div id="content-wrapper">
				<div class="table">
					<form id="edit-distributor" action="index.php?option=onlinejobs&view=distributors" method="post">
						<fieldset class="form">
							<div class="column cols-2" id="column1">
								<input id="id" type="hidden" name="id" value="<?php echo $sel_row[0]['id']; ?>"/>
								<p><label for="user_name">User Name: </label><input id="user_name" class="required inputbox form-field" type="text" name="user_name" value="<?php echo $sel_row[0]['login_name']; ?>" size="15" /></p>
								<p><label>Full Name: </label><input id="full_name" class="required inputbox form-field" type="text" name="full_name" value="<?php echo $sel_row[0]['name']; ?>" size="15" /></p>
								<p><label>Phone #: </label><input id="phone" class="inputbox form-field" type="text" name="phone" value="<?php echo $sel_row[0]['phone']; ?>" size="15" /></p>
								<p><label>Cell #: </label><input id="cell" class="inputbox form-field" type="text" name="cell" value="<?php echo $sel_row[0]['cell']; ?>" size="15" /></p>
								<p><label>E-mail: </label><input id="email" class="inputbox form-field" type="text" name="email" value="<?php echo $sel_row[0]['e_mail']; ?>" size="15" /></p>
								<p><label>Web site: </label><input id="website" class="inputbox form-field" type="text" name="website" value="<?php echo $sel_row[0]['web_site']; ?>" size="15" /></p>
							</div>
							<div class="column cols-2" id="column2">
								<p><label>Zip Code: </label><input id="zipcode" class="inputbox form-field" type="text" name="zipcode" value="<?php echo $sel_row[0]['zip_code']; ?>" size="15" /></p>
								<p><label>Address: </label><input id="address" class="inputbox form-field" type="text" name="address" value="<?php echo $sel_row[0]['address']; ?>" size="15" /></p>
								<p><label>City: </label><input id="city" class="inputbox form-field" type="text" name="city" value="<?php echo $sel_row[0]['city']; ?>" size="15" /></p>
								<p>
									<label>Select Country: </label>
									<select id="name" class="inputbox form-field" name="country" >
									<?php foreach ($country_list as $country): ?>
										<option <?php if($sel_row[0]['country']==$country['id']){echo 'selected="selected"';} ?> value="<?php echo $country['id']; ?>" >
											<?php echo $country['name']; ?>
										</option>
									<?php endforeach; ?>
									</select>
								</p>
								<input id="published" class="inputbox form-field" type="hidden" name="published" value="<?php echo $sel_row[0]['published']; ?>" />
							</div>
							<div class="cleaner"></div>
							<div class="form-button">
								<span><input type="reset" name="reset" value="Cancel" onclick="history.back()" /></span>
								<span><input type="reset" name="reset" value="Reset" /></span>
								<span><input type="submit" name="edit_distributor" value="Update" /></span>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
        </div>

	</div>
