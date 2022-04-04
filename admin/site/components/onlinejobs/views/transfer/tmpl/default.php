<?php
defined('_MEXEC') or die ('Restricted Access');

$user_id=$_SESSION['user_id'];

?>
<script>
	function getAccount(id, pos){
		$("#imgLoading").show();
		$.ajax({
			url: "ajax.php?option=onlinejobs&view=ajax&getList=" + id.value, 
			type: "html",
			success: function( data ) 
			{ 
				$(pos).html(data);				
				$("#imgLoading").hide();
			},
			error: errorHandler = function() {
				alert("Error");	
				$("#imgLoading").hide();
			},
			cache: false,
			contentType: false,
			processData: false
		}, 'json');
	}
</script>
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
			<h1><span>Internal Transfer To Franchise/Client</span></h1>

			<div id="content-wrapper">

			
			    <div class="right_content">
    <div>
	<div id="imgLoading" style="display:none;">Loading...</div>
    	<form name="transfer" method="post" action="index.php?option=onlinejobs&view=transfer">
            <p>
                <label for="to">To: Select Account</label>
            </p>
            <p>
                <label for="atype">Account Type: </label>
				<select id="" onchange="return getAccount(this, '#account-no');">
					<option value="">Select Type</option>
					<option value="clients">Client</option>
					<option value="franchise">Franchise</option>
				</select>
            </p>
            <p>
               <label for="accountno">Accountno:</label>
               <div id="account-no">
                <select name="accountno">
					<option value="">--Select--</option>
				</select>			   
			   </div>
               
            </p>
            <p>
            	<label for="amount">Amount</label>
                <input name="amount" value="500" type="text">
            </p>
            <p>
            	<label for="criteria">Criteria</label>
                <input name="criteria" value="Cr" checked="checked" type="radio">Credit<input name="criteria" value="Dr" type="radio">Debit
            </p>
            <label for="note">Note</label><p>
            	
                <textarea name="note" cols="30" rows="4"></textarea>
            </p>
            <p class="submit">
                <input name="add_transfer" id="add_transfer" value="Transfer" type="submit">
            </p>
            
        </form>
    </div>
    
</div>
				
			</div>
        </div>

	</div>
