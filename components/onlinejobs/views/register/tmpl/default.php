<?php
defined('_MEXEC') or die ('Restricted Access');
global $message_sent;
if(isset($_GET['referal'])){$referal=$_GET['referal'];}else{$referal=0;}
?>

<script type="text/javascript">
$(document).ready(function(){
	$("#register-form").validate({
	rules: { 
			field: {required: true, number: true},
			password: {minlength: 6},
			confirm_password: {equalTo: "#new-password"}
			}
	});
});

function agreeStat(v){
	if(v.checked){
		$("#register_user").show();
	}else{
		$("#register_user").hide();
	}
}
</script>
<div class="cleaner"></div>
<div id="main-wrapper">
	<div class="ic"></div>
	<div id="content">
		<center><h1><span>Registration</span></h1></center>
		<div id="message">
			<?php
				global $message;
				echo $message;
			?>
		</div>
		<div id="content-wrapper">
			<div class="register-form">
			<center>
				<form id="register-form" action="index.php?option=onlinejobs&view=register&task=register" method="post">
					<fieldset>
						<dl class="eachInptBx">
						<dd class="labelTxt"><label><strong>Full Name: </strong></label></dd>
						<dd class="intputPnl"><input type="text" id="from-name" class="required typeText inputbox" name="name" value="" /></dd></dl>
						<dl class="eachInptBx">
						<dd class="labelTxt"><label><strong>Email Address: </strong></label></dd>
						<dd class="intputPnl"><input type="text" id="from-email" class="required email typeText inputbox" name="email" value="" /></dd></dl>
						<dl class="eachInptBx">
						<dd class="labelTxt"><label><strong>CNIC: </strong></label></dd>
						<dd class="intputPnl"><input type="text" id="from-cnic" class="typeText inputbox" name="cnic" value="" /></dd></dl>
						<dl class="eachInptBx">
						<dd class="labelTxt"><label><strong>Username: </strong></label></dd>
						<dd class="intputPnl"><input type="text" id="from-login" class="required typeText inputbox" name="login_name" value="" /></dd></dl>
						<dl class="eachInptBx">
						<dd class="labelTxt"><label><strong>Password: </strong></label></dd>
						<dd class="intputPnl"><input type="password" id="new-password" class="required typeText inputbox" name="password" value="" /></dd></dl>
						<dl class="eachInptBx">
						<dd class="labelTxt"><label><strong>Confirm Password: </strong></label></dd>
						<dd class="intputPnl"><input type="password" id="confirm_password" class="required typeText inputbox" name="confirm_password" value="" /></dd></dl>
						<dl class="eachInptBx">
						<dd class="labelTxt"><label><strong>Phone: </strong></label></dd>
						<dd class="intputPnl"><input type="text" id="from-phone" class="typeText inputbox" name="phone" value="" /></dd></dl>
						<dl class="eachInptBx">
						<dd class="labelTxt"><label><strong>Address: </strong></label></dd>
						<dd class="intputPnl"><input type="text" id="from-address" class="typeText inputbox" name="address" value="" /></dd></dl>
						<dl class="eachInptBx">
								<dd class="labelTxt"><label>Reffer Client: </label></dd>
								<dd class="intputPnl"><select id="name" class="inputbox form-field" name="client" ></dd>
								<option value="0">No Refferer Client</option>
								<?php foreach ($clients_list as $client): ?>
									<option value="<?php echo $client['id']; ?>" <?php if($referal==$client['id']){echo "selected";} ?> >
										<?php echo $client['name'] . ' / ' . $client['address'] . ' - ' . $client['city']; ?>
									</option>
								<?php endforeach; ?>
								</select>
						</dl>
						<dl class="eachInptBx">
								<dd class="labelTxt"><label>Select Country: </label></dd>
								<dd class="intputPnl">
								<select id="name" class="inputbox form-field" name="country" >
								<?php foreach ($country_list as $country): ?>
									<option value="<?php echo $country['id']; ?>" >
										<?php echo $country['name']; ?>
									</option>
								<?php endforeach; ?>
								</select>
								</dd>
						</dl>
						<dl class="eachInptBx">
						<dd class="labelTxt"><label><strong>City: </strong></label></dd>
						<dd class="intputPnl"><input type="text" id="from-city" class="typeText inputbox" name="city" value="" /></dd></dl>
						<dl class="eachInptBx">
								<dd class="labelTxt"><label>Select Franchise: </label>
								<dd class="intputPnl"><select id="name" class="inputbox form-field" name="franchise" >
								<?php foreach ($franchise_list as $franchise): ?>
									<option value="<?php echo $franchise['id']; ?>" >
										<?php echo $franchise['franchise_name'] . ' / ' . $franchise['address'] . ' - ' . $franchise['city']; ?>
									</option>
								<?php endforeach; ?>
								</select>
						</dl>
						<dl class="eachInptBx">
								<dd class="labelTxt"><label>Select Package: </label>
								<dd class="intputPnl"><select id="name" class="inputbox form-field" name="package" >
								<?php foreach ($packages_list as $package): ?>
									<option value="<?php echo $package['id']; ?>" >
										<?php echo $package['title'] . ' - ' . $package['package_name']; ?>
									</option>
								<?php endforeach; ?>
								</select></dd>
						</dl>
						<dl class="eachInptBx">
								<dd class="labelTxt"><label>Request an account: </label>
								<dd class="intputPnl"><select id="name" class="selectBox form-field" name="request" >
									<option value="client" >Client</option>
									<!-- <option value="franchise" >Franchise</option> -->
								</select></dd>
						</dl>
						<dl class="eachInptBx"><dd><input type="checkbox" id="from-agree" class="checkbox" name="agree" value="" onclick="return agreeStat(this);" /><label>I agree <a href="index.php?option=onlinejobs&view=terms">terms and conditions</a></label></dd></dl>
						<div class="cleaner"></div>
						<div class="form-button">
							<span><input id="register_user" style="display:none;" class="button" type="submit" name="register_user" value="Post" /></span>
						</div>
					</fieldset>
					<input type="hidden" name="registration_status" value="pending" />
				</form>
				</center>
			</div>
			
		</div>
	</div>

</div>
