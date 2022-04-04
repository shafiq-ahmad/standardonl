<?php
defined('_MEXEC') or die ('Restricted Access');

?>
	<?php
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
			<h1><span>Distributors</span></h1>
			<div id="content-wrapper">
				<table class="table">
					<tr class="row head-row"><th class="id">ID</th><th class="name">Owner Name</th><th class="status">Status</th><th class="email">Email</th><th class="phone">Phone</th><th class="city-country">City/Country</th><th class="actopm">Action</th></tr>
					<?php $counter=0; $class = ''; ?>
					<?php foreach ($rows as $row): ?>
						<?php 
							$counter++;
							if(($counter % 2) == 1 ){$class = 'row1';}else{$class = 'row2';}
							$link = 'index.php?option=onlinejobs&view=distributors'; 
							if ($row['published']==1){$state='Unpublish';}else{$state='Publish';}
						?>
						<tr class="row <?php echo $class; ?>" >
							<td class="id"><?php echo $row['id']; ?></td>
							<td class="name"><?php echo $row['name']; ?></td>
							<td class="status"><?php //echo $row['name']; ?>
								<a class="check-button-<?php echo $row['published']; ?>" href="<?php echo $link; ?>&ItemID=<?php echo $row['id'] . '&published=' . toggleState($row['published']); ?>"><?php echo $state; ?></a>
							</td>
							<td class="email"><?php echo $row['e_mail']; ?></td>
							<td class="phone"><?php echo $row['phone']; ?></td>
							<?php $country = getElementById('countries', $row['country']); ?>
							<td class="city-country"><?php echo $row['city'] . ' / ' .$country[0]['name']; ?></td>
							<td class="action">
								<?php 
								?>
								<a href="<?php echo $link; ?>&task=edit&ItemID=<?php echo $row['id']; ?>">Edit</a> | 
								<a href="<?php echo $link; ?>&task=delete&ItemID=<?php echo $row['id']; ?>">Delete</a> 
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				
				<div id="pagination" style="">
					<?php
					if($pagination->total_pages() > 1) {
						
					if($pagination->has_previous_page()) { 
						echo "<a href=\"index.php??option=onlinejobs&view=distributors&page=";
						echo $pagination->previous_page();
						echo "\">&laquo; Previous</a> "; 
					}

					for($i=1; $i <= $pagination->total_pages(); $i++) {
						if($i == $page) {
							echo " <span class=\"selected\">{$i}</span> ";
						} else {
							echo " <a href=\"index.php?option=onlinejobs&view=distributors&page={$i}\">{$i}</a> "; 
						}
					}

						if($pagination->has_next_page()) { 
							echo " <a href=\"index.php?option=onlinejobs&view=distributors&page=";
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
