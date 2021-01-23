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
        table {
            width: 90%;
        }

        thead, tbody, tr, td, th { display: block; }

        tr:after {
            content: ' ';
            display: block;
            visibility: hidden;
            clear: both;
        }

        thead th {
			width: 90%;
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
		$status = FALSE;
		if(isset($_POST['update'])){
				$status = $_REQUEST['update'];
				$id = $_REQUEST['id'];
				$update = "UPDATE customer SET customerStatus='".$status."' WHERE customerID=".$id."";
				$result = mysqli_query($con, $update);
				if ($result){
					$status = TRUE;
				}else{
					$status = FALSE;
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
					<div class="blog-post-area">
						<h2 class="title text-center">Customer Details</h2>
				   <?php
						if(isset($_GET['id'])){
							if( $status ) {
							echo '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><strong>Status updated!</strong></div>';
						  }
							$query = "SELECT * FROM `customer` WHERE customerID=".$_REQUEST['id']."";
							$result = mysqli_query($con, $query) or die(mysqli_error());
							$rows = mysqli_fetch_array($result);
							$date = strtotime($rows['dateOf_birth']);
							$dateOf_birth = date( 'jS F Y', $date);
							if($rows['address']!=NULL){
								$address = str_replace(", ",", <br  />", $rows['address']);
								$address = str_replace(",",", ", $address);
								$address = ucwords(strtoupper($address));
							}else{
								$address = 'Not specified';
							}
							if($rows['gender']!=NULL){
								$gender = $rows['gender'];
							}else{
								$gender = 'Not specified';
							}
							if($rows['photo_name'] == NULL)
							{
								$file = "account/uploads/defaultimg.png";
							}
							else
							{
								$file = "account/uploads/".$rows['photo_name'];
							}
							if($rows['customerStatus'] == 'N')
							{
								$status = "<option value=\"N\" selected>Not active</option>
								<option value=\"Y\">Active</option>";
							}
							else
							{
								$status = "<option value=\"Y\" selected>Actived</option>
								<option value=\"N\">Deactivate account</option>";
							}
							echo '
							<p><a href="accountcustomer.php"><img border="0" height="40" src="images/blog/back.png" width="40" /></a></p>
							<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
									<div class="profile-userpic">
										<img class="img-circle" src="'.$file.'" alt="" style="width:200px; height:200px;"/></div></div></div></div></div>
										<div class="col-sm-8">
										<table class="table table-striped">
										<tbody>
										<tr>
										<td height="40" style="width:30%;-webkit-border-radius: 9px 0px 0px 0px;border-right:1px solid rgba(229,229,229,1.00);background-color: rgba(209,199,199,1.00);text-align: center;">Name</td>
										<td height="40" style="width:50%;-webkit-border-radius: 0px 9px 0px 0px;">'.$rows['name'].'</td>
										</tr>
										<tr>
										<td height="40" style="width:30%;border-right:1px solid rgba(229,229,229,1.00);background-color: rgba(209,199,199,1.00);text-align: center;">Email address</td>
										<td height="40" style="width:50%;">'.$rows['email'].'</td>
										</tr>
										<tr>
										<td height="40" style="width:30%;border-right:1px solid rgba(229,229,229,1.00);background-color: rgba(209,199,199,1.00);text-align: center;">Date of Birth</td>
										<td height="40" style="width:50%;">'.$dateOf_birth.'</td>
										</tr>
										<tr>
										<td height="72" style="width:30%;border-right:1px solid rgba(229,229,229,1.00);background-color: rgba(209,199,199,1.00);text-align: center;">Address</td>
										<td height="72" style="width:50%;overflow-y: auto;">'.$address.'</td>
										</tr>
										<tr>
										<td height="40" style="width:30%;border-right:1px solid rgba(229,229,229,1.00);background-color: rgba(209,199,199,1.00);text-align: center;">Gender</td>
										<td height="40" style="width:50%;">'.$gender.'</td>
										</tr>
										<tr>
										<td height="50" style="width:30%;border-right:1px solid rgba(229,229,229,1.00);background-color: rgba(209,199,199,1.00);text-align: center;-webkit-border-radius: 0px 0px 0px 9px;">Status</td>
										<td height="50" style="width:50%;-webkit-border-radius: 0px 0px 9px 0px;">
										<form action="" method="post" enctype="multipart/form-data">
										<input type="hidden" name="id" value="'.$rows['customerID'].'">
										<select id="soflow-color" name="update" onchange="this.form.submit()">'.$status.'</select></form></td>
										</tr>
										</tbody>
										</table>
										</div>
										';
							
						}else{
						?>
				   <form><input type="text" name="search" placeholder="Search.." <?php if (isset($_GET['search'])){echo 'value="'.$_GET['search'].'"';}?></input></form>
					   <table align="center">
						   <thead>
					<tr>
						<th style="width:30%;-webkit-border-radius: 9px 0px 0px 0px;">Name</th>
						<th style="width:30%">Email Address</th>
						 <th style="width:30%;-webkit-border-radius: 0px 9px 0px 0px;">Details</th>
					</tr>
					</thead>
					<tbody>
					   <?php 
						if(isset($_GET['search'])){
							$query = "SELECT name, email, customerID FROM customer WHERE name LIKE '%".$_GET['search']."%' ORDER by customerID DESC";
							$result = mysqli_query($con,$query) or die(mysqli_error());
							$rowscount1 = mysqli_num_rows($result);
							if($rowscount1==0){
								echo '
								<tr>
										<td height="55" style="width:90%;text-align: center;"><h4>No data.</h4></td>
								</tr>';
							}else{
								while($rows = mysqli_fetch_array($result)){
										echo '
										<tr>
										<td height="70" style="width:30%">'.$rows['name'].'</td>
										<td height="70" style="width:30%;text-align: center;">'.$rows['email'].'</td>
										<td height="70" style="width:30%;text-align: center;"><a href="accountcustomer.php?id='.$rows['customerID'].'">View & Edit</a></td>
										</tr>';
									}
							}
							}else{
							$query = "SELECT * FROM `customer`";
							$result = mysqli_query($con, $query) or die(mysqli_error());
							$rowsno = mysqli_num_rows($result);
							if($rowsno > 0){
								while ($rows = mysqli_fetch_array($result)){
									echo '<tr>
										<td height="70" style="width:30%">'.$rows['name'].'</td>
										<td height="70" style="width:30%;text-align: center;">'.$rows['email'].'</td>
										<td height="70" style="width:30%;text-align: center;"><a href="accountcustomer.php?id='.$rows['customerID'].'">View & Edit</a></td>
										</tr>';}
								}else{
								echo '<tr>
									<td height="70" style="width:100%;text-align: center">No customer at this time.</td>
									 </tr>';}
							}
						?>
					</tbody>
				</table>				
				<br/>
				<br/>
				<?php } ?>
				</div>
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
    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

</script>

</body>
</html>