<?php
class View {
	
	public function load($folder, $file_name, $data = array(), $include_header_footer){	
		//extract data from the controller and overwrite session data if present
		if( is_array($data)) {
			 extract($data);
		}
		//instantiate our user object
		$u = new User();
		//show the view
		if($include_header_footer){
			include('views/elements/header.php');
		}
		include 'views/' .$folder.'/'. $file_name.'.php';
		if($include_header_footer){
			include('views/elements/footer.php');
		}
  }
	
}



