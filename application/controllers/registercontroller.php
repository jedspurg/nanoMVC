<?php

class RegisterController extends Controller{
	
		protected $userObject;
   
   	public function process(){
			
			if($_POST['user_password'] != $_POST['user_password_retype']){
				$this->set('error', 'Passwords do not match');
				return false;
			}
			
			$this->userObject = new User();
			
			$password = md5(sha1($_POST['user_password']));
			
			$data = array('first_name'=>$_POST['user_first_name'],'last_name'=>$_POST['user_last_name'], 'email'=>$_POST['user_email'], $password, 'user_type'=>'2');
			
			$result = $this->userObject->addUser($data);
	   
			$this->set('message', $result);
	   
   	}	
	
}
