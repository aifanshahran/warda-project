<?php
//include auth.php file on all secure pages
include("../auth.php");
include("../db.php");
require("../display.php");
?>
<?php
		if(isset($_POST['upload'])){
			if((($_REQUEST['name']) != ($rows['name'])) && (($_FILES['image']['tmp_name'])!= $file) && (($_REQUEST['email']) != ($_SESSION['email'])) && (($_REQUEST['newpassword']) != md5(($rows['password']))) && (($_REQUEST['dateOf_birth']) != ($rows['dateOf_birth'])) && (($_REQUEST['gender']) != ($rows['gender']))){
				move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$_FILES['image']['name']);
				$name = stripslashes($_REQUEST['name']);
				$name = mysqli_real_escape_string($con,$name); 
				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($con,$email);
				$password = stripslashes($_REQUEST['newpassword']);
				$password = mysqli_real_escape_string($con,$password);
				$dateOf_birth = $_POST['dateOf_birth'];
				$gender = stripslashes($_REQUEST['gender']);
				$gender = mysqli_real_escape_string($con,$gender);
				$query = mysqli_query($con, "UPDATE customer SET photo_name = '".$_FILES['image']['name']."' , name = '$name' , email = '$email' , password = '".md5($password)."' , dateOf_birth = '$dateOf_birth' , gender = '$gender' WHERE email = '".$_SESSION['email']."'");
				$result = mysqli_query($con,$query);
					if($result){
						$_SESSION['email'] = $email;
						header("location: ../account");
					}else{
						echo "error1";
					}
			}else if ((($_REQUEST['name']) != ($rows['name'])) || (($_FILES['image']['tmp_name'])!= $file) || (($_REQUEST['email']) != ($_SESSION['email'])) || (($_REQUEST['newpassword']) != md5(($rows['password']))) || (($_REQUEST['dateOf_birth']) != ($rows['dateOf_birth'])) || (($_REQUEST['gender']) != ($rows['gender']))){
				if ((($_REQUEST['name']) != ($rows['name'])) || (($_FILES['image']['tmp_name'])!= $file)){
				//NAME CHANGES
				if(($_REQUEST['name']) != ($rows['name'])){
					$name = stripslashes($_REQUEST['name']);
					$name = mysqli_real_escape_string($con,$name); 
					$query = mysqli_query($con, "UPDATE customer SET name = '$name' WHERE email = '".$_SESSION['email']."'");
				}else{
					$name=$rows['name'];
				}
				//IMAGE CHANGES
				if(($_FILES['image']['tmp_name'])!= ""){
					move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$_FILES['image']['name']);
					$query = mysqli_query($con, "UPDATE customer SET photo_name = '".$_FILES['image']['name']."' WHERE email = '".$_SESSION['email']."'");
				}else{
					$file=$file;
				}
			}
			if((($_REQUEST['email']) != ($_SESSION['email'])) || (($_REQUEST['newpassword']) != md5(($rows['password'])))) {
				//EMAIL CHANGES
				if(($_REQUEST['email']) != ($_SESSION['email'])){
					$email = stripslashes($_REQUEST['email']);
					$email = mysqli_real_escape_string($con,$email);
					$query = mysqli_query($con, "UPDATE customer SET email = '$email' WHERE email = '".$_SESSION['email']."'");
					$_SESSION['email'] = $email;
				}else{
					$email = $_SESSION['email'];
				}
				//PASSWORD CHANGES
				if((md5($_REQUEST['newpassword'])) != (md5("")) || ((md5($_REQUEST['password'])) != (md5(""))) || ((md5($_REQUEST['confirmpassword'])) != (md5(""))) ){	
					$password = stripslashes($_REQUEST['newpassword']);
					$password = mysqli_real_escape_string($con,$password);
					$query = mysqli_query($con, "UPDATE customer SET password = '".md5($password)."' WHERE email = '".$_SESSION['email']."'");
				}else{
					$password=md5(($rows['password']));
				}
			}
			if((($_REQUEST['dateOf_birth']) != ($rows['dateOf_birth'])) || (($_REQUEST['gender']) != ($rows['gender']))){
				//DATE OF BIRTH CHANGES
				if(($_REQUEST['dateOf_birth']) != ($rows['dateOf_birth'])){
					$dateOf_birth = $_POST['dateOf_birth'];
					$query = mysqli_query($con, "UPDATE customer SET dateOf_birth = '$dateOf_birth' WHERE email = '".$_SESSION['email']."'");
				}else{
					$dateOf_Birth = $rows['dateOf_birth'];
				}
				//GENDER CHANGES
				if(($_REQUEST['gender']) != ($rows['gender'])){
					$gender = stripslashes($_REQUEST['gender']);
					$gender = mysqli_real_escape_string($con,$gender);
					$query = mysqli_query($con, "UPDATE customer SET gender = '$gender' WHERE email = '".$_SESSION['email']."'");
				}else{
					$gender=$rows['gender'];
				}
					header("location: ../account");
			}else{
				header("location: ../account");
			}
			}
		}	
		?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Account profile</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
  $( function() {
	$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd'}).datepicker("<?php echo $rows['dateOf_birth']; ?>", new Date());
  } );
  </script>
