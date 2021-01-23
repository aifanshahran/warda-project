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
	table {
    border-collapse: separate !important;
    border-spacing: 0;
    width: 100%;
	-webkit-border-radius: 6px;
}
</style>
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
									<h4 class="panel-title"><a href="orders.php">Item ordered &amp; information</a></h4>
								</div>
					</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Report</a></h4>
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
					<h2 class="title text-center">Report</strong></h2>    			    				    				
			<table>
                     <tr>
    <th style="-webkit-border-radius: 9px 0px 0px 0px;border-right: 0px;color: azure;">Report Type</th>
    <th style="-webkit-border-radius: 0px 9px 0px 0px;color: azure;">Graph</th>
  </tr>
  <tr>
    <td style="border-top: 0px; border-right: 0px">Daily Payment Received</td>
    <td style="border-top: 0px;"><a href="paymentreportgraph2.php">Click Here</a></td>
  </tr>
  <tr>
    <td style="border-top: 0px; border-right: 0px">Brands Availability</td>
    <td style="border-top: 0px;"><a href="paymentreportgraph1.php">Click Here</a></td>
  </tr>
  <tr>
    <td style="border-top: 0px; border-right: 0px">Gender Statistics</td>
    <td style="border-top: 0px;"><a href="genderreportgraph.php">Click Here</a></td>
  </tr>
    <tr>
    <td style="-webkit-border-radius: 0px 0px 0px 9px;border-top: 0px; border-right: 0px">Frequency Product Choosen</td>
    <td style="-webkit-border-radius: 0px 0px 9px 0px;border-top: 0px;"><a href="paymentreportgraph3.php">Click Here</a></td>
  </tr>
                    </table>
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