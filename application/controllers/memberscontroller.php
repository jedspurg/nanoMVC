<?php

class MembersController extends Controller{
	
	public $userObject;
   
   	public function user($uID){
	   
		$this->userObject = new User();
		$user = $this->userObject->getUser($uID);	    
	  $this->set('user',$user);
	   
   	}
	
	public function index(){
		
		$this->userObject = new User();
		$users  = $this->userObject->getAllUsers();
		$this->set('title', 'Members');
		$this->set('users',$users);
	
	}
	
	
}
