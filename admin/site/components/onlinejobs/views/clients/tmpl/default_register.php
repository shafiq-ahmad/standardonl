<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div class="ic"></div>
		<div id="content">
			<h1><span>Final Approval for Registration</span></h1>

			<div id="content-wrapper">
				<div class="table">
					<form id="register-client" action="index.php?option=onlinejobs&view=clients" method="post">
						<fieldset class="form">
							<legend>Client Information</legend>
							<div class="column cols-2" id="column1">
								<input id="id" type="hidden" name="id" value="<?php echo $sel_row[0]['id']; ?>"/>
								<input id="ref_client" type="hidden" name="ref_client" value="<?php echo $sel_row[0]['ref_client']; ?>"/>
								<input id="package" type="hidden" name="package" value="<?php echo $sel_row[0]['request_package']; ?>"/>
								<input id="franchise" type="hidden" name="franchise" value="<?php echo $sel_row[0]['selected_franchise']; ?>"/>
								<input id="request_date" type="hidden" name="request_date" value="<?php echo $sel_row[0]['request_date']; ?>"/>
								<p><label>Name: </label><input id="name" class="inputbox form-field" type="text" name="name" value="<?php echo $sel_row[0]['name']; ?>" size="15" /></p>
								<p>
									<label>Select Franchise: </label>
									<select id="name" class="selectbox form-field" name="frlist" >
									<?php foreach ($franchise_list as $franchise): ?>
									<?php if($franchise['id']==$sel_row[0]['selected_franchise']){ ?>
										<option value="<?php echo $franchise['id']; ?>" selected="selected" >
											<?php echo $franchise['city'] . '/' . $franchise['address']; ?>
										</option>
									<?php } 
										endforeach;
									?>
									</select>
									
								</p>								
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
									<select id="name" class="selectbox form-field" name="country" >
									<?php foreach ($country_list as $country): ?>
										<option value="<?php echo $country['id']; ?>" <?php if($country['id']==$sel_row[0]['ctid']){echo 'selected="selected"';} ?> >
											<?php echo $country['name']; ?>
										</option>
									<?php endforeach; ?>
									</select>
								</p>
							</div>
							<div class="cleaner"></div>
						</fieldset>
						<fieldset>
						<legend>Supper Admin</legend>
						<div class="column cols-2" style="width:300px;margin-left:15px;" >
							<p><label>Amount Recieve (if any): </label><input id="amount" class="inputbox form-field" type="text" name="amount" readonly value="<?php echo $sel_row[0]['amount_receive']; ?>" size="15" /></p>
							<p><label>Admin Password: </label><input id="admin-password" class="password form-field" type="password" name="password" value="" size="15" /></p>
						</div>
						</fieldset>
						
							<div class="form-button">
								<span><input type="reset" name="reset" value="Cancel" onclick="history.back()" /></span>
								<span><input type="reset" name="reset" value="Reset" /></span>
								<span><input type="submit" name="register_client" value="Register" /></span>
							</div>
					</form>
				</div>
			</div>
        </div>

	</div>
