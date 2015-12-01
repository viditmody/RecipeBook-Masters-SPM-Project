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
/*	echo "<pre>";
	print_r($data);*/
	for($i=0;$i<count($data['recipes']);$i++){
	?>
    
    	<!--item-->
        <div class="entry one-fourth wow fadeInLeft" data-wow-delay="<?php echo ($i/5)."s"; ?>">
            <figure>
                <img src="<?php echo $data['recipes'][$i]['imageUrl']; ?>" width="270" height="203" alt="" />
                <figcaption><a href="recipe.php?id=<?php echo $data['recipes'][$i]['id']; ?>"><i class="ico i-view"></i> <span>View recipe</span></a></figcaption>
            </figure>
            <div class="container">
                <h2><a href="recipe.php?id=<?php echo $data['recipes'][$i]['id']; ?>"><?php echo $data['recipes'][$i]['title']; ?></a></h2> 
                <div class="actions">
                    <div>
                        <div class="difficulty"><i class="ico i-hard"></i><a href="#"><?php echo $data['recipes'][$i]['difficulty']; ?></a></div>
                        <a style="cursor:pointer;" onClick="createRank('<?php echo $data['recipes'][$i]['id']; ?>','<?php echo $_SESSION['id']; ?>');"><div class="likes"><i class="ico i-likes"></i><?php echo $data['recipes'][$i]['totalVote']; ?></div></a>
                    </div>
                </div>
            </div>
        </div>
        <!--item-->
	<?php
	}

?>
<script>
	function createRank(recipeID,userID){
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               //console.log(xmlhttp.responseText);
            }
        };
        xmlhttp.open("GET","apiCalls/createRank.php?recipeID="+recipeID+"&userID="+userID,true);
        xmlhttp.send();
		window.location.reload();
	}
</script>