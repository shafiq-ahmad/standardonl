<?php
defined('_MEXEC') or die ('Restricted Access');

?>

<script>
	$(document).ready(function(){
	$("#process-voucher").validate({
	rules: {
	field: {
	required: true,
	number: true
	}
	}
	});
	});
</script>
	<div id="main-wrapper">
		<div class="ic"></div>
		<div id="content">
			<h1><span>Check Voucher Status</span></h1>
			<div id="content-wrapper">
			
				<div class="form" style="width:49%;">
					<h3><span>Process or Check Voucher Status</span></h3>
					<form id="process-voucher" action="index.php?option=onlinejobs&view=accounts" method="post">
						<table class="form">
							<div class="column cols-2" id="column1" >
								<tr><td><input id="name" class="required number inputbox form-field" type="text" name="voucher" value=""  size="15" style="width:150px;" /></td></tr>
								
								<tr><td class="form-button">
									<span><input type="submit" name="voucher_status" value="Status" /></span>
									<span><input type="submit" name="process_voucher" value="Process" /></span>
								</td></tr>
							</div>
						</table>
					</form>
				</div>
			
				<table class="table">
					<tr class="row head-row"><th class="name">Client</th><th class="name">Request on</th><th class="name">Amount</th><th class="name">Status</th></tr>
					<?php foreach($vouchers as $voucher){ ?>
						<tr class="row" >
							<td class="name"><?php echo $voucher['name']; ?></td>
							<td class="name"><?php echo $voucher['approve_date']; ?></td>
							<td class="name">$<?php echo $voucher['amount']; ?></td>
							<td class="name"><?php echo $voucher['status']; ?></td>
						</tr>
					<?php } ?>					

				</table>

				
			</div>
        </div>

	</div>
