<?php
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
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

<body>
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                            	<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
								<li><a href="login.html" class="active"><i class="fa fa-lock" class="active"></i> Login</a></li>
							</ul>
						</div>
		</div><!--/header-middle-->
	
	<section id="form">
    <!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form" id="login"><!--login form-->
						<h2>Login to your account</h2>
						<form action="account.html">
							<input type="text" placeholder="Username" />
							<input type="password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form" id="register"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="register.php" method="post" autocomplete="off">
							<input type="text" placeholder="Name" name="name"/>
							<input type="email" placeholder="Email Address" name="email"/>
							<input type="password" placeholder="Password" name="password"/>
                            <input type="date" placeholder="Date of Birth" name="dateOf_birth"/>
                            <select>
  <option>Gender</option>
  <option name="gender" value="Male">Male</option>
  <option name="gender" value"Female">Female</option>
							</select><br><br>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
                        </div>
                        <br>
                        <br>
                        </div>
                        <form action="loginadmin.html">
							<button type="submit" class="btn btn-default">Admin login</button></form><br>
                    <form action="loginwarehouse.html">
							<button type="submit" class="btn btn-default">Warehouse login</button></form>
					</div><!--/sign up form-->
	</section><!--/form-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>