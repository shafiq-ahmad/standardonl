<?php
defined('_MEXEC') or die ('Restricted Access');

?>

<?php
	$messages = Session::getMessages();
	if(!empty($messages)){
		echo '<div id="messages">';
			foreach ($messages as $msg){
				echo $msg . '<br />';
			}
		echo '</div>';
	}
?>
<style>
	fieldset {border:1px solid gray; padding:20px 10px;}
</style>

<script type="text/javascript">
$(document).ready(function(){	
	$("#submit-password").validate({
	rules: { field: {required: true, number: true} }
	});

});
</script>
<fieldset>
<legend></legend>
<p>Hello <?php echo $user['name']; ?>, Please enter your new password.</p>
<form id="submit-password" method="post" action="index.php?option=users&view=reset">
	<div>
		<p><input type="submit" name="reset_password" value="Change" /></p>
	</div>
</form>
</fieldset>

