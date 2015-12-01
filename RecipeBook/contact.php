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
	<?php 
		if(isset($_POST['send'])){
			$to = "vickym.vidit@gmail.com"; // this is your Email address
			$from = $_POST['mail']; // this is the sender's Email address
			$name = $_POST['name'];
			$subject = "Recipe book form submission";
			$subject2 = "Copy of your recipe book form submission";
			$message = $name . " wrote the following:" . "\n\n" . $_POST['message'];
			$message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['message'];
		
			$headers = "From:" . $from;
			$headers2 = "From:" . $to;
			$m1=mail($to,$subject,$message,$headers);
			$m2=mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
			if($m1 && $m2){
				echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
			}
			else {
				echo "Error sending message please contact system admin.<br>Thank you!";
			}
			// You can also use header('Location: thank_you.php'); to redirect to another page.
		}
?>
	<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--row-->
			<div class="row">
				<!--content-->
				<section class="content center full-width wow fadeInDown">
					<div class="modal container">
						<form method="post" action="">
							<h3>Contact us</h3>
							<div id="message" class="alert alert-danger"></div>
							<div class="f-row">
								<input type="text" name="name" placeholder="Your name" id="name" />
							</div>
							<div class="f-row">
								<input type="email" name="mail" placeholder="Your email" id="email" />
							</div>
							<div class="f-row">
								<input type="number" name="number" placeholder="Your phone number" id="phone" />
							</div>
							<div class="f-row">
								<textarea name="message" placeholder="Your message" id="comments"></textarea>
							</div>
							<div class="f-row bwrap">
								<input type="submit" name="send" value="Send message" />
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
</body>
</html>


