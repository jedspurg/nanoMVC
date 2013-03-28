<?php

class LoginController extends Controller{
	
   protected $userObject;
   
   	public function do_login(){

			$this->userObject = new User();
			$password = md5(sha1($_POST['user_password']));
			
			if($this->userObject->checkUser($_POST['user_email'],$password)){
				
				$userInfo = $this->userObject->getUserFromEmail($_POST['user_email']);
				
				$_SESSION['uID'] = $userInfo['uID'];
				
				if(strlen($_SESSION['redirect']) > 0){
					
					$view = $_SESSION['redirect'];
					unset($_SESSION['redirect']);
					
					header('Location: '.BASE_URL.$view);
					
				}else{
				
					header('Location: '.BASE_URL);
				
				}
				
			}else{
				
				$this->set('error','Either your credentials are incorrect, or you are not a registered user of this site.');
				$this->set('task','do_login');
				
			}
			
			
	   
   	}
		
	public function logout(){
			
			unset($_SESSION['uID']);
			session_write_close();
			header('Location: '.BASE_URL);
			
		}
		
	public function restricted(){
			$this->set('error','You do not have access to this page. Please login below.');
			$this->set('task','do_login');
			
		}
	
	public function index(){
		
	
		$this->set('task','do_login');
	
	}
	
	
}