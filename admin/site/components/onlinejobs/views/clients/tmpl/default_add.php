<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div class="ic"></div>
		<div id="content">
			<h1><span>Add new Client</span></h1>

			<div id="content-wrapper">
				<div class="table">
					<form id="add-client" action="index.php?option=onlinejobs&view=clients" method="post">
						<fieldset class="form">
							<div class="column cols-2" id="column1">
								<p><label>Name: </label><input id="name" class="inputbox form-field" type="text" name="name" value="" size="15" /></p>
								<p>
									<label>Select Franchise: </label>
									<select id="name" class="inputbox form-field" name="franchise"  >
									<?php foreach ($franchise_list as $franchise): ?>
										<option value="<?php echo $franchise['id']; ?>"><?php echo $franchise['city'] . ' / ' . $franchise['address']; ?></option>
									<?php endforeach; ?>
									</select>
								</p>
								<p><label>Phone #: </label><input id="phone" class="inputbox form-field" type="text" name="phone" value="" size="15" /></p>
								<p><label>Cell #: </label><input id="cell" class="inputbox form-field" type="text" name="cell" value="" size="15" /></p>
								<p><label>E-mail: </label><input id="email" class="inputbox form-field" type="text" name="email" value="" size="15" /></p>
								<p><label>Web site: </label><input id="website" class="inputbox form-field" type="text" name="website" value="" size="15" /></p>
							</div>
							<div class="column cols-2" id="column2">
								<p><label>Zip Code: </label><input id="zipcode" class="inputbox form-field" type="text" name="zipcode" value="" size="15" /></p>
								<p><label>Address: </label><input id="address" class="inputbox form-field" type="text" name="address" value="" size="15" /></p>
								<p><label>City: </label><input id="city" class="inputbox form-field" type="text" name="city" value="" size="15" /></p>
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
								<input id="published" class="inputbox form-field" type="hidden" name="published" value="0" size="15" />
							</div>
							<div class="cleaner"></div>
							<div class="form-button">
								<span><input type="reset" name="reset" value="Cancel" onclick="history.back()" /></span>
								<span><input type="reset" name="reset" value="Reset" /></span>
								<span><input type="submit" name="add_client" value="Create" /></span>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
        </div>

	</div>
