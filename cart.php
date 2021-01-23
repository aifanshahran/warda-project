<?php
require('auth.php');
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout</title>
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
.alert-link{color:#843534}@-webkit-keyframes progress-bar-stripes{from{background-position:40px 0}to{background-position:0 0}}@-o-keyframes progress-bar-stripes{from{background-position:40px 0}to{background-position:0 0}}@keyframes progress-bar-stripes{from{background-position:40px 0}to{background-position:0 0}}.progress{height:20px;margin-bottom:20px;overflow:hidden;background-color:#f5f5f5;border-radius:4px;-webkit-box-shadow:inset 0 1px 2px rgba(0,0,0,.1);box-shadow:inset 0 1px 2px rgba(0,0,0,.1)}.progress-bar{float:left;width:0;height:100%;font-size:12px;line-height:20px;color:#fff;text-align:center;background-color:#DC3538;-webkit-box-shadow:inset 0 -1px 0 rgba(0,0,0,.15);box-shadow:inset 0 -1px 0 rgba(0,0,0,.15);-webkit-transition:width .6s ease;-o-transition:width .6s ease;transition:width .6s ease}.progress-bar-striped,.progress-striped .progress-bar{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);-webkit-background-size:40px 40px;background-size:40px 40px}.progress-bar.active,.progress.active .progress-bar{-webkit-animation:progress-bar-stripes 2s linear infinite;-o-animation:progress-bar-stripes 2s linear infinite;animation:progress-bar-stripes 2s linear infinite}.progress-bar-success{background-color:#5cb85c}.progress-striped .progress-bar-success{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent)}.progress-bar-info{background-color:#5bc0de}.progress-striped .progress-bar-info{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent)}.progress-bar-warning{background-color:#f0ad4e}.progress-striped .progress-bar-warning{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent)}.progress-bar-danger{background-color:#d9534f}.progress-striped .progress-bar-danger{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
</style>
<style>
	.alignleft {
	float: left;
}
.alignright {
	float: right;
}
</style>
<?php
	if((isset($_POST['pluschangequantity'])) || (isset($_POST['minuschangequantity'])) || (isset($_POST['delete'])) || (isset($_POST['newquantity']))){
	$queryexist = "SELECT * FROM `cart` WHERE customerID=(SELECT customerID FROM customer WHERE email='".$_SESSION["email"]."')";
	$result = mysqli_query($con,$queryexist) or die(mysql_error());
	$rows = mysqli_fetch_array($result);
	$customerID = $rows['customerID'];
	$cart_id = $rows['cart_id'];
	$productName = stripslashes($_REQUEST['productName']);
	$productName = mysqli_real_escape_string($con,$productName);
	$subtotal = $_REQUEST['subtotal'];
	$productID = $_REQUEST['productID'];
	$Product_Qty = $_REQUEST['Product_Qty'];
	$productPrice_unit = $_REQUEST['productPrice_unit'];
		if(isset($_POST['minuschangequantity'])){
		$newquantity = $_REQUEST['newquantity'];
			if($newquantity==$Product_Qty){
				$Product_Qty=$newquantity-1;
			}else{
			$Product_Qty=$newquantity;}
			$subtotal = $productPrice_unit * $Product_Qty;
			$query = ("UPDATE cart_details SET Product_Qty='$Product_Qty',subtotal='$subtotal' WHERE cart_id='$cart_id' AND productID='$productID'");
			$result = mysqli_query($con,$query);
			if ($result){
				$totalquery = ("SELECT SUM(subtotal) FROM `cart_details` WHERE cart_id='".$cart_id."'");
				$resulttotalquery = mysqli_query($con,$totalquery) or die(mysql_error());
				$rows = mysqli_fetch_array($resulttotalquery);
				$total = $rows['SUM(subtotal)'];
				$query = ("UPDATE cart SET total='$total' WHERE cart_id='$cart_id' AND customerID='$customerID'");
				$result = mysqli_query($con,$query);
				if($result){
				}else{
					echo '3m';
				}
			}else{
				echo '2';
			}
		}else if(isset($_POST['pluschangequantity'])){
		$newquantity = $_REQUEST['newquantity'];
			if($newquantity==$Product_Qty){
				$Product_Qty=$newquantity+1;
			}else{
			$Product_Qty=$newquantity;}
			$subtotal = $productPrice_unit * $Product_Qty;
			$query = ("UPDATE cart_details SET Product_Qty='$Product_Qty',subtotal='$subtotal' WHERE cart_id='$cart_id' AND productID='$productID'");
			$result = mysqli_query($con,$query);
			if ($result){
				$totalquery = ("SELECT SUM(subtotal) FROM `cart_details` WHERE cart_id='".$cart_id."'");
				$resulttotalquery = mysqli_query($con,$totalquery) or die(mysql_error());
				$rows = mysqli_fetch_array($resulttotalquery);
				$total = $rows['SUM(subtotal)'];
				$query = ("UPDATE cart SET total='$total' WHERE cart_id='$cart_id' AND customerID='$customerID'");
				$result = mysqli_query($con,$query);
				if($result){
			}else{
				echo '3p';
			}
		}else{
				echo '2p';
		}
	}else if(isset($_POST['delete'])){
			$query = ("DELETE FROM `cart_details` WHERE `cart_details`.`productID` = '$productID' AND `cart_details`.`cart_id` = '$cart_id'");
			$result = mysqli_query($con,$query);
			if($result){
				$totalquery = ("SELECT SUM(subtotal) FROM `cart_details` WHERE cart_id='".$cart_id."'");
				$resulttotalquery = mysqli_query($con,$totalquery) or die(mysql_error());
				$rows = mysqli_fetch_array($resulttotalquery);
				$total = $rows['SUM(subtotal)'];
				$query = ("UPDATE cart SET total='$total' WHERE cart_id='$cart_id' AND customerID='$customerID'");
				$result = mysqli_query($con,$query) or die(mysql_error());
			}else{
				echo '1d';
			}
		}else if(isset($_POST['newquantity'])){
			$newquantity = $_REQUEST['newquantity'];
			$Product_Qty=$newquantity;
			$subtotal = $productPrice_unit * $Product_Qty;
			$query = ("UPDATE cart_details SET Product_Qty='$Product_Qty',subtotal='$subtotal' WHERE cart_id='$cart_id' AND productID='$productID'");
			$result = mysqli_query($con,$query);
			if ($result){
				$totalquery = ("SELECT SUM(subtotal) FROM `cart_details` WHERE cart_id='".$cart_id."'");
				$resulttotalquery = mysqli_query($con,$totalquery) or die(mysql_error());
				$rows = mysqli_fetch_array($resulttotalquery);
				$total = $rows['SUM(subtotal)'];
				$query = ("UPDATE cart SET total='$total' WHERE cart_id='$cart_id' AND customerID='$customerID'");
				$result = mysqli_query($con,$query);
				if($result){
				}else{
				echo '3p';
				}
			}
		}
	}
?>
<body>
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
								<a href="shop.php">&lt; Continue Shopping</a>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-13">
					<?php
						$check = "SELECT cd.productID FROM cart_details cd, cart ca, customer c WHERE cd.cart_id=ca.cart_id AND ca.customerID=c.customerID AND c.email='".$_SESSION['email']."'";
						$resultcheck = mysqli_query($con,$check) or die(mysqli_error());
						$rowscheck = mysqli_num_rows($resultcheck);
						if($rowscheck<1){
							echo '<center><img src="images/blog/emptycart.png" alt="" style="width: 10%;height: 10%"><br/><h3 style="color: rgb(79,79,79);margin-bottom: 0px;">Cart is empty.</h3><br/><p style="color: rgb(79,79,79);font-size: 20px;">Looks like you have no items in your shooping cart<br/>Click <a href="shop.php" style="color: rgb(136,139,173)">here</a> to continue shooping.</p></center><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
						}else{
					?>
					<div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
      Process: Cart
    </div>
  </div>
					</div>
					<div class="col-sm-8">
						<div class="review-payment">
				<h2>My Shopping Cart</h2>
			</div>
			<div class="table-responsive cart_info">
					<table>
  <tr>
    <th>Item</th>
    <th>Description</th>
    <th>Item Price</th>
    <th width="20%">Quantity</th>
  </tr>
<?php
		$dis=0;
		$query = "SELECT p.productID, p.productQuantity, p.photoProduct_name, p.productName, p.productPrice_unit, d.cart_id, d.Product_Qty, d.subtotal FROM product p, cart_details d, cart c, customer cu WHERE p.productID=d.productID AND cu.customerID=c.customerID AND d.cart_id=c.cart_id AND c.customerID IN (SELECT customerID FROM cart WHERE customerID = (SELECT customerID FROM customer WHERE email='".$_SESSION["email"]."'))";
		$result = mysqli_query($con,$query) or die(mysql_error());
		if($result){
			while ($rows = mysqli_fetch_array($result)){
			if($rows['productQuantity']<$rows['Product_Qty']){
				$subtotal = $rows['productPrice_unit'] * $rows['productQuantity'];
				$queryupdate = ("UPDATE cart_details SET Product_Qty='".$rows['productQuantity']."',subtotal='$subtotal' WHERE cart_id='".$rows['cart_id']."' AND productID='".$rows['productID']."'");
				mysqli_query($con,$queryupdate);
				$totalquery = ("SELECT SUM(subtotal) FROM `cart_details` WHERE cart_id='".$rows['cart_id']."'");
				$resulttotalquery = mysqli_query($con,$totalquery) or die(mysql_error());
				$rowstotal = mysqli_fetch_array($resulttotalquery);
				$total = $rowstotal['SUM(subtotal)'];
				$query = ("UPDATE cart SET total='$total' WHERE cart_id='".$rows['cart_id']."' AND customerID=(SELECT customerID FROM customer WHERE email='".$_SESSION["email"]."')");
				mysqli_query($con,$query);
				$rows['Product_Qty'] = $rows['productQuantity'];
			}
				echo '<tr>
				<td><img src="uploads/'.$rows['photoProduct_name'].'" width="100px" height="100px" alt="" /></td>';
				if ($rows['productQuantity']>0){
					echo '<td><h4 style="margin-bottom: 0px">'.$rows['productName'].'</h4><p style="color: green;margin-top: 0px;">Available</p></td>';
				}else{
					echo '<td><h4 style="margin-bottom: 0px">'.$rows['productName'].'</h4><p style="color: red;margin-top: 0px;">Out of stock</p></td>';
					$dis++;
				}
				echo '<td>RM '.$rows['productPrice_unit'].'</td>
				<td>
				<div class="input-group">
          <span class="input-group-btn">
		  		<form action="" method="post" enctype="multipart/form-data">';
				if($dis>0){
					echo '<button type="submit" name="minuschangequantity" class="btn btn-danger btn-number" data-type="minus" disabled><span class="glyphicon glyphicon-minus"></span>';
				}else{
					if($rows['Product_Qty']==1){
						echo '<button type="submit" name="minuschangequantity" class="btn btn-danger btn-number" data-type="minus" disabled><span class="glyphicon glyphicon-minus"></span>';	
					}else{
						echo '<button type="submit" name="minuschangequantity" class="btn btn-danger btn-number" data-type="minus"><span class="glyphicon glyphicon-minus"></span>';}
				}
				if($rows['productQuantity'] > 4){
				echo '</button>
				<select type="text" onchange="this.form.submit()" name="newquantity" style="text-indent: 40%; width: 60px; -webkit-appearance: none; -moz-appearance: none; text-overflow: "";">';
					for($i=1;$i<6;$i++){
						if ($i==($rows['Product_Qty'])){
							echo '<option value="'.$i.'" selected>'.$i.'</option>';	
						}else{
							echo '<option value="'.$i.'">'.$i.'</option>';}}
				}else{
				echo '</button>
				<select type="text" onchange="this.form.submit()" name="newquantity" style="text-indent: 40%; width: 60px; -webkit-appearance: none; -moz-appearance: none; text-overflow: "";">';
					for($i=1;$i<=$rows['productQuantity'];$i++){
						if ($i==($rows['Product_Qty'])){
							echo '<option value="'.$i.'" selected>'.$i.'</option>';	
						}else{
							echo '<option value="'.$i.'">'.$i.'</option>';}}
				}
		echo '</select>
		<input type="hidden" name="productID" value="'.$rows['productID'].'" />
		<input type="hidden" name="productName" value="'.$rows['productName'].'" />
		<input type="hidden" name="Product_Qty" value="'.$rows['Product_Qty'].'" />
		<input type="hidden" name="productPrice_unit" value="'.$rows['productPrice_unit'].'" />
		<input type="hidden" name="subtotal" value="'.$rows['subtotal'].'" />';
		if($dis>0){
				echo '<button type="submit" name="pluschangequantity" class="btn btn-success btn-number" data-type="plus" disabled><span class="glyphicon glyphicon-plus"></span>';		
		}else{
			if($rows['Product_Qty']==5 || $rows['Product_Qty']==$rows['productQuantity']){
				echo '<button type="submit" name="pluschangequantity" class="btn btn-success btn-number" data-type="plus" disabled><span class="glyphicon glyphicon-plus"></span>';
			}else{
				echo '<button type="submit" name="pluschangequantity" class="btn btn-success btn-number" data-type="plus"><span class="glyphicon glyphicon-plus"></span>';
			}
		}
              echo '</button><button type="submit" name="delete" style="background-color: Transparent;background-repeat:no-repeat;border: none;cursor:pointer;overflow: hidden;outline:none;color: red;" class="glyphicon glyphicon-trash" title="Delete this item" data-toggle="tooltip" title="Delete this item">
        </button></form>
          </span>
      </div>
				</td>
				</tr>';
			}	
		}else{
			
		}			
?>
</table>
			</div>
					</div>
					<div class="col-sm-4">
					<br/>
					<br/>
					<br/>
					<br/>
					<div class="sub">
					<div class="panel-body" style="background:rgba(221,221,221,0.89);border-radius: 5px;">
						<div class="order-message">
							<p>Order Summary</p>
							</div>
							<hr>
					<?php 
						require_once('db.php');
						$querysubtotal=("SELECT total FROM `cart` WHERE customerID=(SELECT customerID FROM customer WHERE email='".$_SESSION['email']."')");
						$result = mysqli_query($con,$querysubtotal) or die(mysql_error());
						$rows = mysqli_fetch_array($result);
						$subtotal = $rows['total'];
						$total = $subtotal + (($subtotal/100)*6);
						echo '<p class="alignleft">Subtotal:</p>
					  	<p class="alignright">RM '.sprintf('%0.2f', $subtotal).'</p>
						<div style="clear: both;"></div>
						<p class="alignleft">GST Tax:</p>
						<p class="alignright">6%</p>
						<div style="clear: both;"></div>
						<hr>
						<p class="alignleft">Total:</p>
						<p class="alignright">RM '.sprintf('%0.2f', $total).'</p>
						<div style="clear: both;"></div>
					</div>	
						</div>';
					?>
					<br/>
					<?php
						if($dis<1){
							echo '<a href="checkout.php" class="btn btn-default add-to-cart" style="width:100%;"><i class="fa fa-shopping-cart"></i>PROCEED TO CHECKOUT</a>';
						}else{
							echo '<center><a data-toggle="tooltip" title="Sorry, some of your product is out of stock." class="btn btn-default add-to-cart" style="background-color: white; color: #696763; cursor: default;"><i class="fa fa-shopping-cart"></i>PROCEED TO CHECKOUT</a></center>';
						}
					?>			
				</div>
		</div>
			</div>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<?php } ?>
</div>
</div>
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