<?php
class User extends Model{
	
	public $uID;
	public $first_name;
	public $last_name;
	public $email;
	protected $role_id;
	
	public function __construct(){
		parent::__construct();
		if(isset($_SESSION['uID'])){
			$uData = $this->getOne($_SESSION['uID']);
			$this->uID = $uData['id'];
			$this->first_name = $uData['first_name'];
			$this->last_name = $uData['last_name'];
			$this->email = $uData['email'];
			$this->role_id = $uData['role_id'];
		}
	}
	
	public function getUserName(){
		return $this->first_name.' '.$this->last_name;
	}
	
	public function getUserID(){
		return $this->uID;
	}
	
	public function isRegistered(){
		if(isset($this->role_id)){
			return true;
		}else{
			return false;
		}
	}
	
	public function isAdmin(){
		if($this->role_id == 1){
			return true;
		}else{
			return false;
		}
	}
	
	public function checkUser($email,$password){
		$sql =  'SELECT email, password FROM users WHERE email = ?';
		// perform query
		$results = $this->db->getrow($sql, array($email));
		if($results['password'] == $password){
			return true;
		}else{
			return false;
		}
		
	}
	
	public function getUserFromEmail($email){
		$sql =  'SELECT * FROM users WHERE email = ?';
		// perform query
		$results = $this->db->getrow($sql, array($email));
		$user = $results;
		return $user;
	}
		
}