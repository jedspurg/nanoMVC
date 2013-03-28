<?php
require_once ('application/libraries/3rdparty/soundcloud/Soundcloud.php');
class SoundcloudController extends Controller{
	
	public function defaultTask(){
		
	$client = new Services_Soundcloud('6229e594af0e0a645b89bc7dfa040d75','3597f59015eec9c3f5a32eadad6fd67b');
	$client->setCurlOptions(array(CURLOPT_FOLLOWLOCATION => 1));
	
	

	$tracks = $client->get('tracks', array('q' => 'modern driveway', 'filter'=>'public'));
	
	$tracksArray = json_decode($tracks);
	
	foreach($tracksArray as $r){
		
	// get a tracks oembed data
	$track_url = $r->permalink_url;
	$embed_info = json_decode($client->get('oembed', array('url' => $track_url)));

	$embeds[] = $embed_info->html;
	
	
	}
	


	
	
	
	$this->set('tracks', $embeds);
		
	}
	
	
}