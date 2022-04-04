<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div class="ic"></div>
		<div id="content">
			<center><h1><span>Topic - [<?php echo $sel_row[0]['subject']; ?>]</span></h1></center>
			<div id="message">
				<?php
					global $message;
					echo $message;
				?>
			</div>
			<div id="content-wrapper">
				<div class="question-table table">
					<?php foreach ($sel_row as $row): ?>
						<div class="row " >
							<div><p><span class="name"><strong>Ask By: </strong><?php echo $row['name']; ?></span>, <span class="datetime"><strong>Date: </strong><?php echo $row['sent_date']; ?></span></p></div>
							<div><p><span class="name"><?php echo $row['message_body']; ?></span></p></div>
						</div>
					<div class="cleaner"></div>
					<?php endforeach; ?>
				</div>
				<div class="answer-table table">
					<?php 
						if ($replies){
							echo '<ul style="list-style-type:none;margin:5px 0;">';
							foreach ($replies as $reply): 
							echo '<li>';
					?>
							<div class="reply row" >
								<div><span class="name"><strong>Answer By: </strong><?php echo $reply['name']; ?></span>, <span class="datetime"><strong>Date: </strong><?php echo $reply['sent_date']; ?></span></div>
								<div><p><span class="name"><?php echo $reply['message_body']; ?></span></p></div>
							</div>
							<div class="cleaner"></div>
					<?php
							echo '</li>';
							endforeach; 
							echo '</ul>';
						} 
					?>
				</div>

				
			</div>
        </div>

	</div>
