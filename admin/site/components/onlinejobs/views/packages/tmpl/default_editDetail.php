<?php
defined('_MEXEC') or die ('Restricted Access');

?>
<script>
	$(document).ready(function(){
	$("#edit-packageDetail").validate({
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
			<h1><span>Edit Package [<?php echo $sel_row[0]['title'] . ' - ' . $sel_row[0]['package_name']; ?>]</span></h1>
			<div id="content-wrapper">
				<div class="table">
					<form id="edit-packageDetail" action="index.php?option=onlinejobs&view=packages" method="post">
						<fieldset class="form">
							<div class="column cols-2" id="column1">
								<input id="id" type="hidden" name="id" value="<?php echo $sel_row[0]['id']; ?>"/>
								<p><label>Name: </label><input id="title" class="required inputbox form-field" type="text" name="package_name" value="<?php echo $sel_row[0]['package_name']; ?>" size="15" /></p>
								<p><label>Work: </label><input id="image" class="inputbox form-field" type="text" name="work" value="<?php echo $sel_row[0]['work']; ?>" size="15" /></p>
								<p><label>compilation: </label><input id="compilation" class="required inputbox form-field" type="text" name="compilation" value="<?php echo $sel_row[0]['compilation']; ?>" size="15" /></p>
								<p><label>cost: </label><input id="published" class="required number inputbox form-field" type="text" name="cost" value="<?php echo $sel_row[0]['cost']; ?>" size="15" /></p>
								<p><label>Fee: </label><input id="published" class="required number inputbox form-field" type="text" name="fee" value="<?php echo $sel_row[0]['fee']; ?>" size="15" /></p>
								<p><label>Max earning: </label><input id="published" class="required inputbox form-field" type="text" name="max_earning" value="<?php echo $sel_row[0]['max_earning']; ?>" size="15" /></p>
							</div>
							<div class="cleaner"></div>
							<div class="form-button">
								<span><input type="reset" name="reset" value="Cancel" onclick="history.back()" /></span>
								<span><input type="reset" name="reset" value="Reset" /></span>
								<span><input type="submit" name="edit_packageDetail" value="Update" /></span>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
        </div>

	</div>
