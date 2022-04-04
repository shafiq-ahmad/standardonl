<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div class="ic"></div>
		<div id="content">
			<h1><span>Delete Assignment</span></h1>
			<div id="message"><span class="delete">
				<?php
					//if(empty($sel_row)){redirect("index.php?option=onlinejobs&view=assignments");}
					echo "Confirm Deletion of ID: {$sel_row[0]['id']}, Assignment Name: {$sel_row[0]['title']}";
				?>
				</span>
			</div>
			<div id="content-wrapper">
				<div class="table">
					<form id="delete-assignment" action="index.php?option=onlinejobs&view=assignments" method="post">
						<fieldset class="form">
							<div class="clear"></div>
							<input type="hidden" name="id" value="<?php echo $sel_row[0]['id']; ?>" />
							<div class="form-button">
								<span><input type="reset" name="reset" value="Cancel" onclick="history.back()" /></span>
								<span><input type="submit" name="delete_assignment" value="Confirm Delete" /></span>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
        </div>

	</div>
