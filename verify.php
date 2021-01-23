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
<?php
require('db.php');

if(empty($_GET['email']) && empty($_GET['code']))
{
	header('location: register.php');
}

if(isset($_GET['email']) && isset($_GET['code']))
{
	$email = $_GET['email'];
	$code = $_GET['code'];
	
	$statusY = "Y";
	$statusN = "N";
	
	$query = "SELECT * FROM `customer` WHERE email='$email' AND code='$code'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_fetch_array($result);
	
    if($result){
		if($rows['customerStatus']==$statusN)
		{
			$query = mysqli_query($con, "UPDATE `customer` SET customerStatus = '$statusY' WHERE email='$email' AND code='$code'");
			
			echo ('<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                            	<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
								<li><a href="register.php" class="active"><i class="fa fa-lock" class="active"></i> Login</a></li>
							</ul>
						</div>
		</div><!--/header-middle-->
	
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
						<h2>Wow! Your Account is Now Activated : <a href=\'index.php\'>Login here</a></h2>
                        </div>
					</div>');
		}
		else
		{
			echo ('<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                            	<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
								<li><a href="register.php" class="active"><i class="fa fa-lock" class="active"></i> Login</a></li>
							</ul>
						</div>
		</div><!--/header-middle-->
	
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
						<h2>Sorry! Your Account is already Activated : <a href=\'index.php\'>Login here</a></h2>
                        </div>
					</div>');
		}
	}
	else
	{
		echo ('<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                            	<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
								<li><a href="register.php" class="active"><i class="fa fa-lock" class="active"></i> Login</a></li>
							</ul>
						</div>
		</div><!--/header-middle-->
	
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
						<h2>No account found : <a href=\'register.php\'>Register here</a></h2>
                        </div>
					</div>');
	}	
}

?>
<script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>