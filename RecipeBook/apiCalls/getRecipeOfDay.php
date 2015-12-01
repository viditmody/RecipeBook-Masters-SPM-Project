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
$minVote='0';
$maxVote='-1';
$id=1;;
for($i=0;$i<count($data['recipes']);$i++){
	if($data['recipes'][$i]['totalVote'] > $minVote){
		$maxVote=$data['recipes'][$i]['totalVote'];
		$id=$data['recipes'][$i]['id'];
		$minVote=$maxVote;
	}
}

$url1="http://localhost:8080/recipe/rest/api/recipes/".$id."";
//  Initiate curl
$ch1 = curl_init();
// Disable SSL verification
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch1, CURLOPT_URL,$url1);
// Execute
$result1=curl_exec($ch1);
// Closing
curl_close($ch1);	
// Will dump a beauty json
$data1=json_decode($result1, true);
/*echo "<pre>";
print_r($data);*/
?>

<div class="featured two-third wow fadeInLeft">
    <header class="s-title">
        <h2 class="ribbon">Reader's choice</h2>
    </header>
    <article class="entry">
        <figure>
            <img src="<?php echo $data1['recipe']['imageUrl']; ?>" width="800" height="600" alt="" />
            <figcaption><a href="recipe.php?id=<?php echo $data1['recipe']['id']; ?>"><i class="ico i-view"></i> <span>View recipe</span></a></figcaption>
        </figure>
        <div class="container">
            <h2><a href="recipe.php?id=<?php echo $data1['recipe']['id']; ?>"><?php echo $data1['recipe']['title']; ?></a></h2>
            <p><?php echo $data1['recipe']['description']; ?></p>
            <div class="actions">
                <div>
                    <a href="recipe.php?id=<?php echo $data1['recipe']['id']; ?>" class="button">See the full recipe</a>
                    <div class="more"><a href="recipes.php">See other recipes</a></div>
                </div>
            </div>
        </div>
    </article>
</div>