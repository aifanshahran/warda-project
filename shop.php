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
    <title>Shop</title>
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
    <style>
button.accordion {
  background-color: #fff;
  cursor: pointer;
  padding: 0px 0 8px 0;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 18px;
  transition: 0.4s;
  border-bottom: 1px solid #ccc;
}

button.accordion.active, button.accordion:hover {
  color: #000000
}

button.accordion:before {
  content: '\02795';
  font-size: 9px;
  float: left;
  margin-left: 0px;
  margin-right: 10px;
  margin-top: 7px;
}

button.accordion.active:before {
  content: "\2796";
}

div.panel {
  background-color: white;
  max-height: 0;
  padding-left: 15px;
  overflow: hidden;
  padding-top: 0px;
  border-bottom: 4px solid #ccc;
  transition: 0.6s ease-in-out;
  opacity: 0;
  margin-bottom: 8px;
}

.panel-icon {
  margin-right: 10px;
}

.panel h5 {
  font-size: 15px;
  line-height: 23px;
  margin-top: 5px;
  margin-bottom: 0px;
  display: inline-block;
  color: #2d2d2d
}

.panel p {
  font-size: 15px;
  line-height: 23px;
  padding: 15px 30px 20px 0;
  color: #2d2d2d
}

div.panel.show {
  opacity: 1;
  max-height: 500px;
}
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
</head><!--/head-->
<?php
	$posted = false;
	require_once('db.php');
		if(isset($_POST['addtocart'])){
				$posted = true;
				$id = ("SELECT customerID FROM `customer` WHERE email='".$_SESSION["email"]."'");
				$resultid = mysqli_query($con,$id) or die(mysql_error());
				$rows = mysqli_fetch_array($resultid);
				$customerID = $rows['customerID'];
				$productID = $_REQUEST['productID'];
				$pricePerUnit = $_REQUEST['pricePerUnit'];
				$Product_Qty = $_REQUEST['Product_Qty'];
				$queryexist = "SELECT * FROM `cart` WHERE customerID='$customerID'";
				$result = mysqli_query($con,$queryexist) or die(mysql_error());
				$rows = mysqli_num_rows($result);
        		if($rows>0){
				}else{
				$query = ("INSERT into `cart` (customerID) VALUES ('$customerID')");
				$result = mysqli_query($con,$query);}
					if($result){
						$cartid = ("SELECT cart_id FROM `cart` WHERE customerID='".$customerID."'");
						$resultcid = mysqli_query($con,$cartid) or die(mysql_error());
						$rows = mysqli_fetch_array($resultcid);
						$cart_id = $rows['cart_id'];
						$productexist = "SELECT * FROM cart_details c, cart ca, customer cu WHERE ca.customerID=cu.customerID AND cu.customerID=$customerID AND ca.cart_id=c.cart_id AND c.cart_id=$cart_id AND c.productID=$productID";
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
                            <li><a href="../WardaHadfina/" class="active"><i class="fa fa-home"></i> Home</a></li>
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
								<li><a href="../WardaHadfina/">Home</a></li>
								<?php if(isset($_GET['p'])){
								echo '<li><a href="shop.php" class="active">Shop</a></li>';
								}else{
								echo '<li><a href="" class="active">Shop</a></li>';}
								?>
				            	<li><a href="aboutus.php">About us</a></li>
                    </ul>
                    </div>
                    </div>
				</div>
			</div>
		</div><!--/header-bottom-->
					
	<section>
		<div class="container">
		<?php 
			require('db.php');
			if(isset($_GET['p'])){
				$query = "SELECT * FROM `product` WHERE productID = '".$_GET['p']."'";
				$result = mysqli_query($con,$query) or die(mysql_error());
				$rows = mysqli_fetch_array($result);
				echo '<div class="col-sm-12">
						<h2 class="title text-center">Shopping</h2>';
						if( $posted ) {
						  if( $cartadded ) {
							echo '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><strong>Success!</strong> Item added in your cart.</div>';
						  }else{
							echo '<div class="alert alert-danger alert-dismissable">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						<strong>Fail!</strong> Item cannot added in your cart. Please call/contact our customer service.
					  </div>';}
						}
						echo '<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="uploads/'.$rows['photoProduct_name'].'" alt="" />
										</div>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
						<h3 class="title text-left" style="color: red">'.$rows['productName'].'</h3>
							<br/>
						<h4>RM '.sprintf('%0.2f',$rows['productPrice_unit']).'</h4>
						<br/>';
				if($rows['productQuantity']>0){
					echo '<span style="color: #333333;">Availability: </span><u><span style="color: #990000;">IN STOCK</span></u><br/><br/>';
					if(isset($_SESSION["email"])){
						echo '<form action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="productID" value="'.$rows['productID'].'"/>
							<input type="hidden" name="pricePerUnit" value="'.sprintf('%0.2f',$rows['productPrice_unit']).'"/>
							<input type="hidden" name="Product_Qty" value="1"/>
							<div style="width:500px;">
    						<div style="float: left; width: 130px"> 
							<button type="submit" style="width:460px;" name=\'addtocart\' class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
							</form>
							</div>
						<div style="float: right; width: 25px"> 
						<button class="btn btn-default add-to-cart" style="width:190px;><i class="fa fa-plus-square"></i>Add to Wishlist</button>
						</div>
						</div>';
					}else if(isset($_SESSION['staffid'])){
					}else{
						echo '<a class="btn btn-default add-to-cart" style="width:460px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-shopping-cart"></i>Add to cart</a>
						<a class="btn btn-default add-to-cart" style="width:190px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i>Add to Wishlist</a>';
					}
				}else{
					echo '<span style="color: #333333;">Availability</span><span style="background-color: white;"><span style="color: #333333;">: </span><u><span style="color: red;">OUT OF STOCK</span></u></span><br/><br/>';
					if(isset($_SESSION["email"])){
						echo '<a data-toggle="tooltip" title="Sorry, but this product is out of stock." class="btn btn-default add-to-cart" style="width:460px;background-color: white; color: #696763; cursor: default;"><i class="fa fa-shopping-cart"></i>Add to cart</a>
						<a class="btn btn-default add-to-cart" style="width:190px;"><i class="fa fa-plus-square"></i>Add to Wishlist</a><br/>';
					}else if(isset($_SESSION['staffid'])){
					}else{
						echo '<a data-toggle="tooltip" title="Sorry, but this product is out of stock." class="btn btn-default add-to-cart" style="width:460px;background-color: white; color: #696763; cursor: default;"><i class="fa fa-shopping-cart"></i>Add to cart</a>
						<a class="btn btn-default add-to-cart" style="width:190px; data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i>Add to Wishlist</a><br/>';
					}
				}
						echo '<button class="accordion">Product Description</button>
					<div class="panel">
					  <p>'.$rows['productDescription'].'</p>
					</div><!-- /.end of job post -->

					<button class="accordion">Product Information/Details</button>
					<div id="foo" class="panel">
					  Name: '.$rows['productName'].'<br/>
					  Colour: '.$rows['colour'].'<br/>
					  Size: '.$rows['size'].'<br/>
					  Material: '.$rows['productMaterial'].'<br/>
					  Category: '.$rows['category'].'<br/>
					</div><!-- /.end of job post -->

					<button class="accordion">Brands</button>
					<div id="foo" class="panel">
					  <p>'.$rows['productBrand'].'</p>
					</div><!-- /.end of job post -->
											</div>
										</div><!--features_items-->
									</div>

									<!-- Large modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
						aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										×</button>
									<h4 style="color: red">Please login to your account first</h4>
								</div>
								<div class="modal-body">
										<div class="login-form" id="login"><!--login form-->
											<div id="thanks"></div>
											<form id="myform" name="login" class="form-horizontal" role="form" method="POST">
												<input type="text" placeholder="email" name="email"/>
												<input type="password" placeholder="Password" name="password"/>
												<button type="submit" class="btn btn-default" name="submit" value="Login" id="submitForm">Login</button>
												<br/>
												<p>Didn\'t sign up yet? <a href="register.php">Create a new account now!</a></p>
											</form>
									</div>
							</div>';
				
			}else{
			?>
		<!--brands_products sidebar-->
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<div class="brands_products">
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="shop.php"> <span class="pull-right"><?php 
										require_once('db.php');
										$naelofar="SELECT * FROM `product`";
										$result = mysqli_query($con,$naelofar) or die(mysql_error());
										$rows = mysqli_num_rows($result);
										echo '('.$rows.')';
										?></span>All</a></li>
									<li><a href="shop.php?brand=Naelofar"> <span class="pull-right"><?php 
										require_once('db.php');
										$naelofar="SELECT productBrand FROM `product` WHERE productBrand='Naelofar'";
										$result = mysqli_query($con,$naelofar) or die(mysql_error());
										$rows = mysqli_num_rows($result);
										echo '('.$rows.')';
										?></span>Naelofar Hijab</a></li>
									<li><a href="shop.php?brand=CLOVERUSH"> <span class="pull-right"><?php 
										require_once('db.php');
										$naelofar="SELECT productBrand FROM `product` WHERE productBrand='CLOVERUSH'";
										$result = mysqli_query($con,$naelofar) or die(mysql_error());
										$rows = mysqli_num_rows($result);
										echo '('.$rows.')';
										?></span>Cloverush</a></li>
									<li><a href="shop.php?brand=Cakenis"> <span class="pull-right"><?php 
										require_once('db.php');
										$naelofar="SELECT productBrand FROM `product` WHERE productBrand='Cakenis'";
										$result = mysqli_query($con,$naelofar) or die(mysql_error());
										$rows = mysqli_num_rows($result);
										echo '('.$rows.')';
										?></span>Cakenis</a></li>
									<li><a href="shop.php?brand=dUCk"> <span class="pull-right"><?php 
										require_once('db.php');
										$naelofar="SELECT productBrand FROM `product` WHERE productBrand='dUCk'";
										$result = mysqli_query($con,$naelofar) or die(mysql_error());
										$rows = mysqli_num_rows($result);
										echo '('.$rows.')';
										?></span>Duck Scarves</a></li>
								</ul>
							</div>
						</div>
						<!--End brands_products sidebar-->
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items">
						<h2 class="title text-center">Shopping</h2>
						<?php
    if( $posted ) {
      if( $cartadded ) {
        echo '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><strong>Success!</strong> Item added in your cart.</div>';
	  }else{
        echo '<div class="alert alert-danger alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Fail!</strong> Item cannot added in your cart. Please call/contact our customer service.
  </div>';}
    }
  ?>
						
						
<?php
require('db.php');	
  $rows="";
  $check=0;
  $offset = 0;
  $page_result = 12; 
	if (isset($_GET['pageno'])){
if($_GET['pageno'])
{
 $page_value = $_GET['pageno'];
	
 if($page_value > 1)
 {	
  $offset = ($page_value - 1) * $page_result;
 }
}
	}
	if(!isset($_GET['brand'])){
  	$query = "SELECT * FROM `product` ORDER by productID DESC limit $offset, $page_result";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	}else{
	$query="SELECT * FROM `product` WHERE productBrand='".$_GET['brand']."' ORDER by productID DESC";
	$pagination = $_GET['brand'];
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);}
  	while($rows = mysqli_fetch_array($result)) {
		  if(!isset($_SESSION["email"])){
		  echo '<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<article class="caption">
										<img class="caption__media" style="width: 395px;height: 235px;object-fit: contain;" src="uploads/'.$rows['photoProduct_name'].'" alt="" />
										<div class="caption__overlay">
        								<a href="?p='.$rows['productID'].'" class="btn btn-primary">Product details</a>
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
										<img class="caption__media" style="width: 395px;height: 235px;object-fit: contain;" src="uploads/'.$rows['photoProduct_name'].'" alt="" />
										<div class="caption__overlay">
										<a href="?p='.$rows['productID'].'" class="btn btn-primary">Product details</a>
										</div></article>';
										if($rows['productQuantity']>0){
										echo '
										<h2>RM '.sprintf('%0.2f',$rows['productPrice_unit']).'</h2><p>'.$rows['productName'].'</p>
										<form action="" method="post" enctype="multipart/form-data">
										<input type="hidden" name="productID" value="'.$rows['productID'].'"/>
										<input type="hidden" name="pricePerUnit" value="'.sprintf('%0.2f',$rows['productPrice_unit']).'"/>
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
	  $check++;
  } 
?>		
					<?php
						echo '</div><div style="text-align: right;"><ul style="text-align: right;" class="pagination">';
					if(!isset($_GET['brand'])){
						$query = "SELECT * FROM `product` ORDER by productID";
					}else{
						$query = "SELECT * FROM `product` WHERE productBrand='".$_GET['brand']."'";
					}
					$result = mysqli_query($con,$query) or die(mysql_error());
					$rows = mysqli_num_rows($result);
					$pages = ($rows/12);
					//To make sure default page goes to page 1
					if(!isset($_GET['pageno'])){
						$_GET['pageno']=1;
					}
						if($pages>4){
							if($_GET['pageno']>4){
								echo '<li><a href="shop.php?pageno='.($_GET['pageno']-4).'">&laquo;</a></li>';
					  			for($i=($_GET['pageno']-3); $i<$pages; $i++) {
								  if(($_GET['pageno']) == $i){
									  echo '<li class="active"><a href="shop.php?pageno='.$i.'">'.$i.'</a></li>';
								  }else{
								  echo '<li><a href="shop.php?pageno='.$i.'">'.$i.'</a></li>';}
							  }
								if (($rows % 12) != 0){
									if(($pages)>=($_GET['pageno']-0.5)){
										if($check==12 || (round($rows/12)==0)){
										$stop = round($pages) + 1;
										}else{
										$stop = round($pages);}
									}else{
										$stop = round($pages) + 1;
									}
								}else{
									$stop = $pages;
								}
									if ($i==$stop){
									if(($_GET['pageno']) == $i){
									  echo '<li class="active"><a href="shop.php?pageno='.$i.'">'.$i.'</a></li>';
								  }else{
								  echo '<li><a href="shop.php?pageno='.$i.'">'.$i.'</a></li>';}	
									}else{
									echo '<li><a href="shop.php?pageno='.$i.'">&raquo;</a></li>';}
									}else{
								if($pages>4){
									$pages=5;
									for($i=1; $i<$pages; $i++) {
									  if(($_GET['pageno']) == $i){
										  echo '<li class="active"><a href="shop.php?pageno='.$i.'">'.$i.'</a></li>';
											  }else{
											  echo '<li><a href="shop.php?pageno='.$i.'">'.$i.'</a></li>';}
										  }
										echo '<li><a href="shop.php?pageno='.$i.'">&raquo;</a></li>';
								}else{
									for($i=1; $i<$pages; $i++) {
									  if(($_GET['pageno']) == $i){
										  echo '<li class="active"><a href="shop.php?pageno='.$i.'">'.$i.'</a></li>';
											  }else{
											  echo '<li><a href="shop.php?pageno='.$i.'">'.$i.'</a></li>';}
										  }
										echo '<li><a href="shop.php?pageno='.$i.'">&raquo;</a></li>';
										}
							}
						}else{
							if (($rows % 12) != 0){
									if($check==12 || (round($rows/12)==0) || $check<5){
									$stop = round($pages) + 1;
									}else{
									$stop = round($pages);}
								}else{
									$stop = $pages;
							}
							for($i=1; $i<=$stop; $i++) {
									  if(($_GET['pageno']) == $i){
										  echo '<li class="active"><a href="shop.php?pageno='.$i.'">'.$i.'</a></li>';
											  }else{
											  echo '<li><a href="shop.php?pageno='.$i.'">'.$i.'</a></li>';}
										  }
										}
						echo '</ul></div>';
								?>
					</div><!--features_items-->
				</div>
			</div>
			<?php } ?>
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
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script>
var acc = document.getElementsByClassName("accordion");
var i;

function click_action(){
  $('.accordion').removeClass('active');
  $('.panel').removeClass('show');

  this.classList.toggle("active");
  this.nextElementSibling.classList.toggle("show");
}

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = click_action;
}
</script>
<script> 
	$('#myModal').on('hidden.bs.modal', function () {
        $(this).removeData('bs.modal');
        $(':input', '#myform').val("");
    });

    $("#submitForm").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "signin.php",
            data: $('#myform').serialize(),
            success: function (msg) {
                $("#thanks").html(msg);
				if (msg=="Success"){
					location.reload();
				}
            },
        });
    });
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

</script>
</body>
</html>