</head><!--/head-->
<body>
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
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                            	<li><a href="../"><i class="fa fa-home"></i> Home</a></li>
								<li><a href="../account/" class="active"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="../cart.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
								<li><a href="../logout.php"><i class="fa fa-lock"></i>Logout</a></li>
							</ul>
                            </div>
					</div>
				</div>
			</div>
						</div>
		</div><!--/header-middle-->
        	</header><!--/header-->
            </br>
		<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<center>
					<div class="left-sidebar">
					<div class="profile-userpic">
					<img class="img-circle" src="<?php echo $file; ?>" alt="" style="width:200px; height:200px;" />
				</div><br/>
						<h2>Hi <?php echo $rows['name']; ?>!</h2>
						<div class="panel-group category" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="index.php">
											Account Overview
										</a>
									</h4>
									</div>
								</div>
							</div>
							<div class="panel-group category" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="shoppingitems.php">
											Shopping Items and Invoice
										</a>
									</h4>
									</div>
								</div>
						</div>
                              <div class="panel-group category" id="accordian"><!--category-productsr-->
                               <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">
											Profile Settings
										</a>
									</h4>
									</div>
								</div>
						</div>
                                </div>
                                </center>
							</div>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Account Overview</h2>
                       <form action="" method="post" enctype="multipart/form-data">
                        <table>
     <thead>
       <tr>
            <td>Profile Photo</td>
            <td>
			<input type="file" name="image" accept="image/*"/>
            </td>
       </tr>
		</thead>
   <thead>
       <tr>
            <td>Name</td>
            <td><input type="text" placeholder="<?php echo $rows['name']; ?>" name="name" value="<?php echo $rows['name']; ?>"/></td>
       </tr>
    </thead>
    <tbody>
       <tr>
           <td>Date of Birth</td>
           <td><input type="date" id="datepicker" placeholder="Date of Birth" name="dateOf_birth" value="<?php echo $rows['dateOf_birth']; ?>" min="1920-01-01" max="2000-12-31" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"/></td>
       </tr>
    </tbody>
    
    <tbody>
       <tr>
           <td>Email Address</td>
           <td><input type="text" placeholder="<?php echo $_SESSION['email']; ?>" name="email" value="<?php echo $_SESSION['email']; ?>"/></td>
       </tr>
    </tbody>
    <tbody>
       <tr>
           <td>Change password</td>
		   <td>Enter your existing password:<br/><input type="password" placeholder="Password" name="password"/>
    <br/>Enter your new password:<br/>
    <input type="password" placeholder="Password" name="newpassword"><br/>
   Re-enter your new password:</br>
   <input type="password" placeholder="Password" name="confirmnewpassword"><br/>
		   </td>
    </tr>
    </tbody>
    <tbody>
       <tr>
           <td>Gender</td>
           <td>
           <?php
			   if ($gender == "Male"){
				   echo "<select name=\"gender\" required>
  <option value=\"Male\">Male</option>
  <option value=\"Female\">Female</option></td>
							</select>";
			   }else if ($gender == "Female"){
				   echo "<select name=\"gender\" required>
  <option value=\"Female\">Female</option>
  <option value=\"Male\">Male</option>?</td>
							</select>";
			   }else{
				   echo "<select name=\"gender\" required>
				   <option value=\"Not specified\">Not specified</option>
  <option value=\"Male\">Male</option>?</td>
  <option value=\"Female\">Female</option>
							</select>";
			   }
			   ?>
       </tr>
       <tr>
       	<td>Address</td>
       	<td><textarea name="message" rows="4"><?php echo $rows['address']?></textarea></td>
       </tr>
    </tbody>
    </table>
</br>
<div class="separator" style="clear: both; text-align: right;">
	<button type="submit" class="btn btn-default" name="upload" value="update">Update</button></div></form>
</br>
</br>
</div>
					</div><!--/blog-post-area-->
	</section>
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
</script>
</body>
</html>