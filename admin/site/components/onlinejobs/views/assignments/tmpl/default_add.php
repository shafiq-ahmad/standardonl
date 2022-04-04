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
		<div class="ic"></div>
		<div id="content">
			<h1><span>Add new Assignment</span></h1>
			<div id="content-wrapper">
				<form id="add-client" action="?option=onlinejobs&view=assignments" method="post">
					<table class="form">
							<tr>
								<td width="20%" ><label for="name">Name: </label></td><td><input id="name" class="required inputbox" type="text" name="name" value="" size="15" /></td>
							</tr>
							<tr>
								<td><label for="desc">Description: </label></td><td><input id="desc" class="required inputbox" type="text" name="description" value="" size="15" /></td>
							</tr>
							<tr>
								<td><label for="amount">Price: </label></td><td><input id="amount" class="number required inputbox" type="text" name="amount" value="" size="15" /></td>
							</tr>
							<tr>
								<td><label for="package">Select Package: </label></td>
								<td><select id="package" class="inputbox" name="package"  >
									<?php foreach ($packages_list as $package): ?>
										<option value="<?php echo $package['id']; ?>"><?php echo $package['title'] . ' - ' . $package['package_name']; ?></option>
									<?php endforeach; ?>
									</select>
								</td>
							</tr>
							<tr>
								<td><label for="details">Details: </label></td>
							</tr>
							<tr>
								<td colspan="4" ><textarea id="details" class="required textarea editor" cols="123" rows="10" name="details" method="post" action="#" ></textarea></td>
							</tr>
							<tr class="form-button">
								<td><span><input type="reset" name="reset" value="Cancel" onclick="history.back()" /></span>
								<span><input type="reset" name="reset" value="Reset" /></span>
								<span><input type="submit" name="add_assignment" value="Create" /></span></td>
							</tr>
					</table>
				</form>
			</div>
        </div>

	</div>
