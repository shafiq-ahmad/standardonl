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
			<h1><span>Pending Assignment</span></h1>
			<div id="content-wrapper">
				<table class="table">
						<?php 
							$counter=0; 
							$class = '';
							if(!empty($pending)){
						?>
						<tr class="row head-row"><th width="15%">Client</th><th width="45%">Assignment</th><th class="action">Date & Time</th><th class="email">File</th><th class="action">Action</th></tr>
	
						<?php foreach ($pending as $row): ?>
						<?php 
							$counter++;
							if(($counter % 2) == 1 ){$class = 'row1';}else{$class = 'row2';}
							$link = '?option=onlinejobs&view=uploaded'; 
						?>
						<tr class="row <?php echo $class; ?>" >
							<td class="action"><?php echo $row['name']; ?></td>
							<td class="title-m"><?php echo $row['title']; ?></td>
							<td class="action"><?php echo $row['submition_date']; ?></td>
							<td class="email"><a href="<?php 
								echo '../../uploads/' . $row['uid'] . '/assignments/' . rawurlencode($row['file_name']); 
							?>">View</a></td>
							<td class="action"><a class="accept" href="<?php 
								echo $link . '&task=accept&ItemId=' . $row['id']; 
							?>">Accept</a> | 
							<a class="reject" href="<?php 
								echo $link . '&task=reject&ItemId=' . $row['id']; 
							?>">Reject</a>
							</td>
						</tr>
					<?php 
						endforeach;
						}else{echo '<h2><span>No pending Assignments</span></h2>';}
					?>
					
					</table>
					
					<table class="table">
					<?php 
							$counter=0; 
							$class = ''; 
							if (!empty($rows)){
						?>
					<h1><span>Assignment History</span></h1>
						<tr class="row head-row"><th width="15%">Client</th><th width="45%">Assignment</th><th class="action">Date & Time</th><th class="email">File</th><th class="action">Status</th></tr>
						
						<?php foreach ($rows as $row): ?>
						<?php 
							$counter++;
							if(($counter % 2) == 1 ){$class = 'row1';}else{$class = 'row2';}
							$link = '?option=onlinejobs&view=uploaded'; 
						?>
						<tr class="row <?php echo $class; ?>" >
							<td class="action"><?php echo $row['name']; ?></td>
							<td class="title-m"><?php echo $row['title']; ?></td>
							<td class="action"><?php echo $row['submition_date']; ?></td>
							<td class="email"><a href="<?php 
								echo '../../uploads/' . $row['uid'] . '/assignments/' . rawurlencode($row['file_name']); 
							?>">View</a></td>
							<td class="action"><?php echo $row['status']; ?></td>
						</tr>
					<?php 
						endforeach;
						}
					?>
					
				</table>
				</div>

			</div>
        </div>
