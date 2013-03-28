<?php

class View {
	
	public function load($folder, $file_name, $data = array()){
	
		//extract data from the controller and overwrite session data if present
		if( is_array($data)) {
			 extract($data);
		}
		//instantiate our user object
		$u = new User();
		//show the view
		include 'views/' .$folder.'/'. $file_name.'.php';
  }
	
}



