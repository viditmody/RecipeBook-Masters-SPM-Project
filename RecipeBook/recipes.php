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
	<?php include("header.php"); ?>
	<!--//header-->
	
	<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--breadcrumbs-->
			<nav class="breadcrumbs">
				<ul>
					<li><a href="index-2.php" title="Home">Home</a></li>
					<li>Recipes</li>
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
			<!--row-->
			<div class="row">
				<header class="s-title wow fadeInLeft">
					<h1>Recipes</h1>
				</header>
				
				<aside class="above-sidebar full-width  wow fadeInDown">
					<ul class="boxed">
						<li class="light"><a href="recipes.php" title="Appetizers"><i class="ico i-appetizers"></i> <span>Apetizers</span></a></li>
						<li class="medium"><a href="recipes.php" title="Cocktails"><i class="ico i-cocktails"></i> <span>Cocktails</span></a></li>
						<li class="dark"><a href="recipes.php" title="Deserts"><i class="ico i-deserts"></i> <span>Deserts</span></a></li>
						
						<li class="light"><a href="recipes.php" title="Cocktails"><i class="ico i-eggs"></i> <span>Eggs</span></a></li>
						<li class="medium"><a href="recipes.php" title="Equipment"><i class="ico i-equipment"></i> <span>Equipment</span></a></li>
						<li class="dark"><a href="recipes.php" title="Events"><i class="ico i-events"></i> <span>Events</span></a></li>
					
						<li class="light"><a href="recipes.php" title="Fish"><i class="ico i-fish"></i> <span>Fish</span></a></li>
						<li class="medium"><a href="recipes.php" title="Ftness"><i class="ico i-fitness"></i> <span>Fitness</span></a></li>
						<li class="dark"><a href="recipes.php" title="Healthy"><i class="ico i-healthy"></i> <span>Healthy</span></a></li>
						
						<li class="medium"><a href="recipes.php" title="Asian"><i class="ico i-asian"></i> <span>Asian</span></a></li>
						<li class="dark"><a href="recipes.php" title="Mexican"><i class="ico i-mexican"></i> <span>Mexican</span></a></li>
						<li class="light"><a href="recipes.php" title="Pizza"><i class="ico i-pizza"></i> <span>Pizza</span></a></li>
						
						<li class="medium"><a href="recipes.php" title="Kids"><i class="ico i-kids"></i> <span>Kids</span></a></li>
						<li class="dark"><a href="recipes.php" title="Meat"><i class="ico i-meat"></i> <span>Meat</span></a></li>
						<li class="light"><a href="recipes.php" title="Snacks"><i class="ico i-snacks"></i> <span>Snacks</span></a></li>
						
						<li class="medium"><a href="recipes.php" title="Salads"><i class="ico i-salads"></i> <span>Salads</span></a></li>
						<li class="dark"><a href="recipes.php" title="Storage"><i class="ico i-storage"></i> <span>Storage</span></a></li>
						<li class="light"><a href="recipes.php" title="Vegetarian"><i class="ico i-vegetarian"></i> <span>Vegetarian</span></a></li>
					</ul>
				</aside>
				
				<!--content-->
				<section class="content full-width wow fadeInUp">
					<!--entries-->
					<div class="entries row">
                    	
                        
                        <?php include("apiCalls/getRecipes.php"); ?>
                        
                        
						<div class="quicklinks">
							<a href="#" class="button">More recipes</a>
							<a href="javascript:void(0)" class="button scroll-to-top">Back to top</a>
						</div>
					</div>
					<!--//entries-->
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


