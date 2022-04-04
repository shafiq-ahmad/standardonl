<?php

define('_MEXEC', 1);
define('DS', DIRECTORY_SEPARATOR);
define('_ADMIN', 'franchise');
define('BASE_PATH', dirname(__FILE__) );

//session_start();
// Call Framework
require_once 'includes/defines.php';
require_once 'includes/framework.php';
require_once 'components/' . $v_option . '/' . $v_option . '.php'; 

?>

