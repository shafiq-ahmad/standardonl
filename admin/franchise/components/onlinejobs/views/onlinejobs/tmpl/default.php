<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div id="content">
			<h1><span>Franchise Panel</span></h1>
			<div>
				<div class="form" style="width:49%;">
					<h3><span></span></h3>
					<form id="dash-client" action="index.php?option=onlinejobs" method="post">
						<table class="form">
							<div class="column cols-2" id="column1" >
								<tr><td><label>From: </label></td><td><input id="name" class="inputbox form-field" type="text" name="name" value="" size="15" style="width:150px;" /></td></tr>
								<tr><td><label>To #: </label></td><td><input id="phone" class="inputbox form-field" type="text" name="phone" value="" size="15" style="width:150px;" /></td></tr>
							</div>
							<div class="cleaner"></div>
							<tr><td><input type="reset" class="button" name="reset" value="Reset" /> <input type="submit" class="button" name="show_clients_date" value="Show" /></td></tr>
						</table>
					</form>
				</div>
			
			</div>
			<div id="content-wrapper">
				<div class="form">
					<div class="clear"></div>

				</div>

				
			</div>
        </div>

	</div>
