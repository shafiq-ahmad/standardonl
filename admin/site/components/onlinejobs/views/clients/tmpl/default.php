<?php
defined('_MEXEC') or die ('Restricted Access');


?>
<script>
	$(function() {
		$( "#from" ).datepicker({ dateFormat: "yy-mm-dd" });
		$( "#to" ).datepicker({ dateFormat: "yy-mm-dd" });
	});
</script>
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
	<div id="main-wrapper">

		<div id="content">
				<?php
					if ($status=='franchise_verified'){
						echo '<h1><span>';
						echo "Clients Request - [For final approval]";
						echo '</span></h1>';	
					}else{
						echo '<h1><span>';
						echo "Active Clients"; 
						echo '</span></h1>';	
					?>
					
						<div class="form" style="width:350px;">
							<form id="find_clients" name="find_clients" class="find_clients" action="index.php?option=onlinejobs&view=clients" method="post" >
								<p><label>*From: </label><input type="text" class="inputbox" name="from" id="from" value="" readonly /></p>
								<p><label>*To: </label><input type="text" class="inputbox" name="to" id="to" value="" readonly /></p>
								<p><label>Client: </label><input type="text" class="inputbox" name="client" id="client" value="" /></p>
								<p><label>Status</label>
									<select type="text" name="status" id="status" class="inputbox" >
										<option value="*" >Any</option>
										<option value="registered" >Registered</option>
										<option value="pending" >Pending</option>
										<option value="1" >Active</option>
										<option value="0" >Inactive</option>
									</select>
								</p>
								<p><label>Franchise: </label>
								<?php 
									echo htmlList($franchise_list, 'franchise', 'inputbox');
								
								?></p>
								</p>
								<p><label>Package: </label>
								<?php 
									echo htmlList($packages, 'package', 'inputbox');
								
								?></p>
								<p><input type="submit" name="search_client" value="Search" /></p>
							</form>
						</div>
						
				<?php }
				?>
			<div id="content-wrapper">
				<table class="table">
					<tr class="row head-row"><th class="id">ID</th><th class="name">Login Name</th><th class="status">Status</th><th class="email">Email</th><th class="phone">Phone</th><th class="city-country">City/Country</th><th class="actopm">Action</th></tr>
					<?php $counter=0; $class = '';
							if ($rows){
					?>
					<?php foreach ($rows as $row): ?>
						<?php 
							$counter++;
							if(($counter % 2) == 1 ){$class = 'row1';}else{$class = 'row2';}
							$link = 'index.php?option=onlinejobs&view=clients'; 
							if ($row['published']==1){$state='Unpublish';}else{$state='Publish';}
						?>
						<tr class="row <?php echo $class; ?>" >
							<td class="id"><?php echo $row['id']; ?></td>
							<td class="name"><a href="index.php?option=onlinejobs&view=accounts&ItemID=<?php echo $row['id']; ?>" target="_blank" title="<?php
								echo 'Name: ' . $row['name'];
								if(isset($row['franchise_name'])){echo "\nFranchise: " . $row['franchise_name'];}
								if(isset($row['balance'])){echo "\nBalance: " . $row['balance'];}
							?>"><?php echo $row['login_name']; ?></a></td>
							<td class="status"><?php //echo $row['name']; ?>
								<a class="check-button-<?php echo $row['published']; ?>" href="<?php echo $link; ?>&ItemID=<?php echo $row['id'] . '&published=' . toggleState($row['published']); ?>"><?php echo $state; ?></a>
							</td>
							<td class="email"><?php echo $row['e_mail']; ?></td>
							<td class="phone"><?php echo $row['phone']; ?></td>
							<?php $country = getElementById('countries', $row['country']); ?>
							<td class="city-country"><?php echo $row['city'] . '/' . $country[0]['name']; ?></td>
							<td class="action">
								<?php
									if ($status=='franchise_verified'){
								?>
								<a href="<?php echo $link; ?>&task=register&ItemID=<?php echo $row['id']; ?>">Register</a>								<?php
									}else{
								?>
								<a href="<?php echo $link; ?>&task=edit&ItemID=<?php echo $row['id']; ?>">Edit</a> | 
								<a href="<?php echo $link; ?>&task=delete&ItemID=<?php echo $row['id']; ?>">Delete</a> 
							<?php
									}
							?>
							</td>
						</tr>
					<?php endforeach; 
						}else{ echo '<h2>No Clients.</h2>';}
					?>
				</table>
				
				<div id="pagination" style="">
					<?php
					if($pagination->total_pages() > 1) {
						
					if($pagination->has_previous_page()) { 
						echo "<a href=\"index.php??option=onlinejobs&view=clients&page=";
						echo $pagination->previous_page();
						echo "\">&laquo; Previous</a> "; 
					}

					for($i=1; $i <= $pagination->total_pages(); $i++) {
						if($i == $page) {
							echo " <span class=\"selected\">{$i}</span> ";
						} else {
							echo " <a href=\"index.php?option=onlinejobs&view=clients&page={$i}\">{$i}</a> "; 
						}
					}

						if($pagination->has_next_page()) { 
							echo " <a href=\"index.php?option=onlinejobs&view=clients&page=";
							echo $pagination->next_page();
							echo "\">Next &raquo;</a> "; 
					}
						
					}

					?>
					<div class="cleaner"></div>
				</div>
				
			</div>
        </div>

	</div>
