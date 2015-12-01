<?php

//API URL
	$url = "http://localhost:8080/recipe/rest/api/ranks";
	
	//set POST variables
	$fields = array(
		'id' => urldecode("null"),
		'rank' => urlencode(1),
		'recipeId' => urlencode($_GET['recipeID']),
		'userId' => urlencode($_GET['userID'])
	);
	
	$fields_string="";
	//url-ify the data for the POST
	foreach($fields as $key=>$value){
		$fields_string .= $key.'='.$value.'&';
	}
	
	//Remove last '&' from url-ify
	$fields_string=rtrim($fields_string, '&');
	
	//echo json_encode($fields_string)."<br>";
	
	$header=array();            
	$header[]="Accept: application/json";
	$header[]="Accept-Encoding: gzip, deflate";
	$header[]="Accept-Language: en-US,en;q=0.5";
	$header[]="Connection: keep-alive";
	$header[]="Content-Type: application/json";
	
	//open connection
	$ch = curl_init();
	
	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));
	
	//execute post
	$result = curl_exec($ch);
	
	
	$f = fopen('requestLogs.txt', 'w');
	curl_setopt($ch,CURLOPT_VERBOSE,true);
	curl_setopt($ch,CURLOPT_STDERR ,$f);
	
	
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);


	echo "<br>http code ".$httpcode;
	//close connection
	curl_close($ch);
	
?>