<?php

	$tag = $_GET['tag'];
	$maxID = $_GET['max_id'];
	$clientID = "099ddb4d09e648a6b11448961a99256b";
	$next_url = "https://api.instagram.com/v1/tags/".$tag."/media/recent?client_id={$clientID}&max_tag_id={$maxID}";
	$media = json_decode(file_get_contents($next_url));


	$images = array();
	$dt = array();
	foreach($media->data as $data){
		$dt[] = $data;
	}
	$lk = array();
	foreach($data->likes->data as $l){
		$lk[] = $l;
	}
	//die(print_r($dt));
	echo json_encode(array(
		'next_id'=>$media->pagination->next_max_id,
		'dt' =>$dt
	));