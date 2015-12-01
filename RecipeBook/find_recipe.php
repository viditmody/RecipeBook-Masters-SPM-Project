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
    <style>
		#recipeSearch{
			width: 31px;
			position: relative;
			top: -32px;
			right: -335px;
			cursor:pointer;
		}
	</style>
</head>
<body>
	<!--header-->
	<?php include("header.php"); ?>
	<!--//header-->
	
	<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--breadcrumbs-->
			<nav class="breadcrumbs">
				<ul>
					<li><a href="index.php" title="Home">Home</a></li>
					<li>Search for Recipes</li>
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
			<!--row-->
			<div class="row">
				<header class="s-title wow fadeInLeft">
					<h1>Search for Recipes</h1>
				</header>
				
				<!--content-->
				<section class="content full-width wow fadeInUp">
					<!--recipefinder-->
					<div class="container recipefinder">
						<div class="right">
							
							<h3 style="margin: 0 0 0 -363px;">Want to search directly?</h3>
							<div class="row">
                            	<form method="get" action="">
									<div class="search one-half" style="margin: 0 0 0 -363px;">
										<input type="search" name="search" placeholder="Find recipe by name" /><img id="recipeSearch" src="images/search.png">
										<input type="submit" name="submit" value="Search" />
									</div>
								</form>
								
								<div class="one-half">
							<!--<a href="recipes.php" class="button" style="margin: -3px 0 0 0;">View All</a>-->
						</div>
								
							</div>
						</div>
					</div>
					<!--//recipefinder-->
				
					<!--results-->
					<div class="entries row">
                    
                    	<?php
							if(isset($_GET['submit'])){
								$word=$_GET['search'];
								include("apiCalls/searchRecipes.php");
							}
						?>
                        
						<div class="quicklinks">
							<a href="recipes.php" class="button">All recipes</a>
							<a href="javascript:void(0)" class="button scroll-to-top">Back to top</a>
						</div>
					</div>
					<!--//results-->
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
</body>
</html>


