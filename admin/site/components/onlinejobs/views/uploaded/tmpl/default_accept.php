<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div id="content">
			<h1><span>Confirm Assignment accept</span></h1>
			<div id="content-wrapper">
				<div class="table">
					<br class="clear" />
					
						<?php 
							//if (!empty($sel_row)){
							
							$link = 'index.php?option=onlinejobs&view=uploaded'; 
						?>
						<div class="row " >
							<form action="index.php?option=onlinejobs&view=uploaded" method="post" name="accept" >
							<input type="hidden" name="id" value="<?php echo $sel_row[0]['id']; ?>" />
							<input type="hidden" name="user_id" value="<?php echo $sel_row[0]['uid']; ?>" />
							<p><label>User: </label><?php echo $sel_row[0]['name']; ?></p>
							<p><label>Assignment Price: </label><?php echo $sel_row[0]['amount']; ?></p>
							<p><label>Accept amount</label><input type="text" class="inputbox" name="amount" value="<?php echo $sel_row[0]['amount']; ?>" /></p>
							<p><label>Note</label></p>
							<p><textarea name="note" ></textarea></p>
							<p>
							<input type="reset" name="reset" value="Cancel" onclick="history.back(1)" />
							<input type="submit" name="accept_assignment" value="Accept" />
							</p>
							</form>
						</div>
					<div class="clear"></div>
					<?php 
						//}
					?>

				</div>

	
			</div>
        </div>

	</div>
