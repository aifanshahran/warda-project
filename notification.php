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
<style>
/*Setup all boxes*/
.info,.success,.error,.warning,.tip,.secure,.message,.download,.purchase,.print{margin:20px 50px; padding:10px;-webkit-border-radius: 3px;-moz-border-radius: 3px;border-radius: 3px;-moz-box-shadow: 4px 4px #dfe1d8;-webkit-box-shadow: 4px 4px #dfe1d8;box-shadow: 4px 4px #dfe1d8;}

/*Boxes*/
.info{border:1px solid #0e7fad;color:#0e7fad;background:#c0e9fa url('images/Noti/info.png') no-repeat; background-position:30px 20px;}
.success{border:1px solid #4f8746;color:#4f8746;background:#d4ffcd url('images/Noti/success.png') no-repeat; background-position:30px 20px;}
.error{border:1px solid #641f1a;color:#641f1a;background:#ffd2d4 url('images/Noti/error.png') no-repeat; background-position:30px 20px;}
.warning{border:1px solid #9d9c49;color:#9d9c49;background:#fdfdcb url('images/Noti/warning.png') no-repeat; background-position:30px 20px;}
.tip{border:1px solid #c77d10;color:#c77d10;background:#f9d69e url('images/Noti/tip.png') no-repeat; background-position:30px 20px;}
.secure{border:1px solid #9638f1;color:#9638f1;background:#e5cefc url('images/Noti/secure.png') no-repeat; background-position:30px 20px;}
.message{border:1px solid #000;color:#000;background:#efefef url('images/Noti/message.png') no-repeat; background-position:30px 20px;}
.download{border:1px solid #04b5eb;color:#04b5eb;background:#f7f7f7 url('images/Noti/download.png') no-repeat; background-position:30px 20px;}
.purchase{border:1px solid #426164;color:#426164;background:#c2e1e3 url('images/Noti/purchase.png') no-repeat; background-position:30px 20px;}
.print{border:1px solid #3c4b5e;color:#3c4b5e;background:#c8d9e3 url('images/Noti/print.png') no-repeat; background-position:30px 20px;}
</style>
<body>
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                            	<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
								<li><a href="#" class="active"><i class="fa fa-user"></i> Account</a></li>
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
											<li><a href="uploadproduct.php"></i>Upload product</a></li>
											<li><a href="product.php">Update products</a></li>
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
									<h4 class="panel-title"><a href="paymentreport.php">Report</a></h4>
								</div>
                                </div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Feedback &amp; queries</a></h4>
								</div>
                                </div>
						</div><!--/category-products-->
			</div></div>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Notification</h2>
						<?php
							$query="SELECT * FROM `feedback`";
							$result = mysqli_query($con, $query);
							$rowsfeedback = mysqli_num_rows($result);
							$queryproduct = "SELECT * FROM `product` WHERE productQuantity=0";
							$resultproduct = mysqli_query($con, $queryproduct);
							$rowsproduct = mysqli_num_rows($resultproduct);
						?>
<div class="success">
	<h4 style="margin:6px 4px 5px 80px;padding:0; font-size:16px;">Success</h4>
	<p style="font-size:10px; color:#000; margin:5px 5px 5px 80px;">You are successfully login.</p>
</div>

<div class="info">
	<h4 style="margin:6px 4px 5px 80px;padding:0; font-size:16px;">Notice</h4>
	<p style="font-size:10px; color:#000; margin:5px 5px 5px 80px;"><?php echo $rowsfeedback; ?> queries updated. Please check.</p>
</div>

<div class="purchase">
	<h4 style="margin:6px 4px 5px 80px;padding:0; font-size:16px;">Purchased stats</h4>
	<p style="font-size:10px; color:#000; margin:5px 5px 5px 80px;"><?php if ($rowsproduct > 0){echo $rowsproduct, ' product(s) recently out of stock.';}else{echo 'There are no product that recently out of stock.';} ?></p>
</div>

<div class="secure">
	<h4 style="margin:6px 4px 5px 80px;padding:0; font-size:16px;">Please remember your staff id</h4>
	<p style="font-size:10px; color:#000; margin:5px 5px 5px 80px;">Staff ID is the most important things to be remember due to login to this system. Please take note</p>
</div>
					</div><!--/blog-post-area-->
	</section>

	

  
    <script src="js/jquery.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>