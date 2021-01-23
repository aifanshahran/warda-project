<?php
//include auth.php file on all secure pages
include("authadmin.php");
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Account profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
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
	<?php 
	if(isset($_GET['invoiceNo'])){
		echo '
		.alignleft {
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
	}else{
		echo 'table {
            width: 100%;
        }

        thead, tbody, tr, td, th { display: block; }

        tr:after {
            content: \' \';
            display: block;
            visibility: hidden;
            clear: both;
        }

        thead th {
			width: 100%;
            height: 40px;
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
        }
		tbody td {
            float: left;
			border: 0;
			background-color: #EBEBEB;
        }';
	}
	?>
select#soflow, select#soflow-color {
   -webkit-appearance: button;
   -webkit-border-radius: 2px;
   -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
   -webkit-padding-end: 20px;
   -webkit-padding-start: 2px;
   -webkit-user-select: none;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#000000, #000000 40%, #000000);
   background-position: 97% center;
   background-repeat: no-repeat;
   border: 1px solid #AAA;
   color: #555;
   font-size: inherit;
   overflow: hidden;
   padding: 5px 10px;
   text-overflow: ellipsis;
   white-space: nowrap;
   width: 70%;
}

select#soflow-color {
   color: #000000;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FFFFFF, #FFFFFF 40%, #FFFFFF);
   background-color: #FFFFFF;
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
   padding-left: 15px;
}
</style>
	<?php
		if(isset($_POST['update'])){
				$shippingStatus = $_REQUEST['update'];
				$invoiceNo = $_REQUEST['invoiceNo'];
				$queryupdate = "UPDATE orders SET shippingStatus='".$shippingStatus."',admin_id='".$_SESSION["staffid"]."' WHERE invoiceNo=".$invoiceNo."";
				$resultupdate = mysqli_query($con, $queryupdate);
			}
	?>
