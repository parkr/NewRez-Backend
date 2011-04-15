<?php

function getMiniName($image){
	$new_name_parts = explode('.', $image);
	$new_name = "";
	for($i=0; $i<count($new_name_parts)-1; $i++){
		$new_name .= $new_name_parts[$i];
	}
	$new_name .= "_mini.jpg";
	return $new_name;
}

?>