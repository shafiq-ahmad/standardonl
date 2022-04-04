<?php
defined('_MEXEC') or die ('Restricted Access');

?>
<script>
	$(document).ready(function(){
	$("#withdraw-form").validate({
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
		<div id="content">
			<h1><span>Withdraw Funds</span></h1>
			<div id="content-wrapper">
				<div class="from">
					<div class="clear"></div>
					<?php $counter=0; $class = ''; ?>

					
<form id="withdraw-form" action="index.php?option=onlinejobs&view=accounts" name="form-withdraw" method="post" >
	<table class="">
		<tr><td><label for="amount">Amount:</label></td><td><input name="amount" id="amount" class="required number" type="text" size="50"></td></tr>
		<tr><td><label for="note">Note:</label></td><td></td></tr>
		<tr><td></td><td><textarea name="note" id="" cols="40" rows="10" ></textarea></td></tr>
		
		<tr><td></td><td><input name="request_amount" id="request_amount" class="button" value="Request Amount" type="submit"></td></tr>

	</table>				
</form>
					
					

					
			</div>
        </div>

	</div>

</div>