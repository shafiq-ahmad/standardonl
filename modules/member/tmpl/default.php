<?php
defined('_MEXEC') or die ('Restricted Access');
global $v_view;
$class = '';

?>

<h3>Member Area</h3> 
<p>Welcome <?php 
	echo $full_name;
	//echo $user_id;
?> </p>
<p style="text-align:right; width:100%;">Your Balance: <?php echo $balance; ?></p>
<ul class="menu widgetCont">
<li><a href="index.php?option=onlinejobs&view=registered" >Client Area</a>
<li><a href="index.php?option=onlinejobs&view=registered" >Current Assignments</a></li>
<li><a href="index.php?option=onlinejobs&view=registered&task=submit" >Submit Assignment</a></li>
<li><a href="index.php?option=onlinejobs&view=registered&task=withdraw" >Withdraw Funds</a></li>
<li><a href="index.php?option=onlinejobs&view=registered&task=history" >History</a></li>
<li><a href="index.php?option=onlinejobs&view=registered&task=yourLink" >Your Referral Link</a></li>
<li><a href="index.php?option=users&view=change_password" >Change Password</a></li>
</li>
<li><a href="index.php?option=user&task=logout">Log out</a></li>
</ul>		