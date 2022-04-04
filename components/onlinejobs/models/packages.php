<?php
defined('_MEXEC') or die ('Restricted Access');


	function getPackageDetails($id){
		global $db;
		$sql  = "SELECT * FROM packages_detail WHERE package_id={$id} ";
		return $db->get_by_sql($sql);
	}



?>
