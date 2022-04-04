<?php
defined('_MEXEC') or die ('Restricted Access');

?>

<script>
	$(document).ready(function(){
	$("#edit-package").validate({
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
			<h1><span>Edit Package</span></h1>
			<div id="content-wrapper">
				<form id="edit-package" action="index.php?option=onlinejobs&view=packages" method="post">
					<table class="form">
							<input id="id" type="hidden" name="id" value="<?php echo $sel_row[0]['id']; ?>"/>
							<input id="published" type="hidden" name="published" value="<?php echo $sel_row[0]['published']; ?>" />
							<tr >
								<td width="20%"><label>Title: </label></td><td><input id="title" class="required inputbox " type="text" name="title" value="<?php echo $sel_row[0]['title']; ?>" size="15" /></td>
							</tr>
							<tr>
								<td><label>Image: </label></td><td><input id="image" class="required inputbox " type="text" name="image" value="<?php echo $sel_row[0]['image']; ?>" size="15" /></td>
							</tr>
							<tr>
								<td><label>Duration: </label></td><td><input id="duration" class="required inputbox " type="text" name="duration" value="<?php echo $sel_row[0]['duration']; ?>" size="15" /></td>
							</tr>
							<tr>
								<td><label for="description">Description: </label></td>
							</tr>
							<tr>
								<td colspan="4"><textarea id="description" class="required textarea editor" cols="123" rows="10" name="description" ><?php echo $sel_row[0]['description']; ?></textarea></td>
							</tr>
							<tr class="form-button">
								<td><input type="reset" name="reset" value="Cancel" onclick="history.back()" /></span>
								<span><input type="reset" name="reset" value="Reset" /></span>
								<span><input type="submit" name="edit_package" value="Update" /></td>
							</tr>
					</table>
				</form>
			</div>
        </div>

	</div>
