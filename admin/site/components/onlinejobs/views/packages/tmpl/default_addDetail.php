<?php
defined('_MEXEC') or die ('Restricted Access');

?>
<script>
	$(document).ready(function(){
	$("#add-packageDetail").validate({
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
			<h1><span>Add Package Detail</span></h1>
			<div id="content-wrapper">
				<div class="table">
					<form id="add-packageDetail" action="index.php?option=onlinejobs&view=packages" method="post">
						<fieldset class="form">
							<div class="column cols-2" id="column1">
								<p><label>Select Package: </label>
								<?php 
									echo htmlList($packages, 'package', 'inputbox form-field');
								
								?>
								</p>
								<p><label>Name: </label><input id="title" class="required inputbox form-field" type="text" name="package_name" value="" size="15" /></p>
								<p><label>Work: </label><input id="image" class="required inputbox form-field" type="text" name="work" value="" size="15" /></p>
								<p><label>compilation: </label><input id="compilation" class="required inputbox form-field" type="text" name="compilation" value="" size="15" /></p>
								<p><label>cost: </label><input id="published" class="required number inputbox form-field" type="text" name="cost" value="" size="15" /></p>
								<p><label>Fee: </label><input id="published" class="required number inputbox form-field" type="text" name="fee" value="" size="15" /></p>
								<p><label>Max earning: </label><input id="published" class="required inputbox form-field" type="text" name="max_earning" value="" size="15" /></p>
							</div>
							<div class="cleaner"></div>
							<div class="form-button">
								<span><input type="reset" name="reset" value="Cancel" onclick="history.back()" /></span>
								<span><input type="reset" name="reset" value="Reset" /></span>
								<span><input type="submit" name="add_packageDetail" value="Create" /></span>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
        </div>

	</div>
