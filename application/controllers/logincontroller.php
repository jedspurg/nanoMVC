<?php
class LoginController extends Controller{
	
	protected $user;
   
	public function do_login(){

		$password = md5(sha1($_POST['password']));
		if($this->user->checkUser($_POST['email'],$password)){
			$userInfo = $this->user->getUserFromEmail($_POST['email']);
			$_SESSION['uID'] = $userInfo['id'];
			if(strlen($_SESSION['redirect']) > 0){
				$view = $_SESSION['redirect'];
				unset($_SESSION['redirect']);
				header('Location: '.BASE_URL.'/'.$view);
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
	
}