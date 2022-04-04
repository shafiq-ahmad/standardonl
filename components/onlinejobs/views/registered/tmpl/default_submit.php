<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div id="content"><div class="regiPnl"><br />
			<h2><span>Submit Assignment</span></h2>
			<div id="message">
				<?php
					global $message;
					echo $message;
				?>
			</div>
			<div id="content-wrapper">
				<div class="table">
					<div class="cleaner"></div>
					<?php $counter=0; $class = ''; ?>

					
<form action="index.php?option=onlinejobs&view=registered&task=submit" name="form-assignment" method="post" 
 enctype="multipart/form-data">
	<div class="">
		<p><label for="file">Report File:</label><input name="file" id="file" type="file"></p>
		<p><label for="for">Assignment:</label>
		
		<select name="assignment">
		<?php
			foreach ($currentAssignment as $current){
		?>
			<option value="<?php echo $current['id']; ?>"><?php echo $current['title']; ?></option>
		<?php } ?>
		</select></p>
		
		
		<p><input name="submit_assignment" id="submit_assignment" value="Submit" type="submit"></p>

	</div>				
</form>
				<table class="table">
						<tr class="row head-row"><th class="email">Submission Date</th><th class="email">Uploaded Filename</th><th class="name">Max Price</th><th class="email">Status</th><th class="phone">Price Recieve</th></tr>
					
	
						<?php 
							if (!empty($rows)){
							foreach ($rows as $row): ?>
						<?php 
							$counter++;
							if(($counter % 2) == 1 ){$class = 'row1';}else{$class = 'row2';}
							$link = 'index.php?option=onlinejobs&view=registered&task=submit'; 
						?>
						<tr class="row <?php echo $class; ?>" >
							<td class="email"><?php echo $row['submition_date']; ?></td>
							<td class="email"><?php echo $row['file_name']; ?></td>
							<td class="name"><?php echo $row['amount']; ?></td>
							<td class="email"><?php echo $row['status']; ?></td>
						</tr>
					<div class="cleaner"></div>
					<?php 
						endforeach; 
						}				
					?>
					
					
				</table>
					
					

					
			</div>
			</div>
        </div>

	</div>

</div>