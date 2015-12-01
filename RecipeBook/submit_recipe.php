<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	
	<title>RecipeBook</title>
	
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/animate.css" />
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800" rel="stylesheet">
	<link rel="shortcut icon" href="images/icon.png" />
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!--header-->
	<?php
    	include("header.php");
		if(isset($_GET['msg'])){
			echo "<script>alert('".$_GET['msg']."');</script>";
		}
	?>
	<!--//header-->
		
	<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--breadcrumbs-->
			<nav class="breadcrumbs">
				<ul>
					<li><a href="index-2.php" title="Home">Home</a></li>
					<li>Submit a recipe</li>
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
			<!--row-->
			<div class="row">
				<header class="s-title">
					<h1>Add a new recipe</h1>
				</header>
					
				<!--content-->
				<section class="content full-width wow fadeInUp">
					<div class="submit_recipe container">
						<form method="post" action="apiCalls/createRecipe.php">
							<section>
								<h2>Basics</h2>
								<p>All fields are required.</p>
								<div class="f-row">
									<div class="full"><input type="text" name="title" placeholder="Recipe title" /></div>
								</div>
								<div class="f-row">
									<div class="third"><input type="text" name="cookingTime" placeholder="Cooking time" /></div>
									<div class="third">
                                    	<select name="difficulty">
                                            <option>---Select one---</option>
                                            <option value="Super easy">Super easy</option>
                                            <option value="Easy">Easy</option>
                                            <option value="Mediocre">Mediocre</option>
                                            <option value="Hard">Hard</option>
                                            <option value="Super hard">Super hard</option>
                                        </select>
                                    </div>
                                    <div class="third"><input type="text" name="servingAmount"  placeholder="Serves how many people?" /></div>
								</div>
								<div class="f-row">
									<div class="third">
                                    	<select name="category" >
                                        	<option selected="selected">Select a category</option>
                                            <option value="Appetizers">Appetizers</option>
                                            <option value="Bread & Rolls">Bread & Rolls</option>
                                            <option value="Soup & Salad">Soup & Salad</option>
                                            <option value="Desserts">Desserts</option>
                                            <option value="entree (Veg)" >entree (Veg)</option>
                                            <option value="entree (Non Veg)">entree (Non Veg)</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
								</div>
							</section>
							
							<section>
								<h2>Description</h2>
								<div class="f-row">
									<div class="full"><textarea name="description"  placeholder="Recipe description" maxlength="253"></textarea></div>
								</div>
							</section>	
							
							<section>
								<h2>Ingredients</h2>
								<div class="f-row ingredient" id="ingredTextBoxes">
									<div class="large"><input name="ingredient[]" id="1" type="text" placeholder="Ingredient" /></div>
									<div class="small"><input name="ingQty[]" id="1" type="text" placeholder="Quantity" /></div>
									<div style="display:none" class="third"><select><option selected="selected">Select a category</option></select></div>
								</div>
								<div class="f-row full">
									<a onClick="addIngred()" class="button">Add an ingredient</a>
								</div>
							</section>	
							
							<section>
								<h2>Instructions <span>(enter instructions, each step at a time)</span></h2>
								<div class="f-row instruction" id="deirectTextBoxes">
									<div class="full"><input name="direction[]" id="1" type="text" placeholder="Instructions" /></div>
								</div>
								<div class="f-row full">
									<a onClick="addDirect()" class="button">Add a step</a>
								</div>
							</section>
							
							<section>
								<h2>Photo</h2>
								<div class="f-row full">
									<input type="text" name="imageUrl" placeholder="Enter Image URL">
								</div>
							</section>	
							
							<div class="f-row full">
								<input type="submit" class="button" id="submitRecipe" value="Publish this recipe" />
							</div>
						</form>
					</div>
				</section>
				<!--//content-->
			</div>
			<!--//row-->
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->
	
	
	<!--footer-->
	<?php include("footer.php"); ?>
	<!--//footer-->
	
	<!--preloader-->
	<div class="preloader">
		<div class="spinner"></div>
	</div>
	<!--//preloader-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/jquery.uniform.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/scripts.js"></script>
	<script>new WOW().init();</script>
    <script>
		var i=2;
		function addIngred(){
			document.getElementById('ingredTextBoxes').innerHTML+="<div class=\"large\"><input name=\"ingredient[]\" id=\"+i+\" type=\"text\" placeholder=\"Ingredient\" /></div><div class=\"small\"><input name=\"ingQty[]\" id=\"+i+\" type=\"text\" placeholder=\"Quantity\" /></div>";
			i++;
		}
		
		var j=2;
		function addDirect(){
			document.getElementById('deirectTextBoxes').innerHTML+="<div class=\"full\"><input name=\"direction[]\" id=\"+j+\" type=\"text\" placeholder=\"Instructions\" /></div>";
			i++;
		}
	</script>
</body>
</html>