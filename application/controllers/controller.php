<?php
class Controller {
	
	public $data = array();
	protected $view;
	protected $access;
	protected $include_header_footer = true;

	function __construct($view, $method = null, $parameters = null){
		//load models if class variables 
		$class_vars = get_class_vars(get_class($this));
		foreach ($class_vars as $name => $value) {
			$class = ucfirst($name);
	    if (class_exists($class)){
	    	$this->$name = new $class();
	    }
		}
		//now check the access
		//first instantiate a user to see if the logged in user is an admin
		$u = new User();
		//now check the access level
		if($this->access == 1 && !$u->isAdmin()){
			//store our view in the session so that we can redirect upon successful login
			$_SESSION['redirect'] = $view;
			$_SESSION['error'] = 'You do not have access to this page. Please login below.';
			//let's go to the login page
			header('Location: '.BASE_URL.'/login/');
		}else{
			//run any task methods
			if($method){
				$this->runTask($method, $parameters);
			}
			
			//render the view
			if(file_exists('views/'.strtolower($view).'/'.strtolower($method).'.php')){
				$this->view->load($view, $method, $this->data);
			}else{
				$this->index();
				$this->view->load($view, 'index', $this->data);
			}
		}
	}
	/*
	*The runTask() method is our way of grabbing the method from the URI string and parsing the parameters
	*/
	public function runTask($method, $parameters = null){
		if($method && method_exists($this, $method)) {
			//the call_user_func_array expects an array so we create a null array if parameters is empty
			if(!is_array($parameters)){ $parameters = array(); }
      call_user_func_array(array($this, $method), $parameters); 
    }
	}
	/*
	*The index() method is the one run if no task method is run. Here as a placeholder for child classes.
	*/
	public function index(){}
	/*
	*The set() method allows us to more easily set the view variables
	*/
	public function set($key, $value){
		$this->data[$key] = $value;
	}

}
