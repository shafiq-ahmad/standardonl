<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div id="content">
			<h1><span>Package Detail</span></h1>
			<div id="content-wrapper">
				<table class="table">
					<tr class="row head-row"><th class="id">ID</th><th class="email">Title</th><th class="email">Work</th><th class="action">Compilation</th><th class="status">Cost</th><th class="status">Fee</th><th class="action">Max earning</th><th class="action">Action</th></tr>
					<?php $counter=0; $class = ''; ?>
					<?php foreach ($rows as $row): ?>
						<?php 
							$counter++;
							if(($counter % 2) == 1 ){$class = 'row1';}else{$class = 'row2';}
							$link = 'index.php?option=onlinejobs&view=packages'; 
							//if ($row['published']==1){$state='Unpublish';}else{$state='Publish';}
						?>
						<tr class="row <?php echo $class; ?>" >
							<td class="id"><?php echo $row['id']; ?></td>
							<td class="email"><?php echo $row['title'] . ' - ' . $row['package_name']; ?></td>
							
							<td class="email"><?php echo $row['work']; ?></td>
							<td class="action"><?php echo $row['compilation']; ?></td>
							<td class="status">$<?php echo $row['cost']; ?></td>
							<td class="status">$<?php echo $row['fee']; ?></td>
							<td class="action">$<?php echo $row['max_earning']; ?></td>
							<td class="action">
								<?php 
								?>
								<a href="<?php echo $link; ?>&task=editDetail&ItemID=<?php echo $row['id']; ?>">Edit</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				
				<div id="pagination" style="">
					<?php
					if($pagination->total_pages() > 1) {
						
					if($pagination->has_previous_page()) { 
						echo "<a href=\"index.php??option=onlinejobs&view=packages&task=detail&page=";
						echo $pagination->previous_page();
						echo "\">&laquo; Previous</a> "; 
					}

					for($i=1; $i <= $pagination->total_pages(); $i++) {
						if($i == $page) {
							echo " <span class=\"selected\">{$i}</span> ";
						} else {
							echo " <a href=\"index.php?option=onlinejobs&view=packages&task=detail&page={$i}\">{$i}</a> "; 
						}
					}

						if($pagination->has_next_page()) { 
							echo " <a href=\"index.php?option=onlinejobs&view=packages&task=detail&page=";
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
