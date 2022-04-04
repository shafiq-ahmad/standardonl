<?php
defined('_MEXEC') or die ('Restricted Access');


$parts = explode(DS, BASE_PATH);
array_pop($parts);
array_pop($parts);

//Defines.
define('ROOT_PATH', implode(DS, $parts));
//define('ROOT_PATH', BASE_PATH);
define('SITE_PATH', ROOT_PATH);
define('LIB_PATH', ROOT_PATH . DS . 'libraries');
define('THEMES_PATH', ROOT_PATH.DS.'templates');
define('ADMIN_SITE_PATH', ROOT_PATH.DS.'admin'.DS.'site');
define('ADMIN_FRANCHISE_PATH', ROOT_PATH.DS.'admin'.DS.'franchise');


?>