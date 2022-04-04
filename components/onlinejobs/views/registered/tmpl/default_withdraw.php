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
		<div class="ic"></div>
		<div id="content"><br />
			<h2><span>Withdraw Funds</span></h2>
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

					
<form id="withdraw-form" action="index.php?option=onlinejobs&view=registered&task=withdraw" name="form-withdraw" method="post" >
	<div class="">
		<p><label for="amount">Amount:</label><input name="amount" id="amount" class="required number" type="text" size="50"></p>
		<p><label for="note">Note:</label>
		<textarea name="note" id="" cols="40" rows="10" ></textarea></p>
		
		<p><input name="request_amount" id="request_amount" class="button" value="Request Amount" type="submit"></p>

	</div>				
</form>
					
					

					
			</div>
        </div>

	</div>

</div>