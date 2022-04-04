<?php
defined('_MEXEC') or die ('Restricted Access');
?>
	<div class="moduletable">
		<div><h3>Dash Board</h3></div>
		<ul class="menu">
			<li><a href="index.php?option=onlinejobs&view=clients">Clients</a></li>
			<li><a href="index.php?option=onlinejobs&view=clients&task=add">Add Clients</a></li>
			<li><a href="index.php?option=onlinejobs&view=accounts&task=withdraw">Withdraw</a></li>
			<li><a href="index.php?option=onlinejobs&view=accounts&task=statistics">Statistics</a></li>
           <li><a href="index.php?option=onlinejobs&view=user&task=changePassword">Change Password</a></li>
			<li class=""><a href="index.php?option=onlinejobs&view=accounts&task=payments">Process Payment Vouchers</a></li>
		</ul>
	</div>
	<div class="moduletable">
		<div><h3>Packages</h3></div>
		<ul class="menu">
		<?php
			foreach ($packages as $package):
			$package_link='index.php?option=onlinejobs&view=packages&task=show&ItemID=' . $package['id'];
				echo '<li>';
				echo '<a href="' . $package_link . '"> ' . $package['title'] . ' - ' . $package['package_name'] . '</a>' ;
				echo '</li>';
			endforeach;
			?>
		</ul>
	</div>
