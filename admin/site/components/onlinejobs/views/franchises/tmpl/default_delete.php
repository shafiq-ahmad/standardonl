<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div id="content">
			<h1><span>Delete Franchise</span></h1>
			<span class="delete">
				<?php
					echo "Confirm Deletion of ID: {$sel_row[0]['id']}, Owner Name: {$sel_row[0]['name']}";
				?>
				
				</span>
			<div id="content-wrapper">
				<div class="table">
					<form id="edit-franchise" action="index.php?option=onlinejobs&view=franchises" method="post">
						<fieldset class="form">
							<div class="cleaner"></div>
							<input type="hidden" name="id" value="<?php echo $sel_row[0]['id']; ?>" />
							<div class="form-button">
								<span><input type="reset" name="reset" value="Cancel" onclick="history.back()" /></span>
								<span><input type="submit" name="delete_franchise" value="Confirm Delete" /></span>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
        </div>

	</div>
