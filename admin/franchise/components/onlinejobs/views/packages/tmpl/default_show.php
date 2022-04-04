<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div class="ic"></div>
		<div id="content">
			<h1><span>Package - [<?php echo $rows[0]['title'] . ' - ' . $rows[0]['package_name'] ; ?>]</span></h1>
			<div id="message">
				<?php
					global $message;
					echo $message;
				?>
			</div>
			<div id="content-wrapper">
				<div class="table">
					<div class="clear"></div>
					<?php $counter=0; $class = ''; ?>
						<?php 
							$link = 'index.php?option=onlinejobs&view=packages'; 
						?>
						<div class="email"><p style="font-size:24px;"><span>Package Cost: </span><span> $<?php echo $rows[0]['cost']; ?></span></p></div>
						<div class="email"><p style="font-size:24px;"><span>Package Monthly Fee: </span><span> $<?php echo $rows[0]['fee']; ?></span></p></div>
					<div class="clear"></div>
				</div>
				
			</div>
        </div>

	</div>
