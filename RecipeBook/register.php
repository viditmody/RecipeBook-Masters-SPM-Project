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
<body>
	<!--header-->
    <header class="head" role="banner">
		<!--wrap-->
		<div class="wrap clearfix">
			<a href="index.php" title="RecipeBook" class="logo"><img src="images/ico/logo.png" alt="RecipeBook logo" /></a>
			
			<nav class="main-nav" role="navigation" id="menu">
				<ul>
					<li class="current-menu-item"><a href="index.php" title="Home"><span style="margin: 24px 35px 0px 0;">Home</span></a></li>
					<li><a href="recipes.php" title="Recipes"><span style="margin: 24px 35px 0px 0;">Recipes</span></a></li>
					<li><a href="contact.php" title="Contact"><span style="margin: 24px 50px 0px 0;">Contact</span></a></li>
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
            
			<nav class="user-nav" role="navigation">
				<ul>
					<li class="light"><a href="find_recipe.php" title="Search for recipes"><i class="ico i-search"></i> <span>Search for recipes</span></a></li>
					<li class="medium"><a href="my_profile.php" title="My account"><i class="ico i-account"></i> <span>My account</span></a></li>
					<li class="dark"><a href="submit_recipe.php" title="Submit a recipe"><i class="ico i-submitrecipe"></i> <span>Submit a recipe</span></a></li>
				</ul>
			</nav>
		</div>
		<!--//wrap-->
	</header>
	<?php 
		if(isset($_GET['msg'])){
			echo "<script>alert('".$_GET['msg']."');</script>";
		}
	?>
	<!--//header-->
		
	<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--row-->
			<div class="row">
			<!--content-->
				<section class="content center full-width wow fadeInDown">
					<div class="modal container">
                    	<form method="post" action="apiCalls/createUser.php">
                            <h3>Register</h3>
                            <div class="f-row">
                                <input type="text" name="username" placeholder="Your username" />
                            </div>
                            <div class="f-row">
                                <input type="text" name="nickname" placeholder="Your nickname" />
                            </div>
                            <div class="f-row">
                                <input type="email" name="email" placeholder="Your email" />
                            </div>
                            <div class="f-row">
                                <input type="password" name="pass" placeholder="Your password" />
                            </div>
                            <div class="f-row">
                                <input type="password" name="pass1" placeholder="Retype password" />
                            </div>
                            
                            <div class="f-row bwrap">
                                <input type="submit" name="signUp" value="register" />
                            </div>
                            <p>Already have an account yet? <a href="login.php">Log in.</a></p>
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
</body>
</html>


