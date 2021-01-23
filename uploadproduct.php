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

<?php
		if(isset($_REQUEST['productName'])){
				move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$_FILES['image']['name']);
				$productName = stripslashes($_REQUEST['productName']);
				$productName = mysqli_real_escape_string($con,$productName); 
				$productQuantity = stripslashes($_REQUEST['productQuantity']);
				$productQuantity = mysqli_real_escape_string($con,$productQuantity);
				$productBrand = stripslashes($_REQUEST['productBrand']);
				$productBrand = mysqli_real_escape_string($con,$productBrand);
				$productPrice_unit = stripslashes($_REQUEST['productPrice_unit']);
				$productPrice_unit = mysqli_real_escape_string($con,$productPrice_unit);
				$productCategory = stripslashes($_REQUEST['productCategory']);
				$productCategory = mysqli_real_escape_string($con,$productCategory);
				$productSize = stripslashes($_REQUEST['productSize']);
				$productSize = mysqli_real_escape_string($con,$productSize);
				$productColour = stripslashes($_REQUEST['productColour']);
				$productColour = mysqli_real_escape_string($con,$productColour);
				$productDescription = stripslashes($_REQUEST['productDescription']);
				$productDescription = mysqli_real_escape_string($con,$productDescription);
				$productMaterial = stripslashes($_REQUEST['productMaterial']);
				$productMaterial = mysqli_real_escape_string($con,$productMaterial);
				$query = ("INSERT into `product` (productName, productQuantity, productBrand, productPrice_unit, category, size, colour, photoProduct_name, productDescription, productMaterial)
				VALUES ('$productName', '$productQuantity', '$productBrand', '$productPrice_unit', '$productCategory', '$productSize', '$productColour', '".$_FILES['image']['name']."', '$productDescription', '$productMaterial')");
				$result = mysqli_query($con,$query);
					if($result){
						header("location: uploadproduct.php?status=success");
					}else{
						header("location: uploadproduct.php?status=failed");
					}
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
											<li><a href="#"></i>Upload product</a></li>
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
									<h4 class="panel-title"><a href="feedback.php">Feedback & queries</a></h4>
								</div>
                                </div>
						</div><!--/category-products-->
			</div></div>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Upload New Product</h2> 
                   <?php
							require("db.php");
		  					if(isset($_GET['status'])){
								if ($_GET['status']=='success'){
								echo '
								<center><img border="0" src="images/blog/checkmarkonce.gif" style="vertical-align: middle; height: 50px; width: 50px;" />&nbsp;&nbsp;<b><span style="color: #274e13; font-size: 20px; vertical-align: middle;">Product posted!</span></b></center>';
							}else{
								echo '<h4 style="color: red">Something wrong with the database. Try again.</h4>';}
							}else{ ?>
                    <div class="form-one">
                    <form action="" method="post" enctype="multipart/form-data">
                    				<input type="file" name="image" accept="image/*"/>
									<input type="text" placeholder="Product Name" class="form-control" required="required" name="productName">
									<textarea required placeholder="Description" name="productDescription" rows="8"></textarea>
									<p style="line-height: 200%;"></p>
									<p style="line-height: 200%;"></p>
									<input type="number" placeholder="Quantity" name="productQuantity" min="1">
									<input type="text"  class="form-control" required="required" placeholder="Brand" name="productBrand">
									<input type="text" placeholder="Price" name="productPrice_unit">
                                </div>
                                <div class="form-two">
									<input type="text" class="form-control" required="required" placeholder="Category" name="productCategory">
									<input type="text" class="form-control" required="required" placeholder="Size" name="productSize">
									<input type="text" class="form-control" required="required" placeholder="Colour" name="productColour">
									<input type="text" class="form-control" required="required" placeholder="Material" name="productMaterial">
                                <button type="submit" name="update" class="btn btn-primary pull-right">Upload</button>
						</form>
						<?php } ?>
						</div>
                                </div>
					</div><!--/blog-post-area-->
	</section>


  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>