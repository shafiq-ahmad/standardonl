<?php
defined('_MEXEC') or die ('Restricted Access');
global $message_sent;
 //echo $message_sent;
if($message_sent){require_once "default_regOk.php";}else{
?>
<script>
	$(document).ready(function(){
	$("#addClient").validate({
	rules: {
	field: {
	required: true,
	number: true
	}
	}
	});
	});
</script>

<script type="text/javascript" charset="utf-8">

			
function sendValue(str){
	$("#ajaxAmount").load("ajax.php?option=ajax&view=packages&task=fee&ItemID="+str, function(response, status, xhr) {
	  if (status == "error") {
		var msg = "Sorry but there was an error: ";
		$("#error").html(msg + xhr.status + " " + xhr.statusText);
	  }
	});
}

</script>
	<div class="cleaner"></div>
	<div id="main-wrapper">
		<div id="content">
			<center><h1><span>New User Registration</span></h1></center>
			<div id="content-wrapper">
				<div class="register form">
					<form id="addClient" action="index.php?option=onlinejobs&view=clients" method="post">
						<table>
							<tr><td width="50%">
							<table class="c1" id="t1">
							<tr><td width="40%"><label><strong>Full Name: </strong></label></td><td><input type="text" id="from-name" class="required inputbox" name="name" value="" /></td></tr>
							<tr><td><label><strong>Email Address: </strong></label></td><td><input type="text" id="from-email" class="required email inputbox" name="email" value="" /></td></tr>
							<tr><td><label><strong>CNIC: </strong></label></td><td><input type="text" id="from-cnic" class="inputbox" name="cnic" value="" /></td></tr>
							<tr><td><label><strong>Username: </strong></label></td><td><input type="text" id="from-user" class="required inputbox" name="login_name" value="" /></td></tr>
							<tr><td><label><strong>Password: </strong></label></td><td><input type="password" id="from-password" class="required inputbox" name="password" value="" /></td></tr>
							<tr><td><label><strong>Confirm Password: </strong></label></td><td><input type="password" id="from-confirm-password" class="required inputbox" name="confirm_password" value="" /></td></tr>
							<tr><td><label><strong>Phone: </strong></label></td><td><input type="text" id="from-phone" class="inputbox" name="phone" value="" /></td></tr>
							</table>
							</td>
							
							<td width="50%">
							<table class="c2" id="t2">
							<tr><td width="40%"><label><strong>Address: </strong></label></td><td><input type="text" id="from-address" class="required inputbox" name="address" value="" /></td></tr>
							<tr><td>
									<label>Select Country: </label></td><td>
									<select id="name" class="selectbox" name="country" >
									<?php foreach ($country_list as $country): ?>
										<option value="<?php echo $country['id']; ?>" >
											<?php echo $country['name']; ?>
										</option>
									<?php endforeach; ?>
									</select></td>
							</tr>							
							<tr><td><label><strong>City: </strong></label></td><td><input type="text" id="from-city" class="required inputbox" name="city" value="" /></td></tr>
							<tr><td>
								<label>Reffer Client: </label></td><td>
								<select id="name" class="selectbox" name="client" >
								<option value="0">No Refferer Client</option>
								<?php foreach ($clients_list as $client): ?>
									<option value="<?php echo $client['id']; ?>" >
										<?php echo $client['name'] . ' / ' . $client['address'] . ' - ' . $client['city']; ?>
									</option>
								<?php endforeach; ?>
								</select></td>
							</tr>
							<tr><td>
								<label>Select Package: </label></td><td>
								<select onchange="sendValue(this.value)" id="package" class="selectbox min" name="package" >
								<option value="0" >Select a Package</option>
								<?php foreach ($packages_list as $package): ?>
									<option value="<?php echo $package['id']; ?>" >
										<?php echo $package['title'] . ' - ' . $package['package_name']; ?>
									</option>
								<?php endforeach; ?>
								</select>
							</td></tr>
							<tr><td>
									<label>Request an account: </label></td><td>
									<select id="name" class="selectbox" name="request" >
										<option value="client" >Client</option>
									</select>
							</td></tr>
							<tr><td><label>Package Price: </label></td><td>
							<div id="ajaxAmount"><input id="amount" class="required number inputbox" type="text" name="amount" value="" size="15" /></div></td></tr>
							
							<tr><td><label></label>
							<span id="ajaxMessage"></span></td></tr>
							</table>
							<tr class="form-button">
								<td><span><input style="width:70px;" class="button" type="submit" name="register_user" value="Add User" /></span></td>
							</tr>
							</td><tr>
						</table>
						<input type="hidden" name="registration_status" value="franchise_verified" />
					</form>
				</div>
				
			</div>
        </div>

	</div>
	<?php } ?>
