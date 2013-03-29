<?php
class AjaxController extends Controller {
	
	protected $postObject;
	protected $userObject;
	protected $categoryObject;
	//overide the default behavior to include HTML header and footer
	protected $include_header_footer = false;
	
	public function index(){
    $this->set('response', "Invalid request!");
	}
	
	public function get_post_content(){
		$this->postObject = new Post();
		$post = $this->postObject->getPost($_GET['pID']);	
		$this->set('response', $post['content']);
	}
	
}
