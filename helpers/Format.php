<?php 

class Format{
	
	public function validation($data){
		$data = trim($data);
		//remove unnecessary character like extra space, tab, newline
		$data = stripcslashes($data);
		//remove back slash
		$data = htmlspecialchars($data);
		//some special character converted into html entities;Cross-site Scripting attacks theke safe kore
		return $data;
	}
}

?>