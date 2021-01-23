<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login Admin</title>
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
require('db.php');
session_start();
	if (isset($_POST['staff'])){
		$staff = stripslashes($_REQUEST['staff']);
        //escapes special characters in a string
		$staff = mysqli_real_escape_string($con,$staff);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		//Checking is user existing in the database or not
        $query = "SELECT * FROM `admin` WHERE admin_id='$staff'
and admin_password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
		$_SESSION['staffid'] = $staff;
		header("location: notification.php");
         }else{
			$error = "Staff ID/password is incorrect.";
			header("location: loginadmin.php?error=$error");
	}
	}
?>

<body>
	
	<section id="form">
    <!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
				<form name="staff" action="" method="post" autocomplete="off">
						<?php if(isset($_GET['error'])) {$error = $_GET['error']; echo "<span style=\"color:red\"> $error </span>"; } ?>
							<input type="text" placeholder="Staff ID" name="staff"/>
							<input type="password" placeholder="Password" name="password"/>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
						<h2>REMEMBER: ONLY ADMINISTRATOR ALLOWED TO BE HERE</h2>
							<button type="submit" class="btn btn-default" name="submit" value="Login">Login</button>
						</form>
					</div><!--/login form-->
	</section><!--/form-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>