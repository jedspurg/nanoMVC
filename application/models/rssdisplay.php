<?php

class RssDisplay extends Model{
	
	protected $feed_url;
	protected $num_feed_items;
	
	public function __construct($url,$num_items){
		parent::__construct();
		
		$this->feed_url = $url;
		$this->num_feed_items = $num_items;

		
	}
	
	public function getFeedItems($num_feed_items = 1){
		
		$this->num_feed_items = $num_feed_items;
		
		$rss = simplexml_load_file($this->feed_url);
		
		$items = $rss->channel->item;
		
		for($i=0;$i<$this->num_feed_items;$i++){
			
			$returnedItems[$i] = $items[$i];
			
		}
		
		return $returnedItems;
			
	}
	
	public function getChannelInfo() {
		
		$rss = simplexml_load_file($this->feed_url);
		
		$rssInfo = $rss->channel;
		
		return $rssInfo;
		
	}
	
}


