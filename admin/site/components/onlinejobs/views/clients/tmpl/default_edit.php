<?php
defined('_MEXEC') or die ('Restricted Access');

?>

<script type="text/javascript">
  $(document).ready(function(){
    $("#edit-client").validate({
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
		<div id="content">
			<h1><span>Edit Client</span></h1>

			<div id="content-wrapper">
				<div class="table">
					<form id="edit-client" action="index.php?option=onlinejobs&view=clients" method="post">
						<fieldset class="form">
							<div class="column cols-2" id="column1">
								<input id="id" type="hidden" name="id" value="<?php echo $sel_row[0]['id']; ?>"/>
								<p><label>Name: </label><input id="name" class="required inputbox form-field" type="text" name="name" value="<?php echo $sel_row[0]['name']; ?>" size="15" /></p>
								<p>
									<label>Select Franchise: </label>
									<?php echo htmlList($franchise_list, 'franchise', 'inputbox form-field',$sel_row[0]['fid']); ?>
								</p>
								<p>
									<label>Select Package: </label>
									<?php echo htmlList($packages, 'package', 'inputbox form-field',$sel_row[0]['package_id']); ?>
								</p>								
								<p><label>Phone #: </label><input id="phone" class="inputbox form-field" type="text" name="phone" value="<?php echo $sel_row[0]['phone']; ?>" size="15" /></p>
								<p><label>Cell #: </label><input id="cell" class="inputbox form-field" type="text" name="cell" value="<?php echo $sel_row[0]['cell']; ?>" size="15" /></p>
								<p><label>E-mail: </label><input id="email" class="required email inputbox form-field" type="text" name="email" value="<?php echo $sel_row[0]['e_mail']; ?>" size="15" /></p>
								<p><label>Web site: </label><input id="website" class="url inputbox form-field" type="text" name="website" value="<?php echo $sel_row[0]['web_site']; ?>" size="15" /></p>
							</div>
							<div class="column cols-2" id="column2">
								<p><label>Zip Code: </label><input id="zipcode" class="inputbox form-field" type="text" name="zipcode" value="<?php echo $sel_row[0]['zip_code']; ?>" size="15" /></p>
								<p><label>Address: </label><input id="address" class="required inputbox form-field" type="text" name="address" value="<?php echo $sel_row[0]['address']; ?>" size="15" /></p>
								<p><label>City: </label><input id="city" class="required inputbox form-field" type="text" name="city" value="<?php echo $sel_row[0]['city']; ?>" size="15" /></p>
								<p>
									<label>Select Country: </label>
									<?php echo htmlList($country_list, 'country', 'inputbox form-field',$sel_row[0]['ctid']); ?>
								</p>
							</div>
							<div class="cleaner"></div>
							<div class="form-button">
								<span><input type="reset" name="reset" value="Cancel" onclick="history.back()" /></span>
								<span><input type="reset" name="reset" value="Reset" /></span>
								<span><input type="submit" name="edit_client" value="Update" /></span>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
        </div>

	</div>
