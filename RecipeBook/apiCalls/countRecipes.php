<?php
$urlCountRecipe="http://localhost:8080/recipe/rest/api/recipes";
//  Initiate curl
$ch1 = curl_init();
// Disable SSL verification
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch1, CURLOPT_URL,$urlCountRecipe);
// Execute
$resultCountRecipe=curl_exec($ch1);
// Closing
curl_close($ch1);	
// Will dump a beauty json :3
$dataCountRecipes=json_decode($resultCountRecipe, true);
echo count($dataCountRecipes['recipes']);
?>