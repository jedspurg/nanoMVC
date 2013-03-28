<?php

class HomeController extends Controller{
	
	public function index(){
		
		$rssObj = new RssDisplay('http://feeds.feedburner.com/insidethehall?format=xml', 8);
		$items = $rssObj->getFeedItems(8);
		$rssInfo = $rssObj->getChannelInfo();
		$this->set('rssItems', $items);
		$this->set('rssInfo', $rssInfo);
	
	}	
	
}
