<?php
defined('_MEXEC') or die ('Restricted Access');

?>

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
			<?php 
				if (isset($pending_clients) && $pending_clients){
					require_once "_pending.php";
				}
			?>
			<h1><span>Clients</span></h1>
			<div id="content-wrapper">
				<table class="table">
					<tr class="row head-row"><th class="name">Name</th><th class="status">Status</th><th class="email">Email</th><th class="city-country">City/Country</th><th class="join-date">Joining Date</th></tr>
					<?php $counter=0; $class = '';
						if($rows){
					 ?>
					<?php foreach ($rows as $row): ?>
						<?php 
							$counter++;
							if(($counter % 2) == 1 ){$class = 'row1';}else{$class = 'row2';}
							$link = 'index.php?option=onlinejobs&view=clients'; 
							if ($row['published']==1){$state='Unpublish';}else{$state='Publish';}
						?>
						<tr class="row <?php echo $class; ?>" >
							<td class="name"><a href="index.php?option=onlinejobs&view=accounts&task=statistics&ItemID=<?php echo $row['id']; ?>" target="_blank"  title="<?php
								echo 'Name: ' . $row['name'];
								//if(isset($row['franchise_name'])){echo "\nFranchise: " . $row['franchise_name'];}
								//if(isset($row['balance'])){echo "\nBalance: " . $row['balance'];}
							?>"><?php echo $row['login_name']; ?></a></td>
							<td class="status"><?php //echo $row['name']; ?>
								<a class="check-button-<?php echo $row['published']; ?>" ><?php echo $state; ?></a>
							</td>
							<td class="email"><?php echo $row['e_mail']; ?></td>
							<td class="city-country"><?php echo $row['city'] . ' / ' .$row['country_name']; ?></td>
							<td class="join-date"><?php echo $row['register_date']; ?></td>
						</tr>
					<?php endforeach; 
						}
					?>
				</table>
				
				<div id="pagination" style="">
					<?php
					if($pagination->total_pages() > 1) {
						
					if($pagination->has_previous_page()) { 
						echo "<a href=\"index.php??option=onlinejobs&view=franchises&page=";
						echo $pagination->previous_page();
						echo "\">&laquo; Previous</a> "; 
					}

					for($i=1; $i <= $pagination->total_pages(); $i++) {
						if($i == $page) {
							echo " <span class=\"selected\">{$i}</span> ";
						} else {
							echo " <a href=\"index.php?option=onlinejobs&view=franchises&page={$i}\">{$i}</a> "; 
						}
					}

						if($pagination->has_next_page()) { 
							echo " <a href=\"index.php?option=onlinejobs&view=franchises&page=";
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
