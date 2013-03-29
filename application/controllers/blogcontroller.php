<?php
class BlogController extends Controller{
	
	public $post;
		
  public function post($id){
  	$post = $this->post->getOne($id);	    
  	$this->set('post',$post);
  }
	
	public function index(){
		$posts = $this->post->getAll();
		$this->set('title', 'The Default Blog View');
		$this->set('posts',$posts);
	}
	
}
