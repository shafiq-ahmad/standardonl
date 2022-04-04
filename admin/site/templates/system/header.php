<?php
defined('_MEXEC') or die ('Restricted Access');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
	<title>Administration</title>

	<link rel="stylesheet" href="templates/system/css/global.css" type="text/css" media="screen" />


			<?php
				require_once ROOT_PATH . '/media/admin_media.php';
			?>	

  <script type="text/javascript">
	window.onunload = function() {};
</script>

  <script type="text/javascript">
	window.addEvent('domready', function () {
		document.getElementById('form-login').username.select();
		document.getElementById('form-login').username.focus();
	});
</script>

<script type="text/javascript">
$(document).ready(function() {
	var arr = $('.editor').rte({
		css: ['default.css'],
		controls_rte: rte_toolbar,
		controls_html: html_toolbar
	});


});
</script>
</head>

<body>
	<div id="border-top" class="h_blue">
		<span class="title" style="float:right;margin-right:10px;">standardonlinejob.com</span>
		<span class="title" style="float:left;"><a href="index.php">Administration</a></span>
	</div>

<div id="content-box">
	