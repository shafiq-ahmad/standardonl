<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div class="ic"></div>
		<div id="content"><br />
			<h2><span>Transaction History</span></h2>
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

					
				<table class="table">
						<tr class="row head-row"><th class="email">Date</th><th class="description">Perticular</th><th class="amount">Debit</th><th class="amount">Credit</th><th class="amount">Cr/Dr</th><th class="name">Amount</th></tr>
					<div class="cleaner"></div>
					<?php $counter=0; $class = '';
							if ($history){
					?>
					<?php foreach ($history as $row): ?>
						<?php 
							$counter++;
							if(($counter % 2) == 1 ){$class = 'row1';}else{$class = 'row2';}
							$link = 'index.php?option=onlinejobs&view=clients'; 
						?>
						<tr class="row <?php echo $class; ?>" >
							<td class="email"><?php echo $row['transaction_date']; ?></td>
							<td class="description"><?php echo $row['perticullar']; ?></td>
							<td class="amount"><?php echo $row['debit']; ?></td>
							<td class="amount"><?php echo $row['credit']; ?></td>
							<td class="amount"><?php echo $row['cr_dr']; ?></td>
							<td class="name"><?php echo $row['amount']; ?></td>
						</tr>
					<div class="cleaner"></div>
					<?php endforeach; 
						}else{ echo '<h2>No Transactions.</h2>';}
					?>	
				</table>
					
					

					
			</div>
        </div>

	</div>

</div>