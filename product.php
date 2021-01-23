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
	div.accordioni {
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

	div.accordioni.active, button.accordioni:hover {
	  color: #000000
	}

	div.accordioni:before {
	  content: '\02795';
	  font-size: 9px;
	  float: left;
	  margin-left: 0px;
	  margin-right: 10px;
	  margin-top: 7px;
	}

	div.accordioni.active:before {
	  content: "\2796";
	}
	div.paneli {
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

	.paneli-icon {
	  margin-right: 10px;
	}

	.paneli h5 {
	  font-size: 15px;
	  line-height: 23px;
	  margin-top: 5px;
	  margin-bottom: 0px;
	  display: inline-block;
	  color: #2d2d2d
	}

	.paneli p {
	  font-size: 15px;
	  line-height: 23px;
	  padding: 15px 30px 20px 0;
	  color: #2d2d2d
	}
	div.paneli.show {
	  opacity: 1;
	  max-height: 500px;
	}
	table {
            width: 80%;
        }

        thead, tbody, tr, td, th { display: block; }

        tr:after {
            content: ' ';
            display: block;
            visibility: hidden;
            clear: both;
        }

        thead th {
			width: 80%;
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
        }
		input{
		  background: #F0F0E9;
		  border: 0 none;
		  display: inline;
		  font-family: 'Roboto', sans-serif;
		  font-size: 14px;
		  font-weight: 300;
		  height: 40px;
		  margin-bottom: 10px;
		  outline: medium none;
		  padding: 10px;
		}
		form > select,
		select {
		  padding:10px 5px;
		  background:#F0F0E9;
		  border: 0 none;
		  margin-bottom:10px;
		  width: 100%;
		  font-weight: 300
		}
	#t1 {
    -moz-tab-size: 4; /* Code for Firefox */
    -o-tab-size: 4; /* Code for Opera 10.6-12.1 */
    tab-size: 4;
	background-color: white;
	border: 0 none;
	font-family: 'Roboto', sans-serif;
	display: inline;
    margin: 0;
}
	.alignleft {
	float: left;
	}
	.alignright {
	float: right;
	}
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
   width: 30%;
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
	input[name=search]{
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('images/blog/searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[name=search]:focus  {
    width: 70%;
}
</style>
	<?php
	$cartadded = false;
	$delete = false;
		if(isset($_POST['update'])){
			$productID = $_REQUEST['productID'];
				if($_FILES['image']['name']!=''){
					move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$_FILES['image']['name']);
					$query = ("UPDATE `product` SET photoProduct_name='".$_FILES['image']['name']."' WHERE productID=$productID");
					mysqli_query($con,$query);
				}
				if($_REQUEST['productName']!=$_REQUEST['oldproductName']){
					$productName = stripslashes($_REQUEST['productName']);
					$productName = mysqli_real_escape_string($con,$productName); 
					$query = ("UPDATE `product` SET productName='".$productName."' WHERE productID=$productID");
					mysqli_query($con,$query);
				}
				if($_REQUEST['productPrice_unit']!=$_REQUEST['oldproductPrice_unit']){
					$productPrice_unit = stripslashes($_REQUEST['productPrice_unit']);
					$productPrice_unit = mysqli_real_escape_string($con,$productPrice_unit); 
					$query = ("UPDATE `product` SET productPrice_unit='".$productPrice_unit."' WHERE productID=$productID");
					mysqli_query($con,$query);
				}
				if($_REQUEST['productQuantity']!=$_REQUEST['oldproductQuantity']){
					$productQuantity = $_REQUEST['productQuantity'];
					$query = ("UPDATE `product` SET productQuantity=".$productQuantity." WHERE productID=$productID");
					mysqli_query($con,$query);
				}
				if($_REQUEST['productDescription']!=$_REQUEST['oldproductDescription']){
					$productDescription = stripslashes($_REQUEST['productDescription']);
					$productDescription = mysqli_real_escape_string($con,$productDescription);
					$query = ("UPDATE `product` SET productDescription='".$productDescription."' WHERE productID=$productID");
					mysqli_query($con,$query);
				}
				if($_REQUEST['productColour']!=$_REQUEST['oldproductColour']){
					$productColour = stripslashes($_REQUEST['productColour']);
					$productColour = mysqli_real_escape_string($con,$productColour);
					$query = ("UPDATE `product` SET colour='".$productColour."' WHERE productID=$productID");
					mysqli_query($con,$query);
				}
				if($_REQUEST['productSize']!=$_REQUEST['oldproductSize']){
					$productSize = stripslashes($_REQUEST['productSize']);
					$productSize = mysqli_real_escape_string($con,$productSize);
					$query = ("UPDATE `product` SET size='".$productSize."' WHERE productID=$productID");
					mysqli_query($con,$query);
				}
				if($_REQUEST['productMaterial']!=$_REQUEST['oldproductMaterial']){
					$productMaterial = stripslashes($_REQUEST['productMaterial']);
					$productMaterial = mysqli_real_escape_string($con,$productMaterial);
					$query = ("UPDATE `product` SET productMaterial='".$productMaterial."' WHERE productID=$productID");
					mysqli_query($con,$query);
				}
				if($_REQUEST['productCategory']!=$_REQUEST['oldproductCategory']){
					$productCategory = stripslashes($_REQUEST['productCategory']);
					$productCategory = mysqli_real_escape_string($con,$productCategory);
					$query = ("UPDATE `product` SET category='".$productCategory."' WHERE productID=$productID");
					mysqli_query($con,$query);
				}
				if($_REQUEST['productBrand']!=$_REQUEST['oldproductBrand']){
					$productBrand = stripslashes($_REQUEST['productBrand']);
					$productBrand = mysqli_real_escape_string($con,$productBrand);
					$query = ("UPDATE `product` SET productBrand='".$productBrand."' WHERE productID=$productID");
					mysqli_query($con,$query);
				}
				$cartadded = true;
			}else if(isset($_POST['delete'])){
				$productID = $_REQUEST['productID'];
				$querydelete = "DELETE FROM `product` WHERE productID=$productID";
				mysqli_query($con,$querydelete);
			$delete = true;
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
									<h4 class="panel-title"><a href="feedback.php">Feedback & queries</a></h4>
								</div>
                                </div>
						</div><!--/category-products-->
			</div></div>		
	    		<div class="col-sm-9">   			   			
					<h2 class="title text-center">Posts</strong></h2>
			<?php 
				if(isset($_GET['productID'])){
					if( $cartadded ) {
							echo '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><strong>Post updated!</strong> <a href="shop.php?p='.$_GET['productID'].'">View product</a></div>';
						  }
				echo '
				<p class="alignleft"><a href="product.php"><img border="0" height="30" src="images/blog/back.png" width="30" /></a></p>
						<form action="" method="post" enctype="multipart/form-data"><p class="alignright"><button type="submit" style=" background: #FF3333;border: medium none;border-radius: 1;color: #FFFFFF;display: block;font-family: \'Roboto\', sans-serif;" name="update" class="btn btn-info">Update</button></p>
				<br/><br/>';
				$productID = $_GET['productID'];
				$queryproduct = "SELECT * FROM `product` WHERE productID=$productID";
				$resultproduct = mysqli_query($con, $queryproduct) or die(mysqli_error());
				$rows = mysqli_fetch_array($resultproduct);
				echo '
				<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<input type="file" name="image" onchange="readURL(this);" accept="image/*"/>
										<img id="blah" src="uploads/'.$rows['photoProduct_name'].'" alt="" />
										</div>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
						<input type="hidden" name="productID" value="'.$productID.'"/>
						<input type="hidden" name="oldproductName" value="'.$rows['productName'].'"/>
						<input type="hidden" name="oldproductPrice_unit" value="'.sprintf('%0.2f',$rows['productPrice_unit']).'"/>
						<input type="hidden" name="oldproductQuantity" value="'.$rows['productQuantity'].'"/>
						<input type="hidden" name="oldproductDescription" value="'.$rows['productDescription'].'"/>
						<input type="hidden" name="oldproductColour" value="'.$rows['colour'].'">
						<input type="hidden" name="oldproductSize" value="'.$rows['size'].'">
						<input type="hidden" name="oldproductMaterial" value="'.$rows['productMaterial'].'">
						<input type="hidden" name="oldproductCategory" value="'.$rows['category'].'">
						<input type="hidden" name="oldproductBrand" value="'.$rows['productBrand'].'">
						<pre id="t1"><br/>Product Name:				<input type="text" name="productName" value="'.$rows['productName'].'"><br/>
Product Price:		RM	<input type="number" name="productPrice_unit" value="'.sprintf('%0.2f',$rows['productPrice_unit']).'"/><br/>
Product Quantity:				<input type="number" placeholder="Quantity" value="'.$rows['productQuantity'].'" name="productQuantity">
						</pre>
						<br/>
						<div class="accordioni">Product Description</div>
					<div class="paneli">
					  <textarea name="productDescription" rows="8">'.$rows['productDescription'].'</textarea>
					</div><!-- /.end of job post -->

					<div class="accordioni">Product Information/Details</div>
					<div id="foo" class="paneli">
					<pre id="t1"><br/>Colour:		<input type="text" name="productColour" value="'.$rows['colour'].'" autocomplete="off"><br/>
Size:			<input type="text" name="productSize" value="'.$rows['size'].'" autocomplete="off"><br/>
Material:	<input type="text" name="productMaterial" value="'.$rows['productMaterial'].'" autocomplete="off"><br/>
Category:	<input type="text" name="productCategory" value="'.$rows['category'].'" autocomplete="off"><br/>
					  </pre>
					</div><!-- /.end of job post -->

					<div class="accordioni">Brands</div>
					<div id="foo" class="paneli">
					  Product Brand: <select id="soflow-color" name="productBrand">';	
					$querybrand = "SELECT productBrand FROM `product` GROUP BY productBrand";
					$resultbrand = mysqli_query($con, $querybrand) or die(mysqli_error());
						while ($rowsb = mysqli_fetch_array($resultbrand)){
							if($rowsb['productBrand']==$rows['productBrand']){
								echo '<option value="'.$rowsb['productBrand'].'" selected>'.$rowsb['productBrand'].'</option>';
							}else{
							echo '<option value="'.$rowsb['productBrand'].'">'.$rowsb['productBrand'].'</option>';}
						}
					echo'</select>
					</div><!-- /.end of job post --></form>';
				}else{
			?>  
				   <?php if( $delete ) {
							echo '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><strong>Post deleted!</strong></div>';
						  } ?>
						  <form>
  <input type="text" name="search" placeholder="Search..">
</form>
					   <center>				    				
			<table>
                    <thead>
                     <tr>
    <th style="width: 20%;-webkit-border-radius: 9px 0px 0px 0px;border-right: 0px;color: azure;text-align: center;">Product ID</th>
    <th style="width: 50%;border-right: 0px;color: azure;text-align: center;">Product Name</th>
    <th style="width: 30%;text-align: center;-webkit-border-radius: 0px 9px 0px 0px;border-right: 0px;color: azure;">Details</th>
  </tr>
  <thead>
  <tbody>
  		<?php 
			if(isset($_GET['search'])){
			$query = "SELECT productID, productName FROM product WHERE productName LIKE '%".$_GET['search']."%' ORDER by productID DESC";
	  		$result = mysqli_query($con,$query) or die(mysqli_error());
			$rowscount1 = mysqli_num_rows($result);
			if($rowscount1==0){
				echo '
				<tr>
						<td height="55" style="width:100%;text-align: center;"><h4>No data.</h4></td>
				</tr>';
			}else{
	  			while($rows = mysqli_fetch_array($result)){
						echo '
						<tr>
						<td height="45" style="width:20%;text-align: center;">'.$rows['productID'].'</td>
						<td height="45" style="width:50%;text-align: center;">'.$rows['productName'].'</td>
						<td height="45" style="width:30%;text-align: center;">
						<a style="color:#3667CA;" href="product.php?productID='.$rows['productID'].'">Edit</a> | <a style="color:#3667CA;" href="shop.php?p='.$rows['productID'].'" target="_blank">View</a> | <form style="display: inline;" action="" method="post" enctype="multipart/form-data"><input type="hidden" name="productID" value="'.$rows['productID'].'"/><button name="delete" style="color:#3667CA;cursor:pointer;padding:0!important;background:none!important;border:none;">Delete</button></form></td>
	  				</tr>';
					}
			}
			}else{
	  		$query = "SELECT productID, productName FROM product ORDER by productID DESC";
	  		$result = mysqli_query($con,$query) or die(mysqli_error());
			$rowscount1 = mysqli_num_rows($result);
			if($rowscount1==0){
				echo '
				<tr>
						<td height="55" style="width:100%;text-align: center;"><h4>No data.</h4></td>
				</tr>';
			}else{
	  			while($rows = mysqli_fetch_array($result)){
						echo '
						<tr>
						<td height="45" style="width:20%;text-align: center;">'.$rows['productID'].'</td>
						<td height="45" style="width:50%;text-align: center;">'.$rows['productName'].'</td>
						<td height="45" style="width:30%;text-align: center;">
						<a style="color:#3667CA;" href="product.php?productID='.$rows['productID'].'">Edit</a> | <a style="color:#3667CA;" href="shop.php?p='.$rows['productID'].'" target="_blank">View</a> | <form style="display: inline;" action="" method="post" enctype="multipart/form-data"><input type="hidden" name="productID" value="'.$rows['productID'].'"/><button name="delete" style="color:#3667CA;cursor:pointer;padding:0!important;background:none!important;border:none;">Delete</button></form></td>
	  				</tr>';
					}
			}
			}
			
	  ?>
				</tbody>
                    </table></center> 
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
        <script>
var acc = document.getElementsByClassName("accordioni");
var i;

function click_action(){
  $('.accordioni').removeClass('active');
  $('.paneli').removeClass('show');

  this.classList.toggle("active");
  this.nextElementSibling.classList.toggle("show");
}

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = click_action;
}
</script>
<script>
 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
</body>
</html>