<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div class="ic"></div>
		<div id="content">
			<h1><span>Approval for Registration</span></h1>
			<div id="content-wrapper">
				<div class="table">
					<form id="approve-client" action="index.php?option=onlinejobs&view=clients" method="post">
						<fieldset class="form">
							<legend>Client Information</legend>
							<div class="column cols-2" id="column1">
								<input id="id" type="hidden" name="id" value="<?php echo $sel_row[0]['id']; ?>"/>
								
							<p><label><strong>Full Name: </strong></label><input type="text" id="from-name" class="required inputbox" name="name" readonly="readonly" value="<?php echo $sel_row[0]['name']; ?>" /></p>
							<p><label><strong>Email Address: </strong></label><input type="text" id="from-email" class="required email inputbox" readonly="readonly" name="email" value="<?php echo $sel_row[0]['e_mail']; ?>" /></p>
							<p><label><strong>CNIC: </strong></label><input type="text" id="from-cnic" class="inputbox" name="cnic" readonly="readonly" value="<?php echo $sel_row[0]['cnic']; ?>" /></p>
							<p><label><strong>Username: </strong></label><input type="text" id="from-user" class="required inputbox" readonly="readonly" name="login_name" value="<?php echo $sel_row[0]['login_name']; ?>" /></p>
							<p><label><strong>Phone: </strong></label><input type="text" id="from-phone" class="inputbox" name="phone" readonly="readonly" value="<?php echo $sel_row[0]['phone']; ?>" /></p>
							<p><label><strong>Address: </strong></label><input type="text" id="from-address" class="required inputbox" name="address" readonly="readonly" value="<?php echo $sel_row[0]['address']; ?>" /></p>
							<p>
								<label>Reffer Client: </label>
								<select id="name" class="selectbox form-field" name="client" >
								<?php foreach ($clients_list as $client): ?>
											<?php if($client['id']==$sel_row[0]['ref_client']){ ?>
									<option selected="selected" value="<?php echo $client['id']; ?>" >
										<?php echo $client['name'] . ' / ' . $client['address'] . ' - ' . $client['city']; ?>
									</option>
								<?php } endforeach; ?>
								</select>
							</p>								
								
							</div>
							<div class="column cols-2" id="column2">
							
							<p>
									<label>Select Country: </label>
									<select id="name" class="selectbox form-field" name="country" >
									<?php foreach ($country_list as $country): ?>
											<?php if($country['id']==$sel_row[0]['country']){ ?>
										<option value="<?php echo $country['id']; ?>" >
											<?php echo $country['name']; ?>
										</option>
										<?php } ?>
									<?php endforeach; ?>
									</select>
							</p>							
							<p><label><strong>City: </strong></label><input type="text" id="from-city" class="required inputbox" name="city" readonly="readonly" value="<?php echo $sel_row[0]['city']; ?>" /></p>

							<p>
								<label>Select Package: </label>
								<select onchange="sendValue(this.value)" id="package" class="selectbox min form-field" name="package" >
								<?php foreach ($packages_list as $package): 
									if($package['id']==$sel_row[0]['request_package']){ ?>
									<option value="<?php echo $package['id']; ?>" >
										<?php echo $package['title'] . ' - ' . $package['package_name']; ?>
									</option>
									
								<?php
									}
									endforeach; ?>
								</select>
							</p>
							
							<p><label>Package Price: </label>
							<span id="ajaxAmount"><input id="amount" class="required number inputbox form-field" type="text" name="amount" readonly="readonly" value="<?php echo $sel_row[0]['cost']; ?>" size="15" /></span></p>
							
							<p><label></label>
							<span id="ajaxMessage"></span></p>							
							
							

							</div>
							<input type="hidden" name="request" value="client" />
							<div class="cleaner"></div>
						</fieldset>
						<fieldset>
						<legend>Franchise Action</legend>
						<div class="column cols-2" style="width:300px;margin-left:15px;" >
							<p><label>Amount Recieve (if any): </label><input id="amount" class="inputbox form-field" type="text" name="amount" value="<?php echo $sel_row[0]['cost']; ?>" readonly size="15" /></p>
							<p><label>Admin Password: </label><input id="admin-password" class="password form-field" type="password" name="password" value="" size="15" /></p>
						</div>
						</fieldset>
						
							<div class="form-button">
								<span><input type="reset" name="reset" value="Cancel" onclick="history.back()" /></span>
								<span><input type="reset" name="reset" value="Reset" /></span>
								<span><input type="submit" name="approve_client" value="Approve" /></span>
							</div>
					</form>
				</div>
			</div>
        </div>

	</div>