<body>
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                            	<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
								<li><a href="notification.php" class="active"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
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
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="accountcustomer.php">Customer details</a></h4>
								</div>
                                </div>
                                <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#posts">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>Product</a>
									</h4>
								</div>
								<div id="posts" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="product.php"></i>Upload product</a></li>
											<li><a href="uploadproduct.php">Update products</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Item ordered &amp; information</a></h4>
								</div>
					</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="paymentreport.php">Report</a></h4>
								</div>
                                </div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="feedback.php">Feedback & queries</a></h4>
								</div>
                                </div>
						</div><!--/category-products-->
			</div></div>		
	    		<div class="col-sm-9">   			   			
					<h2 class="title text-center">Item ordered &amp; information</strong></h2>
			<?php 
				if(isset($_GET['invoiceNo'])){
				$invoiceNo = $_GET['invoiceNo'];
				echo '
				<p><a href="orders.php"><img border="0" height="40" src="images/blog/back.png" width="40" /></a></p>
				<table>
				<thead>
					<th colspan="6" height="50px" style="border-bottom: none">
					<span class="alignleft"><h4 style="margin: 0px;">Order summary for '.$_GET['invoiceNo'].'';
				$queryprintdata = "SELECT p.photoProduct_name, p.productName, p.productBrand, od.product_qty, od.subtotal, od.total, o.totalproductorder FROM product p, orders_details od, orders o WHERE p.productID=od.productID AND od.order_ID=o.order_ID AND o.invoiceNo=$invoiceNo;";
				$queryprintdata = mysqli_query($con,$queryprintdata) or die(mysql_error());
				$item = mysqli_num_rows($queryprintdata);
				echo ', '.$item.''; if($item>1){echo ' items ';}else{echo ' item ';} echo 'ordered</h4></span></th>
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
						<td valign="top" colspan="6"><b>'.ucwords(strtoupper($rowsaddress['sname'])).'</b><br/>'.$saddress.'.</td>
					</tr>';
					}else{
						echo '<tbody>
					<tr>
						<td valign="top" colspan="3" style="border-right: 0px">Shipping Address:<br/><b>'.ucwords(strtoupper($rowsaddress['sname'])).'</b><br/>'.$saddress.'.</td>
						<td valign="top" colspan="3" style="border-left: 0px">Billing Address:<br/><b>'.ucwords(strtoupper($rowsaddress['bname'])).'</b><br/>'.$baddress.'.<br/></td>
					</tr>';
					}
				$subtotal=0;
				while ($rowspd = mysqli_fetch_array($queryprintdata)){
					echo '
					<tr>
					<td style="border-right: 0px;border-top: 0px;"><img src="uploads/'.$rowspd['photoProduct_name'].'" width:"70px" height="70px" alt="" /></td>
					<td colspan="3" style="width: 500px; vertical-align: top;border-right: 0px;border-top: 0px;border-left: 0px;">'.$rowspd['productName'].'<br/>Quantity - '.$rowspd['product_qty'].'<br/>Sold and fulfilled by '.$rowspd['productBrand'].'</td>
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
		</tbody>
</table>';	
				}else{
			?>    			    				    				
			<table>
                    <thead>
                     <tr>
    <th style="width: 30%;-webkit-border-radius: 9px 0px 0px 0px;border-right: 0px;color: azure;">Email</th>
    <th style="width: 25%;border-right: 0px;color: azure;text-align: center;">Pay Status</th>
    <th style="text-align: center; width: 20%;border-right: 0px;color: azure;">Order Details</th>
    <th style="width: 25%;-webkit-border-radius: 0px 9px 0px 0px;color: azure;text-align: center;">Status</th>
  </tr>
  <thead>
  <tbody>
  		<?php 
	  		$query = "SELECT c.email, o.paystatus, o.shippingStatus, o.invoiceNo FROM customer c, orders o WHERE o.customerID=c.customerID";
	  		$result = mysqli_query($con,$query) or die(mysqli_error());
			$rowscount1 = mysqli_num_rows($result);
			$querydeliver = "SELECT c.email, o.paystatus, o.shippingStatus, o.invoiceNo FROM customer c, orders o WHERE o.customerID=c.customerID AND o.shippingStatus='Delivered'";
	  		$resultdeliver = mysqli_query($con,$querydeliver) or die(mysqli_error());
			$rowscount = mysqli_num_rows($resultdeliver);
			if($rowscount1==0){
				echo '
				<tr>
						<td height="55" style="width:100%;text-align: center;"><h4>No data.</h4></td>
				</tr>';
			}else{		
			if($rowscount==$rowscount1){
				echo '
				<tr>
						<td height="55" style="width:100%;text-align: center;"><h4>All item has been delivered.</h4></td>
				</tr>';
			}else{
	  		while($rows = mysqli_fetch_array($result)){
					if($rows['shippingStatus']=='Delivered'){
					}else{
						echo '
						<tr>
						<td height="55" style="width:30%;text-align: left;">'.$rows['email'].'</td>
						<td height="55" style="width:25%;text-align: center;">'.$rows['paystatus'].'</td>
						<td height="55" style="width:20%;text-align: center;"><a href="orders.php?invoiceNo='.$rows['invoiceNo'].'">Click here</a></td>
						<td height="55" style="width:25%;text-align: center;">
						<form action="" method="post" enctype="multipart/form-data">
						<input type="hidden" name="invoiceNo" value="'.$rows['invoiceNo'].'">
						<center><select id="soflow-color" name="update" onchange="this.form.submit()">
						<option value="'.$rows['shippingStatus'].'" selected>'.$rows['shippingStatus'].'</option>';
						if($rows['shippingStatus']=='In Process'){
							echo '
								<option value="Packaging">Packaging</option>
								<option value="Shipping">Shipping</option>
								<option value="Delivered">Delivered</option>
							';
						}else if($rows['shippingStatus']=='Packaging'){
							echo '
								<option value="Shipping">Shipping</option>
								<option value="Delivered">Delivered</option>
							';
						}else{
							echo '
								<option value="Delivered">Delivered</option>
							';
						}
						echo '</select></center></form></td></tr>';
					}
			}
			}
			}
			
	  ?>
				</tbody>
                    </table>
                    <?php } ?>
</div>
</div>
</div>
<br/>
<br/>
	</section>

	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>