<?php
defined('_MEXEC') or die ('Restricted Access');

?>

			<?php
			?>
			<h1><span>Clients to Approve</span></h1>
			<div id="content-wrapper">
				<table class="table">
					<tr class="row head-row"><th class="name">Name</th><th class="status">Status</th><th class="email">Email</th><th class="city-country">City/Country</th><th class="join-date">Action</th></tr>
					<?php $counter=0; $class = ''; ?>
					<?php foreach ($pending_clients as $row): ?>
						<?php 
							$counter++;
							if(($counter % 2) == 1 ){$class = 'row1';}else{$class = 'row2';}
							$link = 'index.php?option=onlinejobs&view=clients'; 
							if ($row['published']==1){$state='Unpublish';}else{$state='Publish';}
						?>
						<tr class="row <?php echo $class; ?>" >
							<td class="name"><?php echo $row['login_name']; ?></td>
							<td class="status"><?php //echo $row['name']; ?>
								<a class="check-button-<?php echo $row['published']; ?>" ><?php echo $state; ?></a>
							</td>
							<td class="email"><?php echo $row['e_mail']; ?></td>
							<td class="city-country"><?php echo $row['city'] . '/' .$row['country']; ?></td>
							<td class="join-date">
								<a href="index.php?option=onlinejobs&view=clients&task=approve&ItemID=<?php echo $row['id']; ?>">Approve</a>
							</td>
						</tr>
					<div class="cleaner"></div>
					<?php endforeach; ?>
				</table>

			</div>

