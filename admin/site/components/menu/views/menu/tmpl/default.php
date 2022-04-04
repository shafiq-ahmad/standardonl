<?php
defined('_MEXEC') or die ('Restricted Access');

?>
	<script>
	$(function() {
		$( "#from" ).datepicker({ dateFormat: "yy-mm-dd" });
		$( "#to" ).datepicker({ dateFormat: "yy-mm-dd" });
	});
	</script>

	<div id="main-wrapper">
		<div id="content">
			<div id="content-wrapper">
				<h2>Menus</h2>
				<table class="table">
					<tr class="row head-row"><th>ID</th><th>Type</th><th>Status</th><th>Title</th><th>Link</th><th>Link To</th><th>Ordering</th><th>Action</th></tr>
					<?php $counter=0; $class = '';
							if ($rows){
					?>
					<?php foreach ($rows as $row): ?>
						<?php 
							$counter++;
							if(($counter % 2) == 1 ){$class = 'row1';}else{$class = 'row2';}
							$link = 'index.php?option=menu&view=menu'; 
							if ($row['published']==1){$state='Unpublish';}else{$state='Publish';}
						?>
						<tr class="row <?php echo $class; ?>" >
							<td><input type="checkbox" class="checkbox" value="<?php echo $row['id']; ?>" /></td>
							<td><?php echo $row['menu_type']; ?></td>
							<td>
								<a class="check-button-<?php echo $row['published']; ?>" href="<?php echo $link; ?>&ItemID=<?php echo $row['id'] . '&published=' . toggleState($row['published']); ?>"><?php echo $state; ?></a>
							</td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo $row['link']; ?></td>
							<td><?php echo $row['link_type']; ?></td>
							<td><?php echo $row['ordering']; ?></td>
							<td>
								<a href="<?php echo $link; ?>&task=edit&ItemID=<?php echo $row['id']; ?>">Edit</a> | 
								<a href="<?php echo $link; ?>&task=delete&ItemID=<?php echo $row['id']; ?>">Delete</a> 
							
							</td>
						</tr>
					<?php endforeach; 
						}else{ echo '<h2>No Menus.</h2>';}
					?>
				</table>
				
				<div id="pagination" style="">
					<?php
					if($pagination->total_pages() > 1) {
						
					if($pagination->has_previous_page()) { 
						echo "<a href=\"{$link}";
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
				</div>
				
			</div>
        </div>

	</div>
