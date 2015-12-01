<?php
	session_start();
?>
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
<body class="home">
	<!--header-->
	<header class="head" role="banner">
		<!--wrap-->
		<div class="wrap clearfix">
			<a href="index.php" title="RecipeBook" class="logo"><img src="images/ico/logo.png" alt="RecipeBook logo" /></a>
			
			<nav class="main-nav" role="navigation" id="menu">
				<ul>
					<li class="current-menu-item"><a href="index.php" title="Home"><span style="margin: 24px 10px 0px 0;">Home</span></a></li>
					<li><a href="recipes.php" title="Recipes"><span style="margin: 24px 10px 0px 0;">Recipes</span></a></li>
					<li><a href="contact.php" title="Contact"><span style="margin: 24px 10px 0px 0;">Contact</span></a></li>
				</ul>
			</nav>
            <nav class="main-nav1">
                <ul>
                <?php
                    if(isset($_SESSION['id'])){
                ?>
                <li><a href="#" title="Hello"><span style="color: #F4716A;font-size: 16px;font-weight: 500;text-transform: uppercase;">Hello <?php include("apiCalls/getUser.php"); ?>!</span></a></li>
                <?php
                    }
                ?>
                
                </ul>
            </nav>
            
			<?php
				if(isset($_SESSION['id'])){
				?>
                	<nav class="user-nav" role="navigation" style="width:360px;">
                        <ul>
                            <li class="light"><a href="logout.php" title="Logout"><i class="ico i-search"></i> <span>Logout</span></a></li>
                            <li class="light"><a href="find_recipe.php" title="Search for recipes"><i class="ico i-search"></i> <span>Search for recipes</span></a></li>
                            <li class="medium"><a href="my_profile.php" title="My account"><i class="ico i-account"></i> <span>My account</span></a></li>
                            <li class="dark"><a href="submit_recipe.php" title="Submit a recipe"><i class="ico i-submitrecipe"></i> <span>Submit a recipe</span></a></li>
                        </ul>
                    </nav>
                <?php
				} else{
				?>
                	<nav class="user-nav" role="navigation">
                        <ul>
                            <li class="light"><a href="find_recipe.php" title="Search for recipes"><i class="ico i-search"></i> <span>Search for recipes</span></a></li>
                            <li class="medium"><a href="my_profile.php" title="My account"><i class="ico i-account"></i> <span>My account</span></a></li>
                            <li class="dark"><a href="submit_recipe.php" title="Submit a recipe"><i class="ico i-submitrecipe"></i> <span>Submit a recipe</span></a></li>
                        </ul>
                    </nav>
                <?php
				}
			?>
		</div>
		<!--//wrap-->
	</header>
	<!--//header-->
		
	<!--main-->
	<main class="main" role="main">
		<!--intro-->
		<div class="intro">
			<figure class="bg"><img src="images/intro.jpg" alt="" /></figure>
			
			<!--wrap-->
			<div class="wrap clearfix">
				<!--row-->
				<div class="row">
					<article class="three-fourth text wow zoomIn" data-wow-delay=".2s">
						<h1>Welcome to RecipeBook!</h1>
						<p>RecipeBook is the ultimate <strong>Online Recipe Community</strong>, where recipes come to life.
						<br>You can submit your favourite recipes and share delicious recipes. <br><strong>Let the world taste your favourite dish!</strong></p>
						<!--<p>Already a member? Click <a href="login.php">here</a> to login.</p>-->
					</article>
					
				</div>
				<!--//row-->
			</div>
			<!--//wrap-->
		</div>
		<!--//intro-->
		
		<!--wrap-->
		<div class="wrap clearfix">
			<!--row-->
			<div class="row">
				<!--content-->
				<section class="content full-width">
					<div class="icons dynamic-numbers">
						<header class="s-title wow fadeInDown">
							<h2 class="ribbon large">RecipeBook! in numbers</h2>
						</header>
						
						<!--row-->
						<div class="row wow fadeInUp">
							<!--item-->
							<div class="one-sixth">
								<div class="container">
									<i class="ico i-members"></i>
									<span class="title dynamic-number" data-dnumber="<?php include("apiCalls/countUsers.php"); ?>">0</span>
									<span class="subtitle">members</span>
								</div>
							</div>
							<!--//item-->
							
							<!--item-->
							<div class="one-sixth">
								<div class="container">
									<i class="ico i-recipes"></i>
									<span class="title dynamic-number" data-dnumber="<?php include("apiCalls/countRecipes.php"); ?>">0</span>
									<span class="subtitle">recipes</span>
								</div>
							</div>
							<!--//item-->
							
							<!--item-->
							<div class="one-sixth">
								<div class="container">
									<i class="ico i-photos"></i>
									<span class="title dynamic-number" data-dnumber="<?php include("apiCalls/countRecipes.php"); ?>">0</span>
									<span class="subtitle">photos</span>
								</div>
							</div>
							<!--//item-->
							
							<!--item-->
							<div class="one-sixth">
								<div class="container">
									<i class="ico i-posts"></i>
									<span class="title dynamic-number" data-dnumber="<?php include("apiCalls/countRecipes.php"); ?>">0</span>
									<span class="subtitle">forum posts</span>
								</div>
							</div>
							<!--//item-->
							
							<!--item-->
							<div class="one-sixth">
								<div class="container">
									<i class="ico i-comment"></i>
									<span class="title dynamic-number" data-dnumber="0">0</span>
									<span class="subtitle">comments</span>
								</div>
							</div>
							<!--//item-->
							
							<!--item-->
							<div class="one-sixth">
								<div class="container">
									<i class="ico i-articles"></i>
									<span class="title dynamic-number" data-dnumber="<?php include("apiCalls/countRecipes.php"); ?>">0</span>
									<span class="subtitle">articles</span>
								</div>
							</div>
							<!--//item-->
						
							<div class="cta">
								<a href="register.php" class="button big">Join us!</a>
							</div>
						</div>
						<!--//row-->
					</div>
				</section>
				<!--//content-->
			
				<!--content-->
				<section class="content three-fourth">
					<!--cwrap-->
					<div class="cwrap">
						<!--entries-->
						<div class="entries row">
							<!--featured recipe-->
							
                            <?php include("apiCalls/getRecipeOfDay.php"); ?>
                            
                            <!--right sidebar-->
				<aside class="sidebar one-fourth" style="margin: 0px 0 0 100px;width: 30%;margin: 0 0 0 157px;"">
					<div class="widget wow fadeInRight">
						<h3>Recipe Categories</h3>
						<ul class="boxed">
							<li class="light"><a href="recipes.php" title="Appetizers"><i class="ico i-appetizers"></i> <span>Apetizers</span></a></li>
							<li class="medium"><a href="recipes.php" title="Cocktails"><i class="ico i-cocktails"></i> <span>Cocktails</span></a></li>
							<li class="dark"><a href="recipes.php" title="Deserts"><i class="ico i-deserts"></i> <span>Deserts</span></a></li>
							
							<li class="medium"><a href="recipes.php" title="Cocktails"><i class="ico i-eggs"></i> <span>Eggs</span></a></li>
							<li class="dark"><a href="recipes.php" title="Equipment"><i class="ico i-equipment"></i> <span>Equipment</span></a></li>
							<li class="light"><a href="recipes.php" title="Events"><i class="ico i-events"></i> <span>Events</span></a></li>
						
							<li class="dark"><a href="recipes.php" title="Fish"><i class="ico i-fish"></i> <span>Fish</span></a></li>
							<li class="light"><a href="recipes.php" title="Ftness"><i class="ico i-fitness"></i> <span>Fitness</span></a></li>
							<li class="medium"><a href="recipes.php" title="Healthy"><i class="ico i-healthy"></i> <span>Healthy</span></a></li>
							
							<li class="light"><a href="recipes.php" title="Asian"><i class="ico i-asian"></i> <span>Asian</span></a></li>
							<li class="medium"><a href="recipes.php" title="Mexican"><i class="ico i-mexican"></i> <span>Mexican</span></a></li>
							<li class="dark"><a href="recipes.php" title="Pizza"><i class="ico i-pizza"></i> <span>Pizza</span></a></li>
							
							<li class="medium"><a href="recipes.php" title="Kids"><i class="ico i-kids"></i> <span>Kids</span></a></li>
							<li class="dark"><a href="recipes.php" title="Meat"><i class="ico i-meat"></i> <span>Meat</span></a></li>
							<li class="light"><a href="recipes.php" title="Snacks"><i class="ico i-snacks"></i> <span>Snacks</span></a></li>
							
							<li class="dark"><a href="recipes.php" title="Salads"><i class="ico i-salads"></i> <span>Salads</span></a></li>
							<li class="light"><a href="recipes.php" title="Storage"><i class="ico i-storage"></i> <span>Storage</span></a></li>
							<li class="medium"><a href="recipes.php" title="Vegetarian"><i class="ico i-vegetarian"></i> <span>Vegetarian</span></a></li>
						</ul>
					</div>
				</aside>
			</div>
			<!--//right sidebar-->
							<!--//featured recipe-->
							
							<!--featured member-->
