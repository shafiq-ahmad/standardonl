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
		<div class="ic"></div>
		<div id="content">
			<h1><span>Accounts</span></h1>
			<div id="content-wrapper">
				<div class="table">
					<h3>Tasks</h3>
					<?php //print_r($sel_row);?>
				<table class="table">
					<tr class="row head-row"><th class="name">Client</th><th class="name">Request on</th><th class="name">Amount</th><th class="name">Status</th></tr>
					<?php if($sel_row){ ?>
						<tr class="row" >
							<td class="name"><span title="Full Name: <?php echo $sel_row[0]['name']; ?>"><?php echo $sel_row[0]['login_name']; ?></span></td>
							<td class="name"><?php echo $sel_row[0]['approve_date']; ?></td>
							<td class="name">$<?php echo $sel_row[0]['amount']; ?></td>
							<td class="name"><span title="<?php 
													if(isset($sel_row[0]['paid_by_login'])){
														echo "Paid By: " . $sel_row[0]['paid_by_login'];
													}
													if(isset($sel_row[0]['paid_by_name'])){
														echo "\nPaid By Full Name: " . $sel_row[0]['paid_by_name'];
													}
													?>"><?php echo $sel_row[0]['status']; ?></span></td>
						</tr>
					<?php } ?>					

				</table>
				</div>
				
				
			</div>
        </div>

	</div>
