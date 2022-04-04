<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div class="ic"></div>
		<div id="content">
			<h1><span>Packages</span></h1>
			<div id="message">
				<?php
					global $message;
					echo $message;
				?>
			</div>
			<div id="content-wrapper">
				<div class="table1">
					<?php foreach ($rows as $row): ?>
						<?php 
							$link = 'index.php?option=onlinejobs&view=packages'; 
						?>
							<div class="title">
								<h3><a class="check-button-<?php echo $row['title']; ?>" href="<?php echo $link; ?>&task=show&ItemID=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h3>
							</div>
						<div class="row" >
							<div class="paragraph-text">
								<p class="long-text"><?php echo $row['description'];; ?></p>
							</div>
							<div class="image">
								<img src="images/onlinejobs/packages/<?php echo $row['image']; ?>" alt="<?php rawurlencode($row['image']); ?>" title="<?php echo $row['title']; ?>"</a>
							</div>
						</div>
					<div class="clear"></div>
					<?php endforeach; ?>
				</div>
				
				<div id="pagination" style="">
					<?php
					if($pagination->total_pages() > 1) {
						
					if($pagination->has_previous_page()) { 
						echo "<a href=\"index.php?option=onlinejobs&view=packages&page=";
						echo $pagination->previous_page();
						echo "\">&laquo; Previous</a> "; 
					}

					for($i=1; $i <= $pagination->total_pages(); $i++) {
						if($i == $page) {
							echo " <span class=\"selected\">{$i}</span> ";
						} else {
							echo " <a href=\"index.php?option=onlinejobs&view=packages&page={$i}\">{$i}</a> "; 
						}
					}

						if($pagination->has_next_page()) { 
							echo " <a href=\"index.php?option=onlinejobs&view=packages&page=";
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
