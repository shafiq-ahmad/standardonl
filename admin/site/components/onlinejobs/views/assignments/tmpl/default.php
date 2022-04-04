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
			<h1><span>
				Current
			</span></h1>
			<div id="content-wrapper">
				<table class="table">
					<tr class="row head-row"><th width="33%"><span class="l">Name</span></th><th width="33%"><span>Description</span></th><th width="7%"><span>Price</span></th><th class="title"><span>Package</span></th><th width="10%"><span class="r">Action</span></th></tr>
					<div class="cleaner"></div>
					<?php $counter=0; $class = '';
							if ($rows){
					?>
					<?php foreach ($rows as $row): ?>
						<?php 
							$counter++;
							if(($counter % 2) == 1 ){$class = 'row1';}else{$class = 'row2';}
							$link = 'index.php?option=onlinejobs&view=assignments'; 
							if ($row['published']==1){$state='Unpublish';}else{$state='Publish';}
						?>
						<tr class="row <?php echo $class; ?>" >
							<td class="title-l"><span class="l"><?php echo $row['title']; ?></span></td>
							<td class="title"><span><?php echo $row['description']; ?></span></td>
							<td class="price"><span><?php echo $row['amount']; ?></span></td>
							
							<td class="title"><span><?php echo $row['package_title'] . ' - ' . $row['package_name']; ?></span></div>
							<td class="action">
								<?php
									//if ($status=='franchise_verified'){
								?>
								<a class="check-button-<?php echo $row['published']; ?>" href="<?php echo $link; ?>&ItemID=<?php echo $row['id'] . '&published=' . toggleState($row['published']); ?>"><?php echo $state; ?></a> | 
								<?php
									//}else{
								?>
								<a href="<?php echo $link; ?>&task=edit&ItemID=<?php echo $row['id']; ?>">Edit</a> | 
								<a href="<?php echo $link; ?>&task=delete&ItemID=<?php echo $row['id']; ?>">Delete</a> 
							<?php
									//}
							?>
							</td>
						</tr>
					<?php endforeach; 
						}else{ echo '<h2>No Assignments.</h2>';}
					?>
				</table>
				
				<div id="pagination" style="">
					<?php
					if($pagination->total_pages() > 1) {
						
					if($pagination->has_previous_page()) { 
						echo "<a href=\"index.php??option=onlinejobs&view=clients&page=";
						echo $pagination->previous_page();
						echo "\">&laquo; Previous</a> "; 
					}

					for($i=1; $i <= $pagination->total_pages(); $i++) {
						if($i == $page) {
							echo " <span class=\"selected\">{$i}</span> ";
						} else {
							echo " <a href=\"index.php?option=onlinejobs&view=clients&page={$i}\">{$i}</a> "; 
						}
					}

						if($pagination->has_next_page()) { 
							echo " <a href=\"index.php?option=onlinejobs&view=clients&page=";
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
