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
			<div style="border-bottom: 1px dotted gray; margin-bottom:10px;">
				<div style="float:left; width:65%;"><h1><span>Statistics: <?php echo $row['name']; ?></span></h1></div>
				<div style="float:right; text-align:right; width:35%;"><h3>Current account balance: <?php echo $row['balance']; ?></h3></div>
			<br style="clear:both;" />
			</div>
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
