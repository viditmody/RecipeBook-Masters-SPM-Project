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
					<li><a href="index.php" title="Home">Home</a></li>
					<li>My account</li>
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
		
			<!--content-->
			<section class="content">
				<!--row-->
				<div class="row">
					<!--profile left part-->
					<div class="my_account one-fourth wow fadeInLeft">
						<figure>
							<img src="images/avatar1.jpg" alt="" />
						</figure>
						<div class="container">
							<h2 style="margin: 0 0 0 45px;"><?php echo $_SESSION['username']; ?></h2> 
						</div>
					</div>
					<!--//profile left part-->
					
					<div class="three-fourth-profile wow fadeInRight">
						<nav class="tabs">
							<ul>
								<li class="active"><a href="#about" title="About me">About me</a></li>
								<li><a href="#recipes" title="My recipes">My recipes</a></li>
							</ul>
						</nav>
                        <?php //session_destroy(); ?>
						<!--about-->
						<div class="tab-content" id="about">
							<div class="row">
								<dl class="basic two-third-profile">
                                	<dt>ID</dt>
									<dd><?php echo $_SESSION['id']; ?></dd>
									<dt>Name</dt>
									<dd><?php echo $_SESSION['username']; ?></dd>
									<dt>Username</dt>
									<dd><?php echo $_SESSION['username']; ?></dd>
									<dt>Email</dt>
									<dd><?php echo $_SESSION['email']; ?></dd>
									<dt>Nickname</dt>
									<dd><?php echo $_SESSION['nickname']; ?></dd>
									<dt>Recipes submitted</dt>
									<dd><?php include("apiCalls/countUserRecipe.php"); ?></dd>
								</dl>
							</div>
						</div>
						<!--//about-->
					
						<!--my recipes-->
						<div class="tab-content" id="recipes">
							<div class="entries row">
                            
								<!--item-->
								<div class="entry one-third-profile wow fadeInLeft">
									<figure>
										<img src="images/img6.jpg" alt="" />
										<figcaption><a href="recipe.php"><i class="ico i-view"></i> <span>View recipe</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="recipe.php">Thai fried rice with fruit and vegetables</a></h2> 
										<div class="actions">
											<div>
												<div class="difficulty"><i class="ico i-medium"></i><a href="#">medium</a></div>
												<div class="likes"><i class="ico i-likes"></i><a href="#">10</a></div>
											</div>
										</div>
									</div>
								</div>
								<!--item-->
								
                                <!--item-->
                                <div class="entry one-third-profile wow fadeInLeft" data-wow-delay="1s">
                                    <figure>
                                        <img src="images/img4.jpg" alt="" />
                                        <figcaption><a href="recipe.php"><i class="ico i-view"></i> <span>View recipe</span></a></figcaption>
                                    </figure>
                                    <div class="container">
                                        <h2><a href="recipe.php">Princess puffs - an old classic at its best</a></h2> 
                                        <div class="actions">
                                            <div>
                                                <div class="difficulty"><i class="ico i-hard"></i><a href="#">hard</a></div>
                                                <div class="likes"><i class="ico i-likes"></i><a href="#">10</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--item-->
                                
                                
							</div>
						</div>
						<!--//my recipes-->
					</div>
				</div>
				<!--//row-->
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
	<script>new WOW().init();</script>
</body>
</html>


