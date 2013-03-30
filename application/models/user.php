<?php
class User extends Model{
	
	public $uID;
	public $first_name;
	public $last_name;
	public $email;
	protected $type;
	
	
	public function __construct(){
		parent::__construct();
		if(isset($_SESSION['uID'])){
			$uData = $this->getOne($_SESSION['uID']);
			$this->uID = $uData['id'];
			$this->first_name = $uData['first_name'];
			$this->last_name = $uData['last_name'];
			$this->email = $uData['email'];
			$this->type = $uData['user_type'];
		}
	}
	
	public function getUserName(){
		return $this->first_name.' '.$this->last_name;
	}
	
	public function getUserID(){
		return $this->uID;
	}
	
	public function isRegistered(){
		if(isset($this->type)){
			return true;
		}else{
			return false;
		}
	}
	
	public function isAdmin(){
		if($this->type == 1){
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
	
	public function addUser($data){
		$sql='INSERT INTO users (first_name,last_name,email,password,user_type) VALUES (?,?,?,?,?)'; 
		$this->db->execute($sql,$data);
	
		
		$message = 'You are now registered. Please login.';
		return $message;
		
	}

	public function updateUser($data){
		
		//post model method for updating a database table
		$sql='UPDATE users SET first_name=?, last_name=?, email=?, user_type=? WHERE pID=?'; 
		
		$this->db->execute($sql,$data);
		
		$message = 'User updated.';
		return $message;
		
	}
	
	
}