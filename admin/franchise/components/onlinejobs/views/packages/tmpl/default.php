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
			<h1><span>Package</span></h1>
			<div id="content-wrapper">
				<div class="table">

				</div>
			
			</div>
        </div>

	</div>
