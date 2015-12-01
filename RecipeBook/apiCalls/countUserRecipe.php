<?php
	$url="http://localhost:8080/recipe/rest/api/recipes";
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
			/*echo "<pre>";
			print_r($data);*/
			$recipeCount=0;
			for($i=0;$i<count($data['recipes']);$i++){
				if($_SESSION['id']==$data['recipes'][$i]['userId']){
					$recipeCount++;
				}
			}
			echo $recipeCount;
?>