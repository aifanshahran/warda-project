<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="assets/signup-form.css" type="text/css" />
    <title>Login</title>
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="css/datepicker.css">
  <style>
label, input {
    display: block;
}
label {
	margin-top: -21px;
    margin-bottom: 30px;
	font-weight: normal !important;
}
	  datepicker {
		  position: absolute;
	  }
</style>
</head><!--/head-->
<?php
require('db.php');
session_start();
	$statusY = "Y";
	$statusN = "N";
	if (isset($_POST['email'])){
		$email = stripslashes($_REQUEST['email']);
        //escapes special characters in a string
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		//Checking is user existing in the database or not
        $query = "SELECT * FROM `customer` WHERE email='$email'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
			$rows = mysqli_fetch_array($result);
			if($rows['customerStatus']==$statusN){
				$error = "Please activate your account first";
				header("location: register.php?error=$error");
			}else{
			$_SESSION['email'] = $email;
				header("location: index.php");
}
         }else{
			$error = "Email/password is incorrect.";
			header("location: register.php?error=$error");
	}
    }else{
?>
<body>

<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                            	<li><a href="../WardaHadfina/"><i class="fa fa-home"></i> Home</a></li>
								<li><a href="register.php" class="active"><i class="fa fa-lock" class="active"></i> Login</a></li>
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
						<?php if(isset($_GET['error'])) {$error = $_GET['error']; echo "<span style=\"color:red\"> $error </span>"; } ?>
						<form name="login" action="" method="post" autocomplete="off">
							<input type="text" placeholder="email" name="email"/>
							<input type="password" placeholder="Password" name="password"/>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default" name="submit" value="Login">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form" id="register"><!--sign up form-->
						<h2>New User Signup!</h2>
						<?php if(isset($_GET['v'])) {$v = $_GET['v']; echo "<span style=\"color:red\"> $v </span>"; } ?>
						<form name="register" action="checkingregister.php" method="post" role="form" id="register-form" autocomplete="off">
						<br/>
						<label>
						<span class="form-group">
							<span class="input-group">
						   <input name="name" type="text" class="form-control" placeholder="Name" size="52" required>
						   <span class="help-block" id="error"></span></span></span>
						</label>
					   <label>
						   <span class="form-group">
						   <span class="input-group">
						   <input name="email" type="text" class="form-control" placeholder="Email" size="52" required> 
						   <span class="help-block" id="error">
					 		</span></span></span>
						</label>
				 		<label>
					 		<span class="form-group">
					 		<span class="input-group">
							<input name="password" id="password" type="password" class="form-control" placeholder="Password" size="52" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
							<span class="help-block" id="error"></span></span></span>
                         </label>
                         <label>
                          <span class="form-group">
                           <span class="input-group">
                        <input name="cpassword" type="password" class="form-control" placeholder="Retype Password" size="52" required>  
                        <span class="help-block" id="error"></span></span></span>
                          </label>
                          <label>
                          <span class="form-group">
                           <input class="form-control" id="datepicker" name="dateOf_birth" placeholder="Date Of Birth - YYYY/MM/DD" size="52" type="date"/>
                           <span class="help-block" id="error"></span>
							  </span>
                         </label>
							<button type="submit" class="btn btn-info" name="submit" value="Register">Signup</button>
						</form>
                        </div>
                        </div>
		</div>
		</div>
                        <!--/sign up form-->
	</section>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
   <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="assets/jquery.validate.min.js"></script>
    <script>
	$('document').ready(function()
{ 		 		
		 // name validation
		  var nameregex = /^[a-zA-Z ]+$/;
		 
		 $.validator.addMethod("validname", function( value, element ) {
		     return this.optional( element ) || nameregex.test( value );
		 }); 
		 
		 // valid email pattern
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional( element ) || eregex.test( value );
		 });
		 
		 $("#register-form").validate({
					
		  rules:
		  {
				name: {
					required: true,
					validname: true,
					minlength: 4
				},
				email: {
					required: true,
					validemail: true
				},
				password: {
					required: true,
					minlength: 8,
					maxlength: 15
				},
				cpassword: {
					required: true,
					equalTo: '#password'
				},
				  dateOf_birth: {
						required: true
					},
		   },
		   messages:
		   {
				name: {
					required: "Please Enter Name",
					validname: "Name must contain only alphabets and space",
					minlength: "Oh man! Your name is too short! We are not sure if there is someone who has only 3 character for name :p Need some more :)"
					  },
			    email: {
					  required: "Please Enter Email Address",
					  validemail: "Are you sure it was your official email? It doesn't look like! Recheck again, please :)"
					   },
				password:{
					required: "Please Enter Password",
					minlength: "For security purposes, please at least have 8 characters :)"
					},
				cpassword:{
					required: "Please Retype your Password",
					equalTo: "Oh man! Recheck and make it match for both!"
					},
			   dateOf_birth:{
					required: "We need your birth date",
				   	maxDate: "Oh no! You are too young, babe."
					},
			   
		   },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		   },
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			  $(element).closest('.form-group').find('.help-block').html('');
		   },
		   
		   
		   });
});	
	
	</script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
	$(function() {
        $( "#datepicker" ).datepicker({
			
            dateFormat : 'yy/mm/dd',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '-16y'
			
        });
    });				
	</script>
    <script src="js/main.js"></script>
<?php } ?>
</body>
</html>