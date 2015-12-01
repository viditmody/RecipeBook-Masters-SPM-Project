<!DOCTYPE html>
<html>
<?php
	session_start();
	if(isset($_SESSION['id']) || isset($_SESSION['username'])){
		header('Location: recipes.php');
		exit;
	}
?>
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
<div class="intro">
			<figure class="bg"><img src="images/intro.jpg" alt="" /></figure>
	<!--header-->
	<header class="head" role="banner">
        <!--row-->
        
				<div class="row">
					<article class="three-fourth text wow zoomIn" data-wow-delay=".2s">
						<h1 style="margin: 20px 0px 0 -15px;">Welcome to RecipeBook!</h1>
					</article>
					
				</div>
				<!--//row-->
		
	</header>
	<!--//header-->
		
	<!--main-->
	<main class="main" role="main">
            
		<!--wrap-->
		<div class="wrap clearfix">
			<!--row-->
			<div class="row">
			<!--content-->
				<section class="content center full-width wow fadeInDown">
					<div class="modal container" style="
    margin: -70px 40% 0px -15%;
">
						<form method="post" action="apiCalls/checkLogin.php">
                            <h3>Login</h3>
                            <div class="f-row">
                                <input name="username" type="text" placeholder="Your username" />
                            </div>
                            <div class="f-row">
                                <input name="password" type="password" placeholder="Your password" />
                            </div>
                            
                            <div class="f-row">
                                <input type="checkbox" />
                                <label>Remember me next time</label>
                            </div>
                            
                            <div class="f-row bwrap">
                                <input type="submit" name="login" value="login" />
                            </div>
                            <p><a href="#">Forgotten password?</a></p>
                            <p>Dont have an account yet? <a href="register.php">Sign up.</a></p>
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
    </div>
</body>
</html>


