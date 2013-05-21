<?php

  require "instagram.class.php";
	
  $instagram = new Instagram('Your-Instagram-API-Key');
	
	$tag = $_GET['tag'];
	$maxID = $_GET['maxid'];
	$clientID = $instagram->getApiKey();
	
	//$call = new stdClass;
	//$call->pagination->next_max_id=$maxID;
	//$call->pagination->next_url="https://api.instagram.com/v1/tags/{$tag}/media/recent?client_id={$clientID}&max_tag_id={$maxID}";
	
	$media = $instagram->getTagMedia($tag,$auth=false,array('max_tag_id'=>$maxID));
	
	$images = array();
	$dt = array();
	foreach($media->data as $data){
		$dt[] = $data;
	}
	//die(print_r($dt));
	echo json_encode(array(
		'next_id'=>$media->pagination->next_max_id,
		'dt' =>$dt
	));
	
	