<!--							<div class="featured one-third wow fadeInLeft" data-wow-delay=".2s">
								<header class="s-title">
									<h2 class="ribbon star">Featured member</h2>
								</header>
								<article class="entry">
									<figure>
										<img src="images/avatar1.jpg" alt="" />
										<figcaption><a href="my_profile.php"><i class="ico i-view"></i> <span>View member</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="my_profile.php">Kimberly C.</a></h2>
										<blockquote>Traditional dishes and fine bakery products accompanied by beautiful photographs to bend around and attract the tryout! Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</blockquote>
										<div class="actions">
											<div>
												<a href="#" class="button">Check out her recipes</a>
												<div class="more"><a href="#">See past featured members</a></div>
											</div>
										</div>
									</div>
								</article>
							</div>-->
							<!--//featured member-->
						</div>
						<!--//entries-->
					</div>
					<!--//cwrap-->
				
					<!--cwrap-->
					<div class="cwrap">
						<header class="s-title">
							<h2 class="ribbon bright">Latest recipes</h2>
						</header>
						
						<!--entries-->
						<div class="entries row">
							
							<?php include("apiCalls/getLatestRecipes.php"); ?>
							
							<div class="quicklinks">
								<a href="recipes.php" class="button">More recipes</a>
								<a href="javascript:void(0)" class="button scroll-to-top">Back to top</a>
							</div>
						</div>
						<!--//entries-->
					</div>
					<!--//cwrap-->
				</section>
				<!--//content-->
		
				
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
	<script>
		window.dynamicNumbersBound = false;
		var wow = new WOW();
		WOW.prototype.show = function(box) {
			wow.applyStyle(box);
			if (typeof box.parentNode !== 'undefined' && hasClass(box.parentNode, 'dynamic-numbers') && !window.dynamicNumbersBound) {
				bindDynamicNumbers();
				window.dynamicNumbersBound = true;
			}
			return box.className = "" + box.className + " " + wow.config.animateClass;
		};
		wow.init();
		
		function hasClass(element, cls) {
			return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
		}
		
		function bindDynamicNumbers() {
			$('.dynamic-number').each(function() {				
				var startNumber = $(this).text();
				var endNumber = $(this).data('dnumber');
				var dynamicNumberControl = $(this);
				
				$({numberValue: startNumber}).animate({numberValue: endNumber}, {
					duration: 4000,
					easing: 'swing',
					step: function() { 
						$(dynamicNumberControl).text(Math.ceil(this.numberValue)); 
					}
				});
			});	
		}
		
	</script>
</body>
</html>


