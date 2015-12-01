<?php
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['username'])){
		header('Location: login.php');
		exit;
	}
?>
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
                    <li><a href="#" title="Hello"><span style="color: #F4716A;font-size: 16px;font-weight: 500;text-transform: uppercase;">Hello <?php include("apiCalls/getUser.php"); ?>!</span></a></li>
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