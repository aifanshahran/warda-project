<?php
session_start();
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Chicrush</title>
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
<style>
.caption {
    position: relative;
    overflow: hidden;
}
.caption__media {
    display: block;
    min-width: 100%;
    max-width: 100%;
    height: auto;
}
.caption__overlay {
    position: absolute;
    top: 30%;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 20px;
    color: white;
    transform: translateY(-100%);
    transition: .5s ease;
}
.caption:hover .caption__overlay {
    transform: translateY(0);
}
.caption::before {
    content: ' ';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: transparent;
    transition: background .35s ease-out;
}
.caption:hover::before {
    background: rgba(255,255,255,0.73);
}
</style>
<?php
	$posted = false;
		if(isset($_POST['addtocart'])){
				$posted = true;
				$id = ("SELECT customerID FROM `customer` WHERE email='".$_SESSION["email"]."'");
				$resultid = mysqli_query($con,$id) or die(mysql_error());
				$rows = mysqli_fetch_array($resultid);
				$customerID = $rows['customerID'];
				$productID = $_POST['productID'];
				$pricePerUnit = $_POST['pricePerUnit'];
				$Product_Qty = $_POST['Product_Qty'];
				$queryexist = "SELECT * FROM `cart` WHERE customerID='$customerID'";
				$result = mysqli_query($con,$queryexist) or die(mysql_error());
				$rows = mysqli_num_rows($result);
        		if($rows==1){
				}else{
				$query = ("INSERT into `cart` (customerID) VALUES ('$customerID')");
				$result = mysqli_query($con,$query);}
					if($result){
						$cartid = ("SELECT cart_id FROM `cart` WHERE customerID='".$customerID."'");
						$resultcid = mysqli_query($con,$cartid) or die(mysql_error());
						$rows = mysqli_fetch_array($resultcid);
						$cart_id = $rows['cart_id'];
						$productexist = "SELECT * FROM `cart_details` WHERE cart_id='$cart_id' and productID='$productID'";
						$resultproex = mysqli_query($con,$productexist) or die(mysql_error());
						$rows = mysqli_num_rows($resultproex);
						if($rows==1){
						$rows = mysqli_fetch_array($resultproex);
						$Product_Qty = $rows['Product_Qty'];
						$Product_Qty++;
						$subtotal = $pricePerUnit * $Product_Qty;
						$query = ("UPDATE cart_details SET Product_Qty='$Product_Qty',subtotal='$subtotal' WHERE cart_id='$cart_id' AND productID='$productID'");
						$result = mysqli_query($con,$query);
						}else{
						$subtotal = $pricePerUnit * $Product_Qty;
						$query = ("INSERT into `cart_details` (productID, cart_id, pricePerUnit, Product_Qty, subtotal)
						VALUES ('$productID', '$cart_id', '$pricePerUnit', '$Product_Qty', '$subtotal')");
						$result = mysqli_query($con,$query);}
							if($result){
								$totalquery = ("SELECT SUM(subtotal) FROM `cart_details` WHERE cart_id='".$cart_id."'");
								$resulttotalquery = mysqli_query($con,$totalquery) or die(mysql_error());
								$rows = mysqli_fetch_array($resulttotalquery);
								$total = $rows['SUM(subtotal)'];
								$query = ("UPDATE cart SET total='".$total."' WHERE cart_id='".$cart_id."'");
								$result = mysqli_query($con,$query);
								if($result){
									$cartadded = true;
								}else{
								 $cartadded = false;
								}
							}else{
								$cartadded = false;
							}
					}else{
						$cartadded = false;
					}
		}
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
								<li><a href="index.html" class="active">Home</a></li>
								<li><a href="shop.php">Shop</a></li>
				            	<li><a href="aboutus.php">About us</a></li>
					</div>
				</div>
			</div>
		</div>
			<?php if(isset($_SESSION["staffid"])){ echo '</div>'; } ?><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
          					<img border="0" style="center" src="images/home/girl1.jpg" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<img border="0" style="center" src="images/home/girl2.jpg" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<img border="0" style="center" src="images/home/girl3.jpg" alt="" />
								</div>
							</div>
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
		<section>
		<div class="container">
			<div class="row">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php if( $posted ) {
						  if( $cartadded ) {
							echo '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><strong>Success!</strong> Item added in your cart.</div>';
						  }else{
							echo '<div class="alert alert-danger alert-dismissable">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						<strong>Fail!</strong> Item cannot added in your cart. Please call/contact our customer service.
					  </div>';}
						} ?>
<?php
  $rows="";
			
  $query = "SELECT * FROM `product` ORDER by productID DESC limit 0,6";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);

  while($rows = mysqli_fetch_array($result)) {
		  if(!isset($_SESSION["email"])){
		  echo '<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<article class="caption">
										<img class="caption__media" style="width: 395px;height: 335px;object-fit: contain;" src="uploads/'.$rows['photoProduct_name'].'" alt="" />
										<div class="caption__overlay">
        								<a href="shop.php?p='.$rows['productID'].'" class="btn btn-primary">Product details</a>
										</div>
										</article>
										<h2>RM '.sprintf('%0.2f',$rows['productPrice_unit']).'</h2><p>'.$rows['productName'].'</p></div>
								</div>
							</div>
						</div>';
	  }else{
		  echo '<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<article class="caption">
										<img class="caption__media" style="width: 395px;height: 335px;object-fit: contain;" src="uploads/'.$rows['photoProduct_name'].'" alt="" />
										<div class="caption__overlay">
        								<a href="shop.php?p='.$rows['productID'].'" class="btn btn-primary">Product details</a>
										</div>
										</article>';
										if($rows['productQuantity']>0){
										echo '
										<h2>RM '.sprintf('%0.2f',$rows['productPrice_unit']).'</h2><p>'.$rows['productName'].'</p>
										<form action="" method="post" enctype="multipart/form-data">
										<input type="hidden" name="productID" value="'.$rows['productID'].'"/>
										<input type="hidden" name="pricePerUnit" value="'.$rows['productPrice_unit'].'"/>
										<input type="hidden" name="Product_Qty" value="1"/>
										<button type="submit" name=\'addtocart\' class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</form>
										</div>
										</div>';
										}else{
										echo '
										<h2>RM '.sprintf('%0.2f',$rows['productPrice_unit']).'</h2><p>'.$rows['productName'].'</p>
										<a data-toggle="tooltip" title="Sorry, but this product is out of stock." class="btn btn-default add-to-cart" style="background-color: white; color: #696763; cursor: default;"><i class="fa fa-shopping-cart"></i>Add to cart</a></div>
										</div>';	
										}
										echo '<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									</ul>
								</div>
							</div>
						</div>';
	  }
  } 
?>		
				</div>
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
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

</script>
</body>
</html>