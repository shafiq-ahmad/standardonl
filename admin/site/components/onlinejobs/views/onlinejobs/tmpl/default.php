<?php
defined('_MEXEC') or die ('Restricted Access');

?>
	<script>
	$(function() {
	});
	
	$(function() {
		$( "#stat_to" ).datepicker({ dateFormat: "yy-mm-dd" });
		$( "#stat_from" ).datepicker({ dateFormat: "yy-mm-dd" });
		$( "#client_from" ).datepicker({ dateFormat: "yy-mm-dd" });
		$( "#client_to" ).datepicker({ dateFormat: "yy-mm-dd" });
		//$( "#from" ).datepicker();
		//$( "#to" ).datepicker();
	});
	</script>
	<?php
		//global $messages;
		$messages = Session::getMessages();
		if(!empty($messages)){
			echo '<div id="messages">';
				foreach ($messages as $msg){
					echo $msg . '<br />';
				}
			echo '</div>';
		}
	?>

	<div id="main-wrapper">
		<div id="content">
			<h1><span>Dash Board</span></h1>
			<div>
				<div class="table" style="width:49%;">
					<h3><span>Check New Clients Between two dates</span></h3>
					<form id="dash-client" action="index.php?option=onlinejobs" method="post">
						<fieldset class="form">
							<div class="column" id="column1" >
								<p><label>From: </label><input id="client_from" class="" type="text" name="name" value="" size="15" readonly style="width:150px;" /></p>
								<p><label>To #: </label><input id="client_to" class="inputbox form-field" type="text" name="phone" value="" readonly size="15" style="width:150px;" /></p>
							</div>
							<div class="cleaner"></div>
							<div class="form-button">
								<span><input type="reset" name="reset" value="Reset" /></span>
								<span><input type="submit" name="show_clients_date" value="Show" /></span>
							</div>
						</fieldset>
					</form>
				</div>
			
				<div class="table" style="float:right;width:49%;" >
					<h3><span>Statistics</span></h3>
					<form id="dash-statistics" action="index.php?option=onlinejobs" method="post">
						<fieldset class="form">
							<div class="column" style="float:left;" >
								<p><label>From: </label><input id="stat_from" class="inputbox form-field" type="text" name="zipcode" value="" size="15" readonly style="width:150px;" /></p>
								<p><label>To: </label><input id="stat_to" class="inputbox form-field" type="text" name="address" value="" size="15" readonly style="width:150px;" /></p>
							</div>
							<div class="cleaner"></div>
							<div class="form-button">
								<span><input type="reset" name="reset" value="Reset" /></span>
								<span><input type="submit" name="show_statistics_date" value="Show" /></span>
							</div>
						</fieldset>
					</form>
				</div>
			
			
			
			</div>
			<br style="clear:both;" />
			<h1>Statistics</h1>
			<div id="content-wrapper">

				<table class="table">
					<tr class="row head-row"><th class="date">Date</th><th class="action">From</th><th class="action">To</th><th class="description">Perticullar</th><th class="status">Debit</th><th class="status">Credit</th><th class="status">Cr/Dr</th></tr>
					<?php $counter=0; $class = ''; 
							if ($rows){
					?>
					<?php foreach ($rows as $row): ?>
						<?php 
							$counter++;
							if(($counter % 2) == 1 ){$class = 'row1';}else{$class = 'row2';}
							$link = 'index.php?option=onlinejobs&view=accounts'; 
						?>
						<tr class="row <?php echo $class; ?>" >
							<td class="date"><?php echo $row['transaction_date']; ?></td>
							<td class="action"><?php echo $row['user_from']; ?></td>
							<td class="action"><?php echo $row['user_to']; ?></td>
							<td class="description"><?php echo $row['perticullar']; ?></td>
							<td class="status"><?php echo $row['debit']; ?></td>
							<td class="status"><?php echo $row['credit']; ?></td>
							<td class="status"><?php echo $row['cr_dr']; ?></td>
						</tr>
					<?php endforeach;
						}
					?>
				</table>
								<div id="pagination" style="">
					<?php
					if($pagination->total_pages() > 1) {
						
					if($pagination->has_previous_page()) { 
						echo "<a href=\"index.php??option=onlinejobs&view=onlinejobs&page=";
						echo $pagination->previous_page();
						echo "\">&laquo; Previous</a> "; 
					}

					for($i=1; $i <= $pagination->total_pages(); $i++) {
						if($i == $page) {
							echo " <span class=\"selected\">{$i}</span> ";
						} else {
							echo " <a href=\"index.php?option=onlinejobs&view=onlinejobs&page={$i}\">{$i}</a> "; 
						}
					}

						if($pagination->has_next_page()) { 
							echo " <a href=\"index.php?option=onlinejobs&view=onlinejobs&page=";
							echo $pagination->next_page();
							echo "\">Next &raquo;</a> "; 
					}
						
					}

					?>
					<div class="cleaner"></div>
				</div>
			</div>
        </div>

	</div>
