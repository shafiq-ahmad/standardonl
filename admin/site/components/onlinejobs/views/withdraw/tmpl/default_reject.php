<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div id="content">
			<h1><span>Confirm Reject - [Withdraw]</span></h1>
			<div id="content-wrapper">
				<div class="table">
					<br class="clear" />
					
						<?php 
							if (!empty($sel_row)){
							
							$link = 'index.php?option=onlinejobs&view=withdraw'; 
						?>
						<div class="row " >
							<form action="index.php?option=onlinejobs&view=withdraw" method="post" name="accept" >
							<input type="hidden" name="id" value="<?php echo $sel_row[0]['wid']; ?>" />
							<input type="hidden" name="user_id" value="<?php echo $sel_row[0]['id']; ?>" />
							<p><label>User: </label><?php echo $sel_row[0]['name']; ?></p>
							<p><label>Requested amount</label><input type="text" readonly class="inputbox" name="amount" value="<?php echo $sel_row[0]['amount']; ?>" /></p>
							<p><label>Note</label></p>
							<p><textarea name="note" ><?php echo $sel_row[0]['description']; ?></textarea></p>
							<p>
							<input type="reset" name="reset" value="Cancel" onclick="history.back(1)" />
							<input type="submit" name="reject_withdraw" value="Reject" />
							</p>
							</form>
						</div>
					<div class="clear"></div>
					<?php 
						}
					?>

				</div>

	
			</div>
        </div>

	</div>
