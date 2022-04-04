<?php

define('_MEXEC', 1);
define('_ADMIN', 'site');
define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', dirname(__FILE__) );


$messages=array();
$errors=array();

// Call Framework

require_once 'includes/defines.php';
require_once 'includes/framework.php';

// Template
 
require_once 'templates/system/header.php';

if ($session->is_logged_in() && $session->getAdminType()=='site') {
?>
	<div id="header-box">
	<div id="module-status">
		<span class="backloggedin-users">Welcome <?php 
													echo $_SESSION['fullname']; 
													?>
		</span>
		<span class="logout"><a href="index.php?option=login&task=logout">Log out</a></span>		
	</div>
	<div id="module-menu">
		<?php
			require_once 'modules/menu/menu.php';
		?>
	</div>
	<div class="clear"></div>
</div>
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
<?php
}
	require_once 'components/' . $v_option . '/' . $v_option . '.php';

	
	require_once 'templates/system/footer.php';
?>


