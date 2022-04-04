<?php
defined('_MEXEC') or die ('Restricted Access');

?>

  <script type="text/javascript">
  $(document).ready(function(){
    $("#add-client").validate({
  rules: {
    field: {
      required: true,
      number: true
    }
  }
});
  });
  </script>
    <script type="text/javascript">
  
  $(document).ready(function(){
    $("#commentForm").validate();
  });
  </script>
  
	<div id="main-wrapper">
		<div id="content">
			<h1><span>Edit Assignment</span></h1>

			<div id="content-wrapper">
			<?php
				if($sel_row){
			?>
				<form id="add-client" action="?option=onlinejobs&view=assignments" method="post">
					<table class="form">
							<input id="id" type="hidden" name="id" value="<?php echo $sel_row[0]['id']; ?>" />
							<tr>
								<td width="20%" ><label for="name">Name: </label></td><td><input id="name" class="required inputbox" type="text" name="name" value="<?php echo $sel_row[0]['title']; ?>" size="15" /></td>
							</tr>
							<tr>
								<td><label for="desc">Description: </label></td><td><input id="desc" class="required inputbox" type="text" name="description" value="<?php echo $sel_row[0]['description']; ?>" size="15" /></td>
							</tr>
							<tr>
								<td><label for="amount">Price: </label></td><td><input id="amount" class="number required inputbox" type="text" name="amount" value="<?php echo $sel_row[0]['amount']; ?>" size="15" /></td>
							</tr>
							<tr>
								<td>
									<label for="package">Select Package: </label></td><td>
									<select id="package" class="inputbox" name="package"  >
									<?php foreach ($packages_list as $package): ?>
										<option <?php if($package['id']==$sel_row[0]['pid']){ echo "selected=\"selected\"";} ?> value="<?php echo $package['id']; ?>"><?php echo $package['title'] . ' - ' . $package['package_name']; ?></option>
									<?php endforeach; ?>
									</select>
								</td>
							</tr>
							<tr>
								<td><label for="details">Details: </label></td>
							</td>
							<tr>
								<td colspan="2"><textarea id="details" class="required textarea editor" cols="123" rows="10" name="details" method="post" action="#" ><?php echo $sel_row[0]['details']; ?></textarea></td>
							</tr>
							<tr class="form-button">
								<td><span><input type="reset" name="reset" value="Cancel" onclick="history.back()" /></span>
								<span><input type="reset" name="reset" value="Reset" /></span>
								<span><input type="submit" name="edit_assignment" value="Update" /></span></td>
							</tr>
					</table>
				</form>
				<?php } ?>
			</div>
        </div>

	</div>
