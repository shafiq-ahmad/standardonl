<?php
defined('_MEXEC') or die ('Restricted Access');

$row=array_shift(getBalance($user_id));
$balance = $row['balance'];
require_once("tmpl/default.php");

?>
