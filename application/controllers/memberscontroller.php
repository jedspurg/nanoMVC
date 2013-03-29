<?php
class MembersController extends Controller{
	
	public $user;
   
  public function user($id){
		$user = $this->user->getOne($id);	    
	  $this->set('user',$user);
  }
	
	public function index(){
		$users  = $this->user->getAll();
		$this->set('title', 'Members');
		$this->set('users',$users);
	}
	
}
