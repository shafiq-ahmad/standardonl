<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div id="content">
			<h1><span>Add new Package</span></h1>
			<div id="content-wrapper">
				<form id="add-package" action="index.php?option=onlinejobs&view=packages" method="post">
					<table class="form">
						<input id="published" class="inputbox form-field" type="hidden" name="published" value="1" />
						<tr>
							<td width="20%"><label>Title: </label></td><td><input id="name" class="inputbox " type="text" name="title" value="" size="15" /></td>
						</tr>
						<tr>
							<td><label>Image: </label></td><td><input id="phone" class="inputbox" type="text" name="image" value="" size="15" /></td>
						</tr>
						<tr>
							<td><label>Duration: </label></td><td><input id="duration" class="required inputbox " type="text" name="duration" value="" size="15" /></td>
						</tr>
						<tr>
							<td><label for="description">Description: </label></td>
						</tr>description
						<tr>
							<td colspan="4"><textarea id="description" class="required textarea editor" cols="123" rows="10" name="description" method="post" ></textarea></td>
						</tr>
						<tr class="form-button">
							<td><span><input type="reset" name="reset" value="Cancel" onclick="history.back()" /></span>
							<span><input type="reset" name="reset" value="Reset" /></span>
							<span><input type="submit" name="add_package" value="Create" /></span></td>
						</tr>
					</table>
				</form>
			</div>
        </div>

	</div>
