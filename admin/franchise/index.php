<?php

define('_MEXEC', 1);
define('_ADMIN', 'franchise');
define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', dirname(__FILE__) );


// Call Framework
require_once 'includes/defines.php';
require_once 'includes/framework.php';

// Template

require_once 'templates/system/header.php';

if ($session->is_logged_in() && $session->getAdminType()=='franchise') {
?>
	<div id="header-box">
	<div id="module-status">
		<span class="backloggedin-users">Welcome <?php 
													echo $_SESSION['fullname']; 
													?>
		</span><span>Cr: <?php echo $balance; ?></span>
		<span class="logout"><a href="index.php?option=login&task=logout">Log out</a></span>

	
	</div>
	</div>
	<div class="clear"></div>
		<?php
		}
		$messages = Session::getMessages();
		if(!empty($messages)){
			echo '<div id="messages">';
				foreach ($messages as $msg){
					echo $msg . '<br />';
				}
			echo '</div>';
		}
		?>
		
	<div id="main">
		<div>
			<div style="float:left;width:19%;padding-left:1%;">
				<?php 
					$content_width='100%';
					if ($session->is_logged_in() && $session->getAdminType()=='franchise') {
						require_once 'modules/menu/menu.php'; 
					$content_width='80%';
					}
				?>
			</div>

			<div style="float:right;width:<?php echo $content_width; ?>;">
				<?php require_once 'components/' . $v_option . '/' . $v_option . '.php'; ?>
			</div>
		</div>
	</div>

<?php
	
	require_once 'templates/system/footer.php';
?>


