<?php
class ManagePostsController extends Controller{
	
	public $post;
	public $category;
	protected $access = 1;
	
	public function add(){
		$categories = $this->category->getAll();
		$this->set('categories', $categories);
	}
	
	public function save(){
		$this->post->create($_POST);					
	}
	
	public function edit($id){
		$post = $this->post->getOne($id);
		$categories = $this->category->getAll();
		$this->set('id', $post['id']);
		$this->set('title', $post['title']);
		$this->set('content', $post['content']);
		$this->set('date', $post['date']);
		$this->set('categoryID', $post['categoryID']);
		$this->set('categories', $categories);
	}
	
	public function update(){
		$this->post->update($_POST);
	}
	
	
}
