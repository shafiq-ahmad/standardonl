<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div id="content" style="float:left;margin-top:20px;" ><div class="regiPnl"><br>
			<h2><span>Welcome <span style="text-transform:uppercase;" ><?php echo $full_name; ?></span> to your member account </span></h2>
			<div id="message">
				<?php
					global $message;
					echo $message;
				?>
			</div>
			<div id="content-wrapper">
					<?php $counter=0; $class = ''; ?>
	<h2><?php echo $client[0]['package'] . ' - ' . $client[0]['package_name']; ?>: Assignments</h2>
<div>
	&nbsp;</div>

<div>
	<p><strong>Assignment Title: </strong><?php echo $currentAssignment[0]['title']; ?></p>
	<p><strong>Assignment Description: </strong><?php echo $currentAssignment[0]['description']; ?></p>
	<p><strong>Assignment Price: </strong>$<?php echo $currentAssignment[0]['amount']; ?></p>
	<p><strong>Assignment Date: </strong><?php echo $currentAssignment[0]['assignment_date']; ?></p>
	<p><strong>Assignment Details: </strong></p>
	<p style="padding-left:120px;" ><?php echo nl2br($currentAssignment[0]['details']); ?></p>
</div>
<hr />
<div>
	Completed Assignment must be send before starting new Assignment.</div>
<div>
	&nbsp;</div>
<div>
	&nbsp;</div>
<div> Suppose. if you post assignment 1 in Jan then you must post all other assignment in the same month. All Assignments must be done in the given period as per&nbsp;</div>
<div>&nbsp;</div>
<div>
	Package and after the date no assignment will be entertined before you can post assignment 1,2.3 again</div>
<div>each assignment can be done once only each month</div>
<div>you can post on each site once only</div>
<div>only 1 ad per domain</div>
<div>&nbsp;</div>
<div>All assignment must be posted in relevant categories and on relevant sites</div>
<div>&nbsp;</div>
<div>Report format must be in the correct order:</div>
<div>&nbsp;</div>
<div>As you complete a &nbsp;report upload it to sarver and submit the .txt file by uploading from Submit Assignment Page.</div>
<div>&nbsp;</div>
<div>
	Please note you have to complete a report before you can start on the next one</div>
<div>
	Suppose if you are posting assignment 1 you must complete the assignment and submit before you can start on assignment 2</div>
<div>
	&nbsp;</div>
<div>
	Project Starting Date (00:00 Daily); Submission Date (23:00 Daily)</div>
<div>
	<div>
		&nbsp;</div>
	<div>Package Details: 
		$<?php echo $client[0]['max_earning']; ?>  = <?php echo $client[0]['work']; ?></div>
</div>


			</div>
        </div>
		</div>
	</div>

