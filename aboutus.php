<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>About us</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<?php
	require("db.php");
	if(isset($_POST['submit'])){
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$subject = $_REQUEST['subject'];
		$message = $_REQUEST['message'];
		$queryadd = "INSERT into `feedback` (name, email, subject, comment) VALUES ('$name', '$email', '$subject', '$message')";
		$result = mysqli_query($con, $queryadd);
		if($result){
			header("location: aboutus.php?status=success");
		}else{ 
			header("location: aboutus.php?status=failed");
		}
	}else{
?>

<body>
	<?php if(isset($_SESSION["email"])||(isset($_SESSION['staffid']))){
							if(isset($_SESSION["email"])){
								echo '
								<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +60123345956</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> chicrushonline@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/chicrushklozett"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/chicrushklozett/"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
								<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
								<div class="col-sm-3">
						<div class="logo pull-left">
							<a href="#"><img src="images/home/logo.png" alt="Chicrush" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
							</div>
							
							<div class="btn-group">
							</div>
						</div>
					</div>
					<div class="col-sm-8">
								<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                            <li><a href="index.php" class="active"><i class="fa fa-home"></i> Home</a></li>
								<li><a href="account"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
								<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
							</ul>
						</div>';
							}else if(isset($_SESSION['staffid'])){
								echo '
								<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
								<div class="col-sm-3">
						<div class="logo pull-left">
							<a href="#"><img src="images/home/logo.png" alt="Chicrush" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
							</div>
							
							<div class="btn-group">
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="notification.php"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
							</ul>
						</div>
					</div> ';}} //End if for admin and user
					else{
							echo '
							<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +60123345956</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> chicrushonline@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/chicrushklozett"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/chicrushklozett/"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
							<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
							<div class="col-sm-3">
						<div class="logo pull-left">
							<a href="#"><img src="images/home/logo.png" alt="Chicrush" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
							</div>
							
							<div class="btn-group">
							</div>
						</div>
					</div>
					<div class="col-sm-8">
							<div class="shop-menu pull-right">
					<ul class="nav navbar-nav"> 
				<li><a href="register.php"><i class="fa fa-lock"></i> Login</a></li>
										</ul>
									</div>';
					}
					?>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
								<li><a href="shop.php">Shop</a></li>
				            	<li><a href="aboutus.php" class="active">About us</a></li>
					</div>
				</div>
			</div>
		</div>
			<?php if(isset($_SESSION["staffid"])){ echo '</div>'; } ?><!--/header-bottom-->
	</header><!--/header-->
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">About <strong>Us</strong></h2>    			    				    				<div style="text-align: center;">
<div style="text-align: left;">
​​Who are we?</div>
</div>
<div style="text-align: center;">
<div style="text-align: left;">
<br /></div>
</div>
<div style="text-align: center;">
<div style="text-align: left;">
We are busy women at work and home - similar to most women out there. We DO understand the frustrating feeling of juggling between busy work life, family and our own personal time. We did experience similar issues ladies. Nowadays, people do not have sufficient time to go to physical boutique due to hectic daily lifestyle. Thus, we really understand the needs on getting things fast and from one source/place whenever possible.</div>
</div>
<div style="text-align: center;">
<div style="text-align: left;">
<br /></div>
</div>
<div style="text-align: center;">
<div style="text-align: left;">
Hence, chicrushonline is created to address the issue. Online Shopping definitely the preferred solution to those Modern and Busy Women out there who had been undergoing hectic lifestyle on a daily basis.</div>
</div>
<div style="text-align: center;">
<div style="text-align: left;">
<br /></div>
</div>
<div style="text-align: center;">
<div style="text-align: left;">
What we sell?</div>
</div>
<div style="text-align: center;">
<div style="text-align: left;">
<br /></div>
</div>
<div style="text-align: center;">
<div style="text-align: left;">
Our main products are women hijab such as Hijab. All the brands featured in chicrushonline are personally picked by us and they are the TOP Malaysia's home grown brands that offer high quality, hassle free to wear and off course chic and gorgeous.</div>
</div>
<div style="text-align: center;">
<div style="text-align: left;">
<br /></div>
</div>
<div style="text-align: center;">
<div style="text-align: left;">
Why choose us?</div>
</div>
<div style="text-align: center;">
<div style="text-align: left;">
<br /></div>
</div>
<div style="text-align: center;">
<div style="text-align: left;">
We have been in the same situation and we really do understand the frustrating feelings of not having sufficient time to even reward yourself after a long hectic day. We know that online shopping have helped us in dealing the issue and we know which brands offer high quality products and hassle free to wear. We Wear what We Sell.</div>
</div>
</div>
</div>
<br/>
<br/>
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
				    	<form action="" name="name" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
			                <?php
							require("db.php");
		  					if(isset($_GET['status'])){
								if ($_GET['status']=='success'){
								echo '<div class="form-group col-md-12">
										<h4 style="color: green">We received your comments/feedback/message. Please wait until we sent you an email :)</h4>
								</div>';
							}else{
								echo '<div class="form-group col-md-12">
										<h4 style="color: red">Sorry, We don\'t received your comments/feedback/message. There might be some problem. Please contact us using our official social media :)</h4>
								</div>';}
							}else{
							if(isset($_SESSION["email"])){
								$query = "SELECT * FROM `customer` WHERE email='".$_SESSION["email"]."'";
								$result = mysqli_query($con,$query) or die(mysql_error());
								$rows = mysqli_fetch_array($result);
								echo '<div class="form-group col-md-6">
								<input type="text" name="name" class="form-control" required="required" placeholder="Name" value="'.$rows['name'].'" readonly>
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email" value="'.$rows['email'].'" readonly>
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				            <button name="submit" type="submit" class="btn btn-primary pull-right">Submit</button>
				            </div>';
							}else if(isset($_SESSION['staffid'])){
								echo '<div class="form-group col-md-12">
										<h4 style="color: red">Admin prohibited from giving feedback</h4>
								</div>';
							}else{
								echo '<div class="form-group col-md-6">
								<input type="text" name="name" class="form-control" required="required" placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				            <button name="submit" type="submit" class="btn btn-primary pull-right">Submit</button>
				            </div>';
							}
							}
								?>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>CHICRush klozett(WardaHadfina Parlour)</p>
							<p>26, Jalan Padi Emas 1/4, UDA Business Center, Bandar Baru Uda, 81200 Johor Bahru</p>
							<p>Johor, Malaysia</p>
							<p>Mobile: +60123345956</p>
							<p>Email: chicrushonline@gmail.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li><a href="https://www.facebook.com/chicrushklozett"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/chicrushklozett/"><i class="fa fa-instagram"></i></a></li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	<?php } ?>
	<footer id="footer"><!--Footer-->	
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2016 WardaHardina Parlour. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.aifanshahran.com">Aifan Shahran/Imran Daud/Nabil Fahruddin</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>