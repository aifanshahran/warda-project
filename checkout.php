<?php
include("auth.php");
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
        table {
            width: 100%;
        }

        thead, tbody, tr, td, th { display: block; }

        tr:after {
            content: ' ';
            display: block;
            visibility: hidden;
            clear: both;
        }

        thead th {
            height: 40px;
			text-align: center;
			background-color: rgba(150,73,74,0.81);

            /*text-align: left;*/
        }

        tbody {
            height: 120px;
            overflow-y: auto;
        }

        thead {
            /* fallback */
        }


        thead th {
            float: left;
			border: 0;
        }
		tbody td {
            float: left;
			border: 0;
			background-color: #EBEBEB;
        }
	textarea[disabled] {
   color: black;
}
	.form-two > input{
  background: #F0F0E9;
  border: 0 none;
  display: block;
  font-family: 'Roboto', sans-serif;
  font-size: 14px;
  font-weight: 300;
  height: 40px;
  margin-bottom: 10px;
  outline: medium none;
  padding: 10px;
  width: 100%;
}
	.form-one > form > select,
	.form-two > select {
  padding:10px 5px;
  background:#F0F0E9;
  border: 0 none;
  margin-bottom:10px;
  width: 100%;
  font-weight: 300
}
	
</style>
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
								<a href="cart.php">&lt; Back to cart</a>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<section id="cart_items">
		<div class="container">
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-13">
					<div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width:65%">
      Process: Shipping/Billing Information
    </div>
  </div>
					</div>
					
					<div class="col-sm-8">
						<?php 
						require_once("db.php");
						require_once("display.php");
						$queryadd = "SELECT address FROM `customer` WHERE email='".$email."'";
						$resultadd = mysqli_query($con,$queryadd) or die(mysqli_error());
						$rowsadd = mysqli_fetch_array($resultadd);
							if($rowsadd['address'] == NULL){
								//THIS SECTION IS FOR differentshippingdifferentbilling
								echo '
								<span class="form-one">
								<input type="checkbox" id="checkbox" checked style="display:none;"></span>
								<span class="form-two">
								</span>
								<div id="updateshipping">
								<div class="form-one">
								<b><p class="alignleft">Shipping Address</p></b>
								<form name="shippingname" action="paymentmethod.php" method="post" enctype="multipart/form-data">
									<p class="alignright"><input type="checkbox" value="1" name="saveshippingadd"> Save shipping address</p>
									<input type="text" name="name" placeholder="Name *" required="required">
									<input type="text" name="address1" placeholder="Address 1 *" required="required">
									<input type="text" name="address2" placeholder="Address 2">
									<input type="number" name="zip" placeholder="Zip / Postal Code *" required="required">
									<select name="region">
										<option value="choose">-- State / Province / Region --</option>
										<option value="Perlis">Perlis</option>
										<option value="Kedah">Kedah</option>
										<option value="Penang">Penang</option>
										<option value="Perak">Perak</option>
										<option value="Pahang">Pahang</option>
										<option value="Kelantan">Kelantan</option>
										<option value="Terengganu">Terengganu</option>
										<option value="Selangor">Selangor</option>
										<option value="Kuala Lumpur">Kuala Lumpur</option>
										<option value="Negeri Sembilan">Negeri Sembilan</option>
										<option value="Melaka">Melaka</option>
										<option value="Johor">Johor</option>
										<option value="Sabah">Sabah</option>
										<option value="Sarawak">Serawak</option>
										<option value="Labuan">Labuan</option>
										<option value="Putrajaya">Putrajaya</option>
									</select>
									<input type="text" name="country" value="Malaysia" readonly>
									<input type="number" name="phone" placeholder="Home Phone">
									<input type="number" name="mphone" placeholder="Mobile Phone *" required="required">
							<p style="color: red">* Required Fields</p></div>
							
							
							<div class="form-two">
									<b><p class="alignleft">Billing Address</p></b>
									<p class="alignright"><input type="checkbox" onclick="FillFields(this)"> Same as Shipping Address</p>
									<input type="text" name="bname" placeholder="Name *" required="required">
									<input type="text" name="baddress1" placeholder="Address 1 *" required="required">
									<input type="text" name="baddress2" placeholder="Address 2">
									<input type="number" name="bzip" placeholder="Zip / Postal Code *" required="required">
									<select name="bregion">
										<option value="choose">-- State / Province / Region --</option>
										<option value="Perlis">Perlis</option>
										<option value="Kedah">Kedah</option>
										<option value="Penang">Penang</option>
										<option value="Perak">Perak</option>
										<option value="Pahang">Pahang</option>
										<option value="Kelantan">Kelantan</option>
										<option value="Terengganu">Terengganu</option>
										<option value="Selangor">Selangor</option>
										<option value="Kuala Lumpur">Kuala Lumpur</option>
										<option value="Negeri Sembilan">Negeri Sembilan</option>
										<option value="Melaka">Melaka</option>
										<option value="Johor">Johor</option>
										<option value="Sabah">Sabah</option>
										<option value="Sarawak">Serawak</option>
										<option value="Labuan">Labuan</option>
										<option value="Putrajaya">Putrajaya</option>
									</select>
									<input type="text" name="bcountry" value="Malaysia" placeholder="Country *" readonly>
									<input type="number" name="bphone" placeholder="Home Phone">
									<input type="number" name="bmphone" placeholder="Mobile Phone *" required="required">
									<p style="color: red">* Required Fields</p>
									<button type="submit" name="differentshippingdifferentbilling" style="width:40%;float: right;" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>CONTINUE</button>
								</form> 
						</div></div>';
							}else{
								echo '
									<span class="form-one">
									<b><p class="alignleft">Shipping Address</p></b>
									<p class="alignright"><input type="checkbox" id="checkbox"> Different address</p></span>
									<span class="form-two">
									<b><p class="alignleft">Billing Address</p></b>
									<p class="alignright"><input type="checkbox" onclick="FillFields(this)"> Same as Shipping Address</p></span>
									<div style="clear: both;"></div>
									<div id="sameshipping">
									<div class="form-one">
									<form name="shippingnameoriginal" enctype="multipart/form-data">
									<input type="text" name="name" value="'.$name.'" placeholder="Name *" disabled>
									<textarea name="message" rows="4" disabled>'.$rows['address'].'</textarea>
									<p style="line-height: 200%;"></p>
									<p style="line-height: 200%;"></p>
									<input type="text" name="phone" placeholder="Home Phone">
									<input type="text" name="mphone" placeholder="Mobile Phone *" required="required">
									<p style="color: red">* Required Fields</p>
									</form></div>
									
									<div class="form-two">
									
									<form action="paymentmethod.php" method="post" style="display: none" name="billingaddressoriginalcopy" enctype="multipart/form-data">
									<input type="hidden" name="name" value="'.$name.'" placeholder="Name *">
									<textarea name="address" style="display:none;" rows="4">'.$rows['address'].'</textarea>
									<input type="hidden" name="phone" placeholder="Home Phone">
									<input type="hidden" name="mphone" placeholder="Mobile Phone *">
									<input type="text" name="bname" value="'.$name.'" placeholder="Name *" readonly>
									<textarea name="baddress" rows="4" readonly>'.$rows['address'].'</textarea>
									<p style="line-height: 200%;"></p>
									<p style="line-height: 200%;"></p>
									<input type="number" name="bphone" placeholder="Home Phone">
									<input type="number" name="bmphone" placeholder="Mobile Phone *" required="required">
									<p style="color: red">* Required Fields</p>
									<button type="submit" name="sameshippingsamebilling" style="width:40%;float: right;" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>CONTINUE</button>			
									</form>
									
									<form name="billingaddressoriginal" action="paymentmethod.php" method="post" enctype="multipart/form-data">
									<input type="hidden" name="name" value="'.$name.'" placeholder="Name *" >
									<textarea name="address" style="display:none;" rows="4">'.$address.'</textarea>
									<input type="hidden" name="phone" placeholder="Home Phone *">
									<input type="hidden" name="mphone" placeholder="Mobile Phone">
									<input type="text" name="bname" placeholder="Name *" required="required">
									<input type="text" name="baddress1" placeholder="Address 1 *" required="required">
									<input type="text" name="baddress2" placeholder="Address 2">
									<input type="number" name="bzip" placeholder="Zip / Postal Code *" required="required">
									<select name="bregion">
										<option value="choose">-- State / Province / Region --</option>
										<option value="Perlis">Perlis</option>
										<option value="Kedah">Kedah</option>
										<option value="Penang">Penang</option>
										<option value="Perak">Perak</option>
										<option value="Pahang">Pahang</option>
										<option value="Kelantan">Kelantan</option>
										<option value="Terengganu">Terengganu</option>
										<option value="Selangor">Selangor</option>
										<option value="Kuala Lumpur">Kuala Lumpur</option>
										<option value="Negeri Sembilan">Negeri Sembilan</option>
										<option value="Melaka">Melaka</option>
										<option value="Johor">Johor</option>
										<option value="Sabah">Sabah</option>
										<option value="Sarawak">Serawak</option>
										<option value="Labuan">Labuan</option>
										<option value="Putrajaya">Putrajaya</option>
									</select>
									<input type="text" name="bcountry" value="Malaysia" placeholder="Country *" readonly>
									<input type="number" name="bphone" placeholder="Home Phone">
									<input type="number" name="bmphone" placeholder="Mobile Phone *" required="required">
									<p style="color: red">* Required Fields</p>
									<button type="submit" name="sameshippingdifferentbilling" style="width:40%;float: right;" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>CONTINUE</button>	
								</form></div></div>';
								//THIS SECTION IS FOR differentshippingdifferentbilling
								echo '<div id="updateshipping" style="display:none;">
								<div class="form-one">
								<form name="shippingname" action="paymentmethod.php" method="post">
									<input type="text" name="name" placeholder="Name *" required="required">
									<input type="text" name="address1" placeholder="Address 1 *" required="required">
									<input type="text" name="address2" placeholder="Address 2">
									<input type="number" name="zip" placeholder="Zip / Postal Code *" required="required">
									<select name="region">
										<option value="choose">-- State / Province / Region --</option>
										<option value="Perlis">Perlis</option>
										<option value="Kedah">Kedah</option>
										<option value="Penang">Penang</option>
										<option value="Perak">Perak</option>
										<option value="Pahang">Pahang</option>
										<option value="Kelantan">Kelantan</option>
										<option value="Terengganu">Terengganu</option>
										<option value="Selangor">Selangor</option>
										<option value="Kuala Lumpur">Kuala Lumpur</option>
										<option value="Negeri Sembilan">Negeri Sembilan</option>
										<option value="Melaka">Melaka</option>
										<option value="Johor">Johor</option>
										<option value="Sabah">Sabah</option>
										<option value="Sarawak">Serawak</option>
										<option value="Labuan">Labuan</option>
										<option value="Putrajaya">Putrajaya</option>
									</select>
									<input type="text" name="country" value="Malaysia" readonly>
									<input type="number" name="phone" placeholder="Home Phone">
									<input type="number" name="mphone" placeholder="Mobile Phone *" required="required">
							<p style="color: red">* Required Fields</p></div>
							
							
							<div class="form-two">
									<input type="text" name="bname" placeholder="Name *" required="required">
									<input type="text" name="baddress1" placeholder="Address 1 *" required="required">
									<input type="text" name="baddress2" placeholder="Address 2">
									<input type="number" name="bzip" placeholder="Zip / Postal Code *" required="required">
									<select name="bregion">
										<option value="choose">-- State / Province / Region --</option>
										<option value="Perlis">Perlis</option>
										<option value="Kedah">Kedah</option>
										<option value="Penang">Penang</option>
										<option value="Perak">Perak</option>
										<option value="Pahang">Pahang</option>
										<option value="Kelantan">Kelantan</option>
										<option value="Terengganu">Terengganu</option>
										<option value="Selangor">Selangor</option>
										<option value="Kuala Lumpur">Kuala Lumpur</option>
										<option value="Negeri Sembilan">Negeri Sembilan</option>
										<option value="Melaka">Melaka</option>
										<option value="Johor">Johor</option>
										<option value="Sabah">Sabah</option>
										<option value="Sarawak">Serawak</option>
										<option value="Labuan">Labuan</option>
										<option value="Putrajaya">Putrajaya</option>
									</select>
									<input type="text" name="bcountry" value="Malaysia" placeholder="Country *" readonly>
									<input type="text" name="bphone" placeholder="Home Phone">
									<input type="text" name="bmphone" placeholder="Mobile Phone *" required="required">
									<p style="color: red">* Required Fields</p>
									<button type="submit" name="differentshippingdifferentbilling" style="width:40%;float: right;" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>CONTINUE</button>
								</form> 
						</div></div>';
							}
							?>
					</div>
		<div class="col-sm-4">
					<div class="sub">
					<div class="panel-body" style="background:rgba(221,221,221,0.89);border-radius: 5px;">
						<div class="order-message">
							<p>Order Summary</p>
						</div>
							<hr>
							<table class="table table-striped">
    <thead>
    <tr>
        <th style="width:49%">Product Name</th>
		<th style="width:18.5%">Quantity</th>
		<th style="width:32.5%">Price</th>
    </tr>
    </thead>
    <tbody>
    <?php 
		require_once('db.php');
		$query = "SELECT p.productID, p.photoProduct_name, p.productName, p.productPrice_unit, d.Product_Qty, d.subtotal FROM product p, cart_details d, cart c, customer cu WHERE p.productID=d.productID AND cu.customerID=c.customerID AND d.cart_id=c.cart_id AND c.customerID IN (SELECT customerID FROM cart WHERE customerID = (SELECT customerID FROM customer WHERE email='".$_SESSION["email"]."'))";
		$result = mysqli_query($con,$query) or die(mysql_error());
		if($result){
			while ($rows = mysqli_fetch_array($result)){
				echo '<tr>
        <td height="55" style="width:49%">'.$rows['productName'].'</td>
        <td height="55" style="width:18.5%;text-align: center;">'.$rows['Product_Qty'].'</td>
        <td height="55" style="width:32.5%;text-align: center;">RM '.$rows['subtotal'].'</td>
    </tr>';
			}
		}
			?>
    </tbody>
    
</table>
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
				</div>
		</div>
		<br/>
			</div>
			</div>
				</br>
			</br>
<footer id="footer"><!--Footer-->	
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2016 WardaHardina Parlour. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.aifanshahran.com">Aifan Shahran/Imran Daud/Nabil Fahruddin</a></span></p>
				</div>
			</div>
		</div>
			
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

<?php
	if($rowsadd['address'] == NULL){
		echo "
		<script>
		<!--
		function FillFields(box) {
		if(box.checked == false) { 
		document.shippingname.bname.value  = '';
		document.shippingname.baddress1.value = '';
		document.shippingname.baddress2.value  = '';
		document.shippingname.bzip.value  = '';
		document.shippingname.bregion.value  = 'choose';
		document.shippingname.bcountry.value  = 'Malaysia';
		document.shippingname.bphone.value  = '';
		document.shippingname.bmphone.value  = '';
		document.billingaddressoriginal.bname.value  = '';
		document.billingaddressoriginal.baddress1.value = '';
		document.billingaddressoriginal.baddress2.value  = '';
		document.billingaddressoriginal.bzip.value  = '';
		document.billingaddressoriginal.bregion.value  = 'choose';
		document.billingaddressoriginal.bcountry.value  = 'Malaysia';
		document.billingaddressoriginal.bphone.value  = '';
		document.billingaddressoriginal.bmphone.value  = '';
			return;
		}
		document.shippingname.bname.value  = document.shippingname.name.value;
		document.shippingname.baddress1.value = document.shippingname.address1.value;
		document.shippingname.baddress2.value  = document.shippingname.address2.value;
		document.shippingname.bzip.value  = document.shippingname.zip.value;
		document.shippingname.bregion.value  = document.shippingname.region.value;
		document.shippingname.bcountry.value  = document.shippingname.country.value;
		document.shippingname.bphone.value  = document.shippingname.phone.value;
		document.shippingname.bmphone.value  = document.shippingname.mphone.value;
		document.billingaddressoriginalcopy.bphone.value  = document.shippingnameoriginal.phone.value;
		document.billingaddressoriginalcopy.bmphone.value  = document.shippingnameoriginal.mphone.value;
		document.billingaddressoriginalcopy.phone.value  = document.shippingnameoriginal.phone.value;
		document.billingaddressoriginalcopy.mphone.value  = document.shippingnameoriginal.mphone.value;

		}
		//-->
		</script>
		<script>
		var checkbox = document.getElementById('checkbox');
		var updateshipping_div = document.getElementById('updateshipping');
		var sameshipping_div = document.getElementById('sameshipping');
		var showHiddenDiv = function(){
		   if(checkbox.checked) {
			 updateshipping_div.style['display'] = 'block';
			 sameshipping_div.style['display'] = 'none';
		   } else {
			 updateshipping_div.style['display'] = 'none';
			 sameshipping_div.style['display'] = 'block';
		   } 
		}
		checkbox.onclick = showHiddenDiv;
		showHiddenDiv();
		</script>";
	}else{
		echo "
		<script>
		<!--
		function FillFields(box) {
		if(box.checked == false) { 
		document.billingaddressoriginal.style['display'] = 'block';
		document.billingaddressoriginalcopy.style['display'] = 'none';
		document.shippingname.bname.value  = '';
		document.shippingname.baddress1.value = '';
		document.shippingname.baddress2.value  = '';
		document.shippingname.bzip.value  = '';
		document.shippingname.bregion.value  = 'choose';
		document.shippingname.bcountry.value  = 'Malaysia';
		document.shippingname.bphone.value  = '';
		document.shippingname.bmphone.value  = '';
		document.billingaddressoriginal.bname.value  = '';
		document.billingaddressoriginal.baddress1.value = '';
		document.billingaddressoriginal.baddress2.value  = '';
		document.billingaddressoriginal.bzip.value  = '';
		document.billingaddressoriginal.bregion.value  = 'choose';
		document.billingaddressoriginal.bcountry.value  = 'Malaysia';
		document.billingaddressoriginal.bphone.value  = '';
		document.billingaddressoriginal.bmphone.value  = '';
			return;
		}
		document.billingaddressoriginal.style['display'] = 'none';
		document.billingaddressoriginalcopy.style['display'] = 'block';
		document.shippingname.bname.value  = document.shippingname.name.value;
		document.shippingname.baddress1.value = document.shippingname.address1.value;
		document.shippingname.baddress2.value  = document.shippingname.address2.value;
		document.shippingname.bzip.value  = document.shippingname.zip.value;
		document.shippingname.bregion.value  = document.shippingname.region.value;
		document.shippingname.bcountry.value  = document.shippingname.country.value;
		document.shippingname.bphone.value  = document.shippingname.phone.value;
		document.shippingname.bmphone.value  = document.shippingname.mphone.value;
		document.billingaddressoriginalcopy.bphone.value  = document.shippingnameoriginal.phone.value;
		document.billingaddressoriginalcopy.bmphone.value  = document.shippingnameoriginal.mphone.value;
		document.billingaddressoriginalcopy.phone.value  = document.shippingnameoriginal.phone.value;
		document.billingaddressoriginalcopy.mphone.value  = document.shippingnameoriginal.mphone.value;

		}
		//-->
		</script>
		<script>
		var checkbox = document.getElementById('checkbox');
		var updateshipping_div = document.getElementById('updateshipping');
		var sameshipping_div = document.getElementById('sameshipping');
		var showHiddenDiv = function(){
		   if(checkbox.checked) {
			 updateshipping_div.style['display'] = 'block';
			 sameshipping_div.style['display'] = 'none';
		   } else {
			 updateshipping_div.style['display'] = 'none';
			 sameshipping_div.style['display'] = 'block';
		   } 
		}
		checkbox.onclick = showHiddenDiv;
		showHiddenDiv();
		</script>";
	}
?>
<script>
var checkbox = document.getElementById('checkbox');
var updateshipping_div = document.getElementById('updateshipping');
var sameshipping_div = document.getElementById('sameshipping');
var showHiddenDiv = function(){
   if(checkbox.checked) {
     updateshipping_div.style['display'] = 'block';
	 sameshipping_div.style['display'] = 'none';
   } else {
     updateshipping_div.style['display'] = 'none';
	 sameshipping_div.style['display'] = 'block';
   } 
}
checkbox.onclick = showHiddenDiv;
showHiddenDiv();
</script>
    
</body>
</html>