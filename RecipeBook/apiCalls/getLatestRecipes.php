<?php

	$url="http://localhost:8080/recipe/rest/api/recipes";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);
	$result=curl_exec($ch);
	curl_close($ch);	
	$data=json_decode($result, true);
	$countLatest=0;
	for($i=count($data['recipes'])-1;$i>=0;$i--){
		if($countLatest==8){
			break;
		}
	?>
    	<!--item-->
        <div class="entry one-third wow fadeInLeft" data-wow-delay="<?php echo ($i/5)."s"; ?>">
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
		$countLatest++;
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