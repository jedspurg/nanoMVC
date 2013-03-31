<?php
class RegisterController extends Controller{
	
		protected $user;
   
   	public function process(){
			if($_POST['password'] != $_POST['password_retype']){
				$this->set('error', 'Passwords do not match');
				return false;
			}
			unset($_POST['password_retype']);
			$_POST['password'] = md5(sha1($_POST['password']));
			$result = $this->user->create($_POST);
   	}	
	
}
