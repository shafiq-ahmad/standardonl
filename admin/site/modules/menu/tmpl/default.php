<?php
defined('_MEXEC') or die ('Restricted Access');


?>
		<ul id="menu" class="menu">
			<li class="node"><a href="index.php?option=onlinejobs">Dash Board</a>
				<ul>
					<li><a href="index.php?option=users&view=users">Users</a></li>
				</ul>
			</li>
			<li class="node"><a class="no-link">Franchises</a>
				<ul>
					<li><a href="index.php?option=onlinejobs&view=franchises">Show All Franchises</a></li>
					<li><a href="index.php?option=onlinejobs&view=franchises&task=add">Add Franchise</a></li>
				</ul>
			</li>
           <li class="node"><a class="no-link">Distributors</a>
				<ul>
					<li><a href="index.php?option=onlinejobs&view=distributors">Show All Distributors</a></li>
					<li><a href="index.php?option=onlinejobs&view=distributors&task=add">Add Distributor</a></li>
				</ul>	   
		   </li>
			<li class="node"><a class="no-link">Clients</a>
				<ul>
					<li><a href="index.php?option=onlinejobs&view=clients">Show All Clients</a></li>
					<li><a href="index.php?option=onlinejobs&view=clients&status=franchise_verified">Client Request</a></li>
				</ul>
			</li>
            <li class="node"><a class="no-link">Packages</a>
				<ul>
					<li><a href="index.php?option=onlinejobs&view=packages">Show Main Packages</a></li>
					<li><a href="index.php?option=onlinejobs&view=packages&task=detail">Show Detail Packages</a></li>
					<li><a href="index.php?option=onlinejobs&view=packages&task=add">Add Main Package</a></li>
					<li><a href="index.php?option=onlinejobs&view=packages&task=addDetail">Add Package Detail</a></li>
				</ul>
			</li class="node">
			<li class="node"><a class="no-link">Assignments</a>
				<ul>
					<li><a href="index.php?option=onlinejobs&view=assignments">Show All Assignments</a></li>
					<li><a href="index.php?option=onlinejobs&view=assignments&task=add">Add Assignment</a></li>
				</ul>
			</li>
			<li class="node"><a href="index.php?option=onlinejobs&view=uploaded">Uploaded</a></li>
			<li class="node"><a>Accounts</a>
				<ul>
					<li><a href="index.php?option=onlinejobs&view=withdraw">Withdraw</a></li>
					<li><a href="index.php?option=onlinejobs&view=transfer">Transfer</a></li>
				</ul>
			</li>
			<li class="node"><a>Profile</a>
				<ul>
					<li class="node"><a href="index.php?option=onlinejobs&view=settings">Settings</a></li>
					<li class="node"><a href="index.php?option=onlinejobs&view=user&task=changePassword">Change Password</a></li>
				</ul>
			</li>
		</ul>