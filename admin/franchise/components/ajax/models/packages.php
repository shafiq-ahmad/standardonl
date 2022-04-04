<?php
defined('_MEXEC') or die ('Restricted Access');


	function getAjaxPackage($id){
		global $db;
		$sql  = "SELECT p.title, pd.* FROM packages AS p INNER JOIN packages_detail AS pd ON (p.id=pd.package_id) ";
		$sql .= "WHERE p.published=1 AND pd.id={$id} ";
		$sql .= "LIMIT 1";
		return $db->get_by_sql($sql);
	}

?>
