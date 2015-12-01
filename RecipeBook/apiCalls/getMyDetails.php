<?php			
	$id=$_SESSION['id'];
	
	$url="http://localhost:8080/recipe/rest/api/users/".$id."";
	//  Initiate curl
	$ch = curl_init();
	// Disable SSL verification
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// Will return the response, if false it print the response
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// Set the url
	curl_setopt($ch, CURLOPT_URL,$url);
	// Execute
	$result=curl_exec($ch);
	// Closing
	curl_close($ch);	
	// Will dump a beauty json
	$data=json_decode($result, true);
	/*echo "<pre>";
	print_r($data);*/
	echo $data['user']['username'];
?>