<?php
	session_start();
?>


<?php
if(isset($_POST['login'])){
	
	$url = "http://localhost:8080/recipe/rest/api/auth/login";
	
	$fields = array(
		'username' => urlencode($_POST['username']),
		'password' => urlencode($_POST['password'])
	);
		
	$fields_string="";
	foreach($fields as $key=>$value){
		$fields_string .= $key.'='.$value.'&';
	}
	$fields_string=rtrim($fields_string, '&');
	
	
	
	
	$ch = curl_init();
	
	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	//curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	
	//execute post
	curl_exec($ch);
	
	
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	//close connection
	curl_close($ch);
}
if($httpcode==200){	
	$url="http://localhost:8080/recipe/rest/api/users";
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
	// Will dump a beauty json :3
	$data=json_decode($result, true);
	for($i=0;$i<count($data['users']);$i++){
		if($data['users'][$i]['username']==$_POST['username']){
			$id=$data['users'][$i]['id'];
			$uname=$data['users'][$i]['username'];
			$email=$data['users'][$i]['email'];
			$nickname=$data['users'][$i]['nickname'];
			$createBy=$data['users'][$i]['createdBy'];
			$createdDate=$data['users'][$i]['createdDate'];
			$updatedBy=$data['users'][$i]['updatedBy'];
			$updatedDate=$data['users'][$i]['updatedDate'];
		}
	}
	$_SESSION["id"] = $id;
	$_SESSION["username"] = $uname;
	$_SESSION["email"] = $email;
	$_SESSION["nickname"] = $nickname;
	$_SESSION["createdBy"] = $createBy;
	$_SESSION["createdDate"] = $createdDate;
	$_SESSION["updatedBy"] = $updatedBy;
	$_SESSION["updatedDate"] = $updatedDate;

	echo "<script>window.location.href = '../recipes.php'; </script>";
}
?>	