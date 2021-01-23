<?php
//include auth.php file on all secure pages
include("../auth.php");
include("../db.php");
require("../display.php");
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
</head><!--/head-->
<style>
		<?php if(!isset($_GET['invoice'])){
		echo 'table {
            width: 93%;
        }

        thead, tbody, tr, td, th { display: block; }

        tr:after {
            content: \' \';
            display: block;
            visibility: hidden;
            clear: both;
        }

        thead th {
			width: 93%;
            height: 40px;
			text-align: center;
			color: azure;
			background-color: #FF3333;

            /*text-align: left;*/
        }

        tbody {
            height: 420px;
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
        }';
		}else{
			echo '.alignleft {
			float: left;
		}
		.alignright {
			float: right;
		}
		table {
			font-family: \'Roboto\', sans-serif;
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
		}';
		}
			?>
</style>
<body>
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
			<span class="no-print">
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
									<h4 class="panel-title"><a href="#">
											Shopping Items and Invoice
										</a>
									</h4>
									</div>
								</div>
						</div>
                              <div class="panel-group category" id="accordian"><!--category-productsr-->
                               <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="upload.php">
											Profile Settings
										</a>
									</h4>
									</div>
								</div>
						</div>
                                </div>
                                </center>
							</div>
							</span>
				<div class="col-sm-9">
					<div class="blog-post-area">
					<br/>
					<br/>
					<br/>
					<span class="no-print">
						<h2 class="title text-center">Shopping items and invoice</h2></span>
                      <?php
						if(isset($_GET['invoice'])){
							$invoiceNo = $_GET['invoice'];
							echo '
							<span class="no-print">
							<p><a href="shoppingitems.php"><img border="0" height="40" src="../images/blog/back.png" width="40" /></a></p></span>
							<table>
							<thead>
								<th colspan="6" height="50px" style="border-bottom: none">
								<span class="alignleft"><h4 style="margin: 0px;">Order summary for '.$invoiceNo.'';
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
								<td style="border-right: 0px;border-top: 0px;"><img src="../uploads/'.$rowspd['photoProduct_name'].'" width:"70px" height="70px" alt="" /></td>
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
					</tr></tbody>
			</table>
					';
						}else{
						?>
                       <center>
                        <table>
						   <thead>
    <tr>
        <th style="width:21%;-webkit-border-radius: 9px 0px 0px 0px;text-align: left;">Date</th>
		<th style="width:22%">Invoice</th>
 		<th style="width:22%">Total</th>
  		<th style="width:18%;-webkit-border-radius: 0px 9px 0px 0px;text-align: left;">Status</th>
    </tr>
    </thead>
    <tbody>
       <?php 
		$query = "SELECT o.order_date, o.invoiceNo, o.totalproductorder, o.shippingStatus FROM orders o, customer c WHERE o.customerID=c.customerID AND c.email='".$_SESSION['email']."'";
		$result = mysqli_query($con, $query) or die(mysqli_error());
		$rowsno = mysqli_num_rows($result);
		if($rowsno > 0){
			while ($rows = mysqli_fetch_array($result)){
				$date = strtotime($rows['order_date']);
				$date = date( 'jS F Y', $date);
				echo '<tr>
					<td height="40" style="width:21%">'.$date.'</td>
					<td height="40" style="width:22%;text-align: center;"><a data-toggle="tooltip" title="View details" href="shoppingitems.php?invoice='.$rows['invoiceNo'].'">'.$rows['invoiceNo'].'</a></td>
					<td height="40" style="width:22%;text-align: center;">RM '.sprintf('%0.2f',$rows['totalproductorder']).'</td>
					<td height="40" style="width:18%">'.$rows['shippingStatus'].'</td>
					</tr>';}
			}else{
			echo '<tr>
        		<td height="70" style="width:83%;text-align: center">No items at this time.</td>
   				 </tr>';}
		?>
    </tbody>
</table>
</center>
<?php } ?>
</div>
					</div><!--/blog-post-area-->
			</div>
	</section>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <span class="no-print">
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
			</span>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
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