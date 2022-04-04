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
			<div id="content-wrapper">			
						<?php 
							$counter=0; 
							$class = ''; 
						?>
			<h1><span>Pending Requests</span></h1>
				<table class="table">
						<tr class="row head-row"><th class="id">ID</th><th class="name">Client Name</th><th class="email">Date & Time</th><th class="name">Amount</th><th class="email">Action</th></tr>
								
						<?php 
						if (!empty($pendingRows)){
						foreach ($pendingRows as $row): ?>
						<?php 
							$counter++;
							if(($counter % 2) == 1 ){$class = 'row1';}else{$class = 'row2';}
							$link = 'index.php?option=onlinejobs&view=withdraw'; 
						?>
						<tr class="row <?php echo $class; ?>" >
							<td class="id"><?php echo $row['user_id']; ?></td>
							<td class="name"><?php echo $row['name']; ?></td>
							<td class="email"><?php echo $row['request_date']; ?></td>
							<td class="name"><?php echo $row['amount']; ?></td>
							<td class="email"><a class="accept" href="<?php 
								echo $link . '&task=accept&ItemId=' . $row['id']; 
							?>">Accept</a> | 
							<a class="reject" href="<?php 
								echo $link . '&task=reject&ItemId=' . $row['id']; 
							?>">Reject</a>
							</td>
						</tr>
					<?php 
						endforeach;
						}
					?>

				</table>

		
						<?php 
							$counter=0; 
							$class = ''; 
							if (!empty($rows)){
						?>
			<h1><span>History</span></h1>
				<table class="table">		
						<tr class="row head-row"><th class="id">ID</th><th class="name">Client</th><th class="email">Date & Time</th><th class="name">Amount</th><th class="email">Action</th></tr>
							
						<?php foreach ($rows as $row): ?>
						<?php 
							$counter++;
							if(($counter % 2) == 1 ){$class = 'row1';}else{$class = 'row2';}
							$link = 'index.php?option=onlinejobs&view=withdraw'; 
						?>
						<tr class="row <?php echo $class; ?>" >
							<td class="id"><?php echo $row['user_id']; ?></td>
							<td class="name"><?php echo $row['name']; ?></td>
							<td class="email"><?php echo $row['request_date']; ?></td>
							<td class="name"><?php echo $row['amount']; ?></td>
							<td class="name"><?php echo ucfirst($row['status']); ?></td>
						</tr>
					<?php 
						endforeach; 
						echo '</table>';
						
						}
					?>


				
			</div>
        </div>

	</div>
