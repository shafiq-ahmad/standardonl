<?php
defined('_MEXEC') or die ('Restricted Access');



function htmlList($list, $name, $class, $sel_id=0){
	$result='';
	$result = '<select id="' . $name . '" class="' . $class . '" name="' . $name . '" >';
		$result .= '<option value="0" >Select A ' . $name . '</option>';
	
	foreach ($list as $row):
		$result .= '<option value="' . $row['id'] . '" ' ;
			if($row['id']==$sel_id){
				$result .= 'selected="selected"';
			} 
			$result .= '>';
			$result .= $row['name'];
		$result .= '</option>';
	 endforeach; 
	$result .= '</select>';
	
	return $result;
}


?>