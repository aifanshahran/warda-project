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
			width: 100%;
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
</style>
<?php
	if(isset($_POST['delete'])){
		$id = $_REQUEST['id'];
		$querydelete = "DELETE FROM `feedback` WHERE commentID='".$id."'";
		mysqli_query($con,$querydelete);
		header("location: feedback.php?status=success");
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
									<h4 class="panel-title"><a href="#">Feedback &amp; queries</a></h4>
								</div>
                                </div>
						</div><!--/category-products-->
			</div></div>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Feedback &amp; Queries</h2>
					   <table class="table table-striped">
						   <thead>
    <tr>
        <th style="width:19%;-webkit-border-radius: 9px 0px 0px 0px;">Name</th>
		<th style="width:22%">Email Address</th>
		<th style="width:20%">Subject</th>
  		 <th style="width:30%;">Feedback/Queries</th>
  		 <th style="width:9%;-webkit-border-radius: 0px 9px 0px 0px;">Action</th>
    </tr>
    </thead>
    <tbody>
       <?php 
		$query = "SELECT * FROM `feedback`";
		$result = mysqli_query($con, $query) or die(mysqli_error());
		$rowsno = mysqli_num_rows($result);
		if($rowsno > 0){
			while ($rows = mysqli_fetch_array($result)){
				echo '<tr>
					<td height="70" style="width:21%">'.$rows['name'].'</td>
					<td height="70" style="width:22%;text-align: left;">'.$rows['email'].'</td>
					<td height="70" style="width:20%;text-align: center;overflow-y: auto;">'.$rows['subject'].'</td>
					<td height="70" style="width:30%;text-align: left;overflow-y: auto;">'.$rows['comment'].'</td>
					<td height="70" style="width:7%;text-align: center;"><a href="mailto: '.$rows['email'].'">Reply</a><p style="line-height: 200%;"></p>
					<form action="" method="post" enctype="multipart/form-data" onSubmit="if(!confirm(\'Are you sure to delete?\')){return false;}">
					<input type="hidden" name="id" value="'.$rows['commentID'].'">
					<button type="submit" name="delete" style="background-color: Transparent;background-repeat:no-repeat;border: none;cursor:pointer;overflow: hidden;outline:none;color: red;" class="glyphicon glyphicon-trash" title="Delete" data-toggle="tooltip">
					</button></form></td>
					</tr>';}
			}else{
			echo '<tr>
        		<td height="70" style="width:100%;text-align: center">No inquiries at this time.</td>
   				 </tr>';}
		?>
    </tbody>
    
</table>
					
<br/>
<br/>
</div>
				</div>
			</div>
					</div><!--/blog-post-area-->
	</section>

	

  
    <script src="js/jquery.js"></script>
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