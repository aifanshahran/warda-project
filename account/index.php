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
	table {
            width: 82%;
        }

        thead, tbody, tr, td, th { display: block; }

        tr:after {
            content: ' ';
            display: block;
            visibility: hidden;
            clear: both;
        }

        thead th {
			width: 72%;
            height: 40px;
			text-align: center;
			color: azure;
			background-color: #FF3333;

            /*text-align: left;*/
        }

        tbody {
            height: 270px;
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
<body>
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
									<h4 class="panel-title"><a href="#">
											Account Overview
										</a>
									</h4>
									</div>
								</div>
							</div>
							<div class="panel-group category" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="shoppingitems.php">
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
				<div class="col-sm-9">
					<div class="blog-post-area">
					<br/>
					<br/>
					<br/>
						<h2 class="title text-center">Account Overview</h2>
                        <table align="center">
                        <tbody>
       <tr>
            <td height="40" style="width:21%;-webkit-border-radius: 9px 0px 0px 0px;border-right:1px solid rgba(229,229,229,1.00);background-color: rgba(209,199,199,1.00);text-align: center;">Name</td>
            <td height="40" style="width:61%;-webkit-border-radius: 0px 9px 0px 0px;overflow-y: auto;"><?php echo $rows['name']; ?></td>
       </tr>
       <tr>
           <td height="40" style="width:21%;border-right:1px solid rgba(229,229,229,1.00);background-color: rgba(209,199,199,1.00);text-align: center;">Date of Birth</td>
           <td height="40" style="width:61%"><?php echo $rows['dateOf_birth']; ?></td>
       </tr>
       <tr>
           <td height="40" style="width:21%;border-right:1px solid rgba(229,229,229,1.00);background-color: rgba(209,199,199,1.00);text-align: center;">Email Address</td>
           <td height="40" style="width:61%"><?php echo $_SESSION['email']; ?></td>
       </tr>
       <tr>
           <td height="40" style="width:21%;border-right:1px solid rgba(229,229,229,1.00);background-color: rgba(209,199,199,1.00);text-align: center;">Gender</td>
           <td height="40" style="width:61%"><?php echo $gender; ?></td>
       </tr>
       <tr>
           <td height="70" style="width:21%;border-right:1px solid rgba(229,229,229,1.00);background-color: rgba(209,199,199,1.00);text-align: center;">Address</td>
           <td height="70" style="width:61%;overflow-y: auto;"><?php echo $address; ?></td>
       </tr>
       </tbody>
    </table>
</br>
</br>
</br>
</br>
</br>
</br>
</div>
					</div><!--/blog-post-area-->
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
</body>
</html>