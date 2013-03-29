<?php
class AjaxController extends Controller {
	
	protected $post;
	protected $user;
	protected $category;
	//overide the default behavior to include HTML header and footer
	protected $include_header_footer = false;
	
	public function index(){
    $this->set('response', "Invalid request!");
	}
	
	public function get_post_content(){
		$post = $this->post->getOne($_GET['id']);	
		$this->set('response', $post['content']);
	}
	
}
