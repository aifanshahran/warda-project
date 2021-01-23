<?php
require("auth.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Order received</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
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
.alignleft {
	float: left;
}
.alignright {
	float: right;
}
table {
    font-family: 'Roboto', sans-serif;
    border-collapse: separate !important;
    border-spacing: 0;
    width: 100%;
	-webkit-border-radius: 6px;
}

th {
    border: 1px solid #rgba(234,230,230,1.00);
    text-align: left;
	color: #000000;
    padding: 8px;
	background-color: #FBFBFB;
	-webkit-border-radius: 6px 6px 0px 0px;
	
}

td {
	border: 1px solid #rgba(234,230,230,1.00);
    text-align: left;
    padding: 8px;
	background-color: #FBFBFB;
}
tr:nth-child {
    background-color: #FBFBFB;
	-webkit-border-radius: 5px;
}
</style>
<?php
	$posted = false;
	require_once('db.php');
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
								<header id="header" class="no-print"><!--header-->
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
								<li><a href="accountadmin.html"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
							</ul>
						</div>
					</div> ';}} //End if for admin and user
					else{
							echo '
							<header id="header" class="no-print"><!--header-->
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
				            	<li><a href="aboutus.php">About us</a></li>
							</ul>
					</div>
				</div>
			</div>
		</div>
</div>
			<?php if(isset($_SESSION["staffid"])){ echo '</div>'; } ?><!--/header-bottom-->
	</header><!--/header-->
		<section>
		<div class="container">
				<img border="0" src="images/blog/checkmarkonce.gif" style="vertical-align: middle; height: 40px; width: 40px;" />&nbsp;&nbsp;<span style="color: #274e13; font-size: large; vertical-align: middle;">Congratulations!</span>
<br />
<p style="line-height: 200%;"></p>
For Cash on Delivery<br />
1.  Please prepare exact amount of cash ready to be handed over to the courier upon delivery.<br />
2.  In case someone will receive your order for you, please provide them with
<ul style="padding-left: 14px;">
&ndash; Photocopy of your ID (e.g., NRIC, Passport, Driver's License, etc.)<br/>
&ndash; Authorization Letter <br/>
&ndash; Printout of your Order Confirmation email / this page.<br/>
</ul>
<table>
		<?php
			require("db.php");
			if(isset($_GET['invoiceNo'])){
				$invoiceNo = $_GET['invoiceNo'];
				echo '
				<thead>
					<th colspan="6" height="50px" style="border-bottom: none">
					<span class="alignleft"><h4 style="margin: 0px;">Order summary for '.$_GET['invoiceNo'].'';
				$queryprintdata = "SELECT p.photoProduct_name, p.productName, p.productBrand, od.product_qty, od.subtotal, od.total, o.totalproductorder FROM product p, orders_details od, orders o WHERE p.productID=od.productID AND od.order_ID=o.order_ID AND o.invoiceNo=$invoiceNo;";
				$queryprintdata = mysqli_query($con,$queryprintdata) or die(mysql_error());
				$item = mysqli_num_rows($queryprintdata);
				echo ', '.$item.''; if($item>1){echo ' items ';}else{echo ' item ';} echo 'ordered</h4></span>
					<a href="javascript:window.print()" style="color: black;"><span class="alignright" style="border-left:1px solid #000;margin: 0px; height:25px;"><span class="glyphicon glyphicon-print" style="margin: 0px;margin-left: 10px;"></span><span style="margin: 0px;margin-left: 15px;">Print</span></span></a></th>
				</thead>';
				$queryaddress = "SELECT sname, bname, shippingAddress, billingAddress FROM `orders` WHERE invoiceNo=$invoiceNo";
				$queryaddress = mysqli_query($con, $queryaddress) or die(mysql_error());
				$rowsaddress = mysqli_fetch_array($queryaddress);
				$saddress = str_replace(", ",", <br  />", $rowsaddress['shippingAddress']);
				$saddress = str_replace(",",", ", $saddress);
				$saddress = ucwords(strtoupper($saddress));
				$baddress = str_replace(", ",", <br  />", $rowsaddress['billingAddress']);
				$baddress = str_replace(",",", ", $baddress);
				$baddress = ucwords(strtoupper($baddress));
					if(($rowsaddress['shippingAddress']) == ($rowsaddress['billingAddress'])){
						echo '<tbody>
					<tr>
						<td valign="top" colspan="6"><b>'.ucwords(strtoupper($rowsaddress['sname'])).'</b><br/>'.$saddress.'.<br/>Email confirmation sent to '.$_SESSION['email'].'</td>
					</tr>';
					}else{
						echo '<tbody>
					<tr>
						<td valign="top" colspan="3" style="border-right: 0px">Shipping Address:<br/><b>'.ucwords(strtoupper($rowsaddress['sname'])).'</b><br/>'.$saddress.'.<br/>Email confirmation sent to '.$_SESSION['email'].'</td>
						<td valign="top" colspan="3" style="border-left: 0px">Billing Address:<br/><b>'.ucwords(strtoupper($rowsaddress['bname'])).'</b><br/>'.$baddress.'.<br/></td>
					</tr>';
					}
				$subtotal=0;
				while ($rowspd = mysqli_fetch_array($queryprintdata)){
					echo '
					<tr>
					<td style="border-right: 0px;border-top: 0px;"><img src="uploads/'.$rowspd['photoProduct_name'].'" width:"70px" height="70px" alt="" /></td>
					<td colspan="2" style="width: 500px; vertical-align: top;border-right: 0px;border-top: 0px;border-left: 0px;">'.$rowspd['productName'].'<br/>Quantity - '.$rowspd['product_qty'].'<br/>Sold and fulfilled by '.$rowspd['productBrand'].'</td>
					<td style="vertical-align: top;border-left: 0px;border-top: 0px;border-right: 0px;">Delivered by 3-5 days according to the date of order made.</td>
					<td style="border-left: 0px;border-right: 0px;border-top: 0px;"></td>
					<td style="text-align: right;vertical-align: top;border-left: 0px;border-top: 0px;">RM '.sprintf('%0.2f',$rowspd['subtotal']).'</td>
					</tr>';
					$subtotal = ($rowspd['subtotal']*$rowspd['product_qty']) + $subtotal;
				}
				$total = "SELECT totalproductorder FROM `orders` WHERE invoiceNo=$invoiceNo";
				$resulttotal = mysqli_query($con,$total) or die(mysql_error());
				$rowstotal = mysqli_fetch_array($resulttotal);
				echo '
			<tr>
			<td colspan="4" style="border-bottom: 0px;border-right: 0px;border-top: 0px;"></td>
			<td style="width: 155px; text-align: right;border-left: 0px;border-top: 0px;border-right: 0px;">Subtotal: <br/><span style="color: green">Shipping fee:</span></td>
			<td style="width: 118px;text-align: right;border-top: 0px;border-left: 0px;">RM '.sprintf('%0.2f',$subtotal).'<br/><span style="color: green">';if($subtotal>99){echo 'Free Shipping';}else{echo 'RM 10.60';} echo'</span></td>
			</tr>
		<tr>
			<td colspan="5" style="text-align: right;-webkit-border-radius: 0px 0px 0px 6px;border-right: 0px;border-top: 0px;margin-bottom: 0px;">Total(Tax Included):<br/>Paid by Cash on Delivery</td>
			<td valign="top" style="text-align: right;-webkit-border-radius: 0px 0px 6px 0px;border-left: 0px;border-top: 0px;">RM '.sprintf('%0.2f',$rowstotal['totalproductorder']).'<br/></td>
		</tr>
		';
			}
			?>
	</tbody>
</table>
<p style="text-align: right">*Note: You can track your order from the Tracking Shipping page.</p>
<br/>
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
    <script src="js/main.js"></script>
    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

</script>
<style type="text/css" media="print">
   .no-print { display: none; }
</style>
</body>
</html>