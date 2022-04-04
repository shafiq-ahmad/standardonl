<?php
defined('_MEXEC') or die ('Restricted Access');

?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#add-franchise").validate({
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
			<h1><span>Add new Franchise</span></h1>

			<div id="content-wrapper">
				<div class="table">
					<form id="add-franchise" action="index.php?option=onlinejobs&view=franchises" method="post">
						<fieldset class="form">
							<div class="column cols-2" id="column1">
								<p><label for="user_name">User Name: </label><input id="user_name" class="required inputbox form-field" type="text" name="user_name" value="" size="15" /></p>
								<p><label>Full Name: </label><input id="full_name" class="required inputbox form-field" type="text" name="full_name" value="" size="15" /></p>
								<p><label>Franchise Name: </label><input id="franchise" class="inputbox form-field" type="text" name="franchise" value="" size="15" /></p>
								<p>
									<label>Type: </label>
									<select id="type" class="inputbox form-field" name="type" >
										<option value="franchise" >Franchise</option>
										<option value="sub-franchise" >Sub Franchise</option>
									</select>
								</p>
								<p><label>Phone #: </label><input id="phone" class="inputbox form-field" type="text" name="phone" value="" size="15" /></p>
								<p><label>Cell #: </label><input id="cell" class="inputbox form-field" type="text" name="cell" value="" size="15" /></p>

							</div>
							<div class="column cols-2" id="column2">
								<p><label>E-mail: </label><input id="email" class="required email inputbox form-field" type="text" name="email" value="" size="15" /></p>
								<p><label>Web site: </label><input id="website" class="url inputbox form-field" type="text" name="website" value="" size="15" /></p>
								<p><label>Zip Code: </label><input id="zipcode" class="inputbox form-field" type="text" name="zipcode" value="" size="15" /></p>
								<p><label>Address: </label><input id="address" class="required inputbox form-field" type="text" name="address" value="" size="15" /></p>
								<p><label>City: </label><input id="city" class="required inputbox form-field" type="text" name="city" value="" size="15" /></p>
								<p>
									<label>Select Country: </label>
									<select id="name" class="inputbox form-field" name="country" >
									<?php foreach ($country_list as $country): ?>
										<option value="<?php echo $country['id']; ?>" >
											<?php echo $country['name']; ?>
										</option>
									<?php endforeach; ?>
									</select>
								</p>
							<input id="published" class="inputbox form-field" type="hidden" name="published" value="1" size="15" />
							</div>
							<div class="clear"></div>
							<div class="form-button">
								<span><input type="reset" name="reset" value="Cancel" onclick="history.back()" /></span>
								<span><input type="reset" name="reset" value="Reset" /></span>
								<span><input type="submit" name="add_franchise" value="Create" /></span>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
        </div>

	</div>
