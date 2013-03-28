<?php

class ManagePostsController extends Controller{
	
	public $postObject;
	public $categoryObject;
	protected $access = 1;
	
	public function index(){
		}
	
	public function add(){
		
		$this->postObject = new Post();
		$this->categoryObject = new Category();
		$categories = $this->categoryObject->getAllCategories();
		$this->set('categories', $categories);
	
	
	}
	
	public function save(){
		
			$this->postObject = new Post();
			$date = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $_POST['post_date'])));
			$data = array('title'=>$_POST['post_title'],'content'=>$_POST['post_content'], 'categoryID'=>$_POST['category'], 'date'=>$date);
			
	
			$result = $this->postObject->addPost($data);
			
			$this->set('message', $result);
				
	}
	
	public function edit($pID){
		
			$this->postObject = new Post();
			$this->categoryObject = new Category();

			$post = $this->postObject->getPost($pID);
			$categories = $this->categoryObject->getAllCategories();
			
			$this->set('pID', $post['pID']);
			$this->set('title', $post['title']);
			$this->set('content', $post['content']);
			$this->set('date', $post['date']);
			$this->set('categoryID', $post['categoryID']);
			$this->set('categories', $categories);
			$this->set('task', 'update');
			
		
	}
	
	public function update(){
		
		$this->postObject = new Post();
			
		$data = array('title'=>$_POST['post_title'],'content'=>$_POST['post_content'], 'categoryID'=>$_POST['category'], 'date'=>$_POST['post_date'], 'pID'=>$_POST['pID']);
		
		$result = $this->postObject->updatePost($data);
		
		$this->set('message', $result);
		
	}
	
	
}
