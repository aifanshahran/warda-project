<?php
require('auth.php');
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
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
<?php
	require_once('db.php');
	if((isset($_POST['deletess'])) || (isset($_POST['newquantity'])) || (isset($_POST['deletesb'])) || (isset($_POST['deleteee'])) || (isset($_POST['sameshippingsamebilling'])) || (isset($_POST['differentshippingdifferentbilling'])) ||  (isset($_POST['sameshippingdifferentbilling'])) || (isset($_POST['newquantitysb'])) || (isset($_POST['newquantityss'])) || (isset($_POST['newquantityee']))){
		if((isset($_POST['sameshippingsamebilling']))){
		$id = ("SELECT customerID FROM `customer` WHERE email='".$_SESSION["email"]."'");
		$resultid = mysqli_query($con,$id) or die(mysql_error());
		$rows = mysqli_fetch_array($resultid);
		$customerID = $rows['customerID'];
		$sname = $_REQUEST['name'];
		$saddress = stripslashes($_REQUEST['address']);
		$saddress = mysqli_real_escape_string($con,$saddress);
		$sphone = $_REQUEST['phone'];
		$smphone = $_REQUEST['mphone'];
		$bname = $_REQUEST['bname'];
		$baddress = stripslashes($_REQUEST['baddress']);
		$baddress = mysqli_real_escape_string($con,$baddress);
		$bphone = $_REQUEST['bphone'];
		$bmphone = $_REQUEST['bmphone'];		
		}else if((isset($_POST['sameshippingdifferentbilling']))){
			$sname = $_REQUEST['name'];
			$saddress = stripslashes($_REQUEST['address']);
			$saddress = mysqli_real_escape_string($con,$saddress);
			$sphone = $_REQUEST['phone'];
			$smphone = $_REQUEST['mphone'];
			$bname = $_REQUEST['bname'];
			$baddress1 = $_REQUEST['baddress1'];
			$baddress2 = $_REQUEST['baddress2'];
			$bzip = $_REQUEST['bzip'];
			$bregion = $_REQUEST['bregion'];
			$bcountry = $_REQUEST['bcountry'];
			if($_REQUEST['baddress2']==''){
				$baddress = ''.$baddress1.', '.$bzip.','.$bregion.','.$bcountry.'';
			}else{
				$baddress = ''.$baddress1.', '.$baddress2.', '.$bzip.','.$bregion.','.$bcountry.'';
			}
			$bphone = $_REQUEST['bphone'];
			$bmphone = $_REQUEST['bmphone'];
			}else if ((isset($_POST['differentshippingdifferentbilling']))){
				if(isset($_POST['saveshippingadd'])){
					$address1 = $_REQUEST['address1'];
					$address2 = $_REQUEST['address2'];
					$zip = $_REQUEST['zip'];
					$region = $_REQUEST['region'];
					$country = $_REQUEST['country'];
						if($_REQUEST['address2']==''){
							$address = ''.$address1.', '.$zip.','.$region.','.$country.'';
						}else{
							$address = ''.$address1.', '.$address2.', '.$zip.','.$region.','.$country.'';}
					$insert = "UPDATE customer SET address='$address' WHERE email='".$_SESSION['email']."'";
					$resultinsert = mysqli_query($con, $insert);
				}
				$sname = $_REQUEST['name'];
				$saddress1 = $_REQUEST['address1'];
				$saddress2 = $_REQUEST['address2'];
				$szip = $_REQUEST['zip'];
				$sregion = $_REQUEST['region'];
				$scountry = $_REQUEST['country'];
				$sphone = $_REQUEST['phone'];
				$smphone = $_REQUEST['mphone'];
				$bname = $_REQUEST['bname'];
				$baddress1 = $_REQUEST['baddress1'];
				$baddress2 = $_REQUEST['baddress2'];
				$bzip = $_REQUEST['bzip'];
				$bregion = $_REQUEST['bregion'];
				$bcountry = $_REQUEST['bcountry'];
				if($_REQUEST['address2']==''){
					$saddress = ''.$saddress1.', '.$szip.','.$sregion.','.$scountry.'';
				}else{
					$saddress = ''.$saddress1.', '.$saddress2.', '.$szip.','.$sregion.','.$scountry.'';
				}
				if($_REQUEST['baddress2']==''){
					$baddress = ''.$baddress1.', '.$bzip.','.$bregion.','.$bcountry.'';
				}else{
					$baddress = ''.$baddress1.', '.$baddress2.', '.$bzip.','.$bregion.','.$bcountry.'';
				}
				$bphone = $_REQUEST['bphone'];
				$bmphone = $_REQUEST['bmphone'];
			}else if(isset($_POST['deletess'])){
			$queryexist = "SELECT * FROM `cart` WHERE customerID=(SELECT customerID FROM customer WHERE email='".$_SESSION["email"]."')";
			$result = mysqli_query($con,$queryexist) or die(mysql_error());
			$rows = mysqli_fetch_array($result);
			$customerID = $rows['customerID'];
			$cart_id = $rows['cart_id'];
			$productName = stripslashes($_REQUEST['productName']);
			$productName = mysqli_real_escape_string($con,$productName);
			$subtotal = $_REQUEST['subtotal'];
			$productID = $_REQUEST['productID'];
			$newquantity = $_REQUEST['newquantityss'];
			$Product_Qty = $_REQUEST['Product_Qty'];
			$productPrice_unit = $_REQUEST['productPrice_unit'];
			$sname = $_REQUEST['name'];
			$saddress = stripslashes($_REQUEST['address']);
			$saddress = mysqli_real_escape_string($con,$saddress);
			$sphone = $_REQUEST['phone'];
			$smphone = $_REQUEST['mphone'];
			$bname = $_REQUEST['bname'];
			$baddress = stripslashes($_REQUEST['baddress']);
			$baddress = mysqli_real_escape_string($con,$baddress);
			$bphone = $_REQUEST['bphone'];
			$bmphone = $_REQUEST['bmphone'];
			$query = ("DELETE FROM `cart_details` WHERE `cart_details`.`productID` = '$productID' AND `cart_details`.`cart_id` = '$cart_id'");
			$result = mysqli_query($con,$query);
			if($result){
				$totalquery = ("SELECT SUM(subtotal) FROM `cart_details` WHERE cart_id='".$cart_id."'");
				$resulttotalquery = mysqli_query($con,$totalquery) or die(mysql_error());
				$rows = mysqli_fetch_array($resulttotalquery);
				$total = $rows['SUM(subtotal)'];
				$query = ("UPDATE cart SET total='$total' WHERE cart_id='$cart_id' AND customerID='$customerID'");
				$result = mysqli_query($con,$query) or die(mysql_error());
			}else{
				echo '1d';
			}
		}else if(isset($_POST['deletesb'])){
			$queryexist = "SELECT * FROM `cart` WHERE customerID=(SELECT customerID FROM customer WHERE email='".$_SESSION["email"]."')";
			$result = mysqli_query($con,$queryexist) or die(mysql_error());
			$rows = mysqli_fetch_array($result);
			$customerID = $rows['customerID'];
			$cart_id = $rows['cart_id'];
			$productName = stripslashes($_REQUEST['productName']);
			$productName = mysqli_real_escape_string($con,$productName);
			$subtotal = $_REQUEST['subtotal'];
			$productID = $_REQUEST['productID'];
			$newquantity = $_REQUEST['newquantitysb'];
			$Product_Qty = $_REQUEST['Product_Qty'];
			$productPrice_unit = $_REQUEST['productPrice_unit'];
			$sname = $_REQUEST['name'];
			$saddress = stripslashes($_REQUEST['address']);
			$saddress = mysqli_real_escape_string($con,$saddress);
			$sphone = $_REQUEST['phone'];
			$smphone = $_REQUEST['mphone'];
			$bname = $_REQUEST['bname'];
			$baddress1 = $_REQUEST['baddress1'];
			$baddress2 = $_REQUEST['baddress2'];
			$bzip = $_REQUEST['bzip'];
			$bregion = $_REQUEST['bregion'];
			$bcountry = $_REQUEST['bcountry'];
			if($_REQUEST['baddress2']==''){
				$baddress = ''.$baddress1.', '.$bzip.','.$bregion.','.$bcountry.'';
			}else{
				$baddress = ''.$baddress1.', '.$baddress2.', '.$bzip.','.$bregion.','.$bcountry.'';
			}
			$bphone = $_REQUEST['bphone'];
			$bmphone = $_REQUEST['bmphone'];
			$query = ("DELETE FROM `cart_details` WHERE `cart_details`.`productID` = '$productID' AND `cart_details`.`cart_id` = '$cart_id'");
			$result = mysqli_query($con,$query);
			if($result){
				$totalquery = ("SELECT SUM(subtotal) FROM `cart_details` WHERE cart_id='".$cart_id."'");
				$resulttotalquery = mysqli_query($con,$totalquery) or die(mysql_error());
				$rows = mysqli_fetch_array($resulttotalquery);
				$total = $rows['SUM(subtotal)'];
				$query = ("UPDATE cart SET total='$total' WHERE cart_id='$cart_id' AND customerID='$customerID'");
				$result = mysqli_query($con,$query) or die(mysql_error());
			}else{
				echo '1d';
			}
			}else if(isset($_POST['deleteee'])){
			$queryexist = "SELECT * FROM `cart` WHERE customerID=(SELECT customerID FROM customer WHERE email='".$_SESSION["email"]."')";
			$result = mysqli_query($con,$queryexist) or die(mysql_error());
			$rows = mysqli_fetch_array($result);
			$customerID = $rows['customerID'];
			$cart_id = $rows['cart_id'];
			$productName = stripslashes($_REQUEST['productName']);
			$productName = mysqli_real_escape_string($con,$productName);
			$subtotal = $_REQUEST['subtotal'];
			$productID = $_REQUEST['productID'];
			$newquantity = $_REQUEST['newquantityee'];
			$Product_Qty = $_REQUEST['Product_Qty'];
			$productPrice_unit = $_REQUEST['productPrice_unit'];
			$sname = $_REQUEST['name'];
			$saddress1 = $_REQUEST['address1'];
			$saddress2 = $_REQUEST['address2'];
			$szip = $_REQUEST['zip'];
			$sregion = $_REQUEST['region'];
			$scountry = $_REQUEST['country'];
			$sphone = $_REQUEST['phone'];
			$smphone = $_REQUEST['mphone'];
			$bname = $_REQUEST['bname'];
			$baddress1 = $_REQUEST['baddress1'];
			$baddress2 = $_REQUEST['baddress2'];
			$bzip = $_REQUEST['bzip'];
			$bregion = $_REQUEST['bregion'];
			$bcountry = $_REQUEST['bcountry'];
			if($_REQUEST['address2']==''){
				$saddress = ''.$saddress1.', '.$szip.','.$sregion.','.$sountry.'';
			}else{
				$saddress = ''.$saddress1.', '.$saddress2.', '.$szip.','.$sregion.','.$scountry.'';
			}
			if($_REQUEST['baddress2']==''){
				$baddress = ''.$baddress1.', '.$bzip.','.$bregion.','.$bcountry.'';
			}else{
				$baddress = ''.$baddress1.', '.$baddress2.', '.$bzip.','.$bregion.','.$bcountry.'';
			}
			$bphone = $_REQUEST['bphone'];
			$bmphone = $_REQUEST['bmphone'];
			$query = ("DELETE FROM `cart_details` WHERE `cart_details`.`productID` = '$productID' AND `cart_details`.`cart_id` = '$cart_id'");
			$result = mysqli_query($con,$query);
			if($result){
				$totalquery = ("SELECT SUM(subtotal) FROM `cart_details` WHERE cart_id='".$cart_id."'");
				$resulttotalquery = mysqli_query($con,$totalquery) or die(mysql_error());
				$rows = mysqli_fetch_array($resulttotalquery);
				$total = $rows['SUM(subtotal)'];
				$query = ("UPDATE cart SET total='$total' WHERE cart_id='$cart_id' AND customerID='$customerID'");
				$result = mysqli_query($con,$query) or die(mysql_error());
			}else{
				echo '1d';
			}
		}else if(isset($_POST['newquantityss'])){
			$sname = $_REQUEST['name'];
			$saddress = stripslashes($_REQUEST['address']);
			$saddress = mysqli_real_escape_string($con,$saddress);
			$sphone = $_REQUEST['phone'];
			$smphone = $_REQUEST['mphone'];
			$bname = $_REQUEST['bname'];
			$baddress = stripslashes($_REQUEST['baddress']);
			$baddress = mysqli_real_escape_string($con,$baddress);
			$bphone = $_REQUEST['bphone'];
			$bmphone = $_REQUEST['bmphone'];
			//NEW QUANTITY
			$queryexist = "SELECT * FROM `cart` WHERE customerID=(SELECT customerID FROM customer WHERE email='".$_SESSION["email"]."')";
			$result = mysqli_query($con,$queryexist) or die(mysql_error());
			$rows = mysqli_fetch_array($result);
			$customerID = $rows['customerID'];
			$cart_id = $rows['cart_id'];
			$productName = stripslashes($_REQUEST['productName']);
			$productName = mysqli_real_escape_string($con,$productName);
			$subtotal = $_REQUEST['subtotal'];
			$productID = $_REQUEST['productID'];
			$newquantity = $_REQUEST['newquantityss'];
			$Product_Qty = $_REQUEST['Product_Qty'];
			$productPrice_unit = $_REQUEST['productPrice_unit'];
			$Product_Qty=$newquantity;
			$subtotal = $productPrice_unit * $Product_Qty;
			$query = ("UPDATE cart_details SET Product_Qty='$Product_Qty',subtotal='$subtotal' WHERE cart_id='$cart_id' AND productID='$productID'");
			$result = mysqli_query($con,$query);
			if ($result){
				$totalquery = ("SELECT SUM(subtotal) FROM `cart_details` WHERE cart_id='".$cart_id."'");
				$resulttotalquery = mysqli_query($con,$totalquery) or die(mysql_error());
				$rows = mysqli_fetch_array($resulttotalquery);
				$total = $rows['SUM(subtotal)'];
				$query = ("UPDATE cart SET total='$total' WHERE cart_id='$cart_id' AND customerID='$customerID'");
				$result = mysqli_query($con,$query);
				if($result){
				}else{
				echo '3p';
				}
			}
		}else if(isset($_POST['newquantitysb'])){
			$sname = $_REQUEST['name'];
			$saddress = stripslashes($_REQUEST['address']);
			$saddress = mysqli_real_escape_string($con,$saddress);
			$sphone = $_REQUEST['phone'];
			$smphone = $_REQUEST['mphone'];
			$bname = $_REQUEST['bname'];
			$baddress1 = $_REQUEST['baddress1'];
			$baddress2 = $_REQUEST['baddress2'];
			$bzip = $_REQUEST['bzip'];
			$bregion = $_REQUEST['bregion'];
			$bcountry = $_REQUEST['bcountry'];
			if($_REQUEST['baddress2']==''){
				$baddress = ''.$baddress1.', '.$bzip.','.$bregion.','.$bcountry.'';
			}else{
				$baddress = ''.$baddress1.', '.$baddress2.', '.$bzip.','.$bregion.','.$bcountry.'';
			}
			$bphone = $_REQUEST['bphone'];
			$bmphone = $_REQUEST['bmphone'];
			$queryexist = "SELECT * FROM `cart` WHERE customerID=(SELECT customerID FROM customer WHERE email='".$_SESSION["email"]."')";
			$result = mysqli_query($con,$queryexist) or die(mysql_error());
			$rows = mysqli_fetch_array($result);
			$customerID = $rows['customerID'];
			$cart_id = $rows['cart_id'];
			$productName = stripslashes($_REQUEST['productName']);
			$productName = mysqli_real_escape_string($con,$productName);
			$subtotal = $_REQUEST['subtotal'];
			$productID = $_REQUEST['productID'];
			$newquantity = $_REQUEST['newquantitysb'];
			$Product_Qty = $_REQUEST['Product_Qty'];
			$productPrice_unit = $_REQUEST['productPrice_unit'];
			$Product_Qty=$newquantity;
			$subtotal = $productPrice_unit * $Product_Qty;
			$query = ("UPDATE cart_details SET Product_Qty='$Product_Qty',subtotal='$subtotal' WHERE cart_id='$cart_id' AND productID='$productID'");
			$result = mysqli_query($con,$query);
			if ($result){
				$totalquery = ("SELECT SUM(subtotal) FROM `cart_details` WHERE cart_id='".$cart_id."'");
				$resulttotalquery = mysqli_query($con,$totalquery) or die(mysql_error());
				$rows = mysqli_fetch_array($resulttotalquery);
				$total = $rows['SUM(subtotal)'];
				$query = ("UPDATE cart SET total='$total' WHERE cart_id='$cart_id' AND customerID='$customerID'");
				$result = mysqli_query($con,$query);
				if($result){
				}else{
				echo '3p';
				}
			}
		}else if(isset($_POST['newquantityee'])){
			$sname = $_REQUEST['name'];
			$saddress1 = $_REQUEST['address1'];
			$saddress2 = $_REQUEST['address2'];
			$szip = $_REQUEST['zip'];
			$sregion = $_REQUEST['region'];
			$scountry = $_REQUEST['country'];
			$sphone = $_REQUEST['phone'];
			$smphone = $_REQUEST['mphone'];
			$bname = $_REQUEST['bname'];
			$baddress1 = $_REQUEST['baddress1'];
			$baddress2 = $_REQUEST['baddress2'];
			$bzip = $_REQUEST['bzip'];
			$bregion = $_REQUEST['bregion'];
			$bcountry = $_REQUEST['bcountry'];
			if($_REQUEST['address2']==''){
				$saddress = ''.$saddress1.', '.$szip.','.$sregion.','.$sountry.'';
			}else{
				$saddress = ''.$saddress1.', '.$saddress2.', '.$szip.','.$sregion.','.$scountry.'';
			}
			if($_REQUEST['baddress2']==''){
				$baddress = ''.$baddress1.', '.$bzip.','.$bregion.','.$bcountry.'';
			}else{
				$baddress = ''.$baddress1.', '.$baddress2.', '.$bzip.','.$bregion.','.$bcountry.'';
			}
			$bphone = $_REQUEST['bphone'];
			$bmphone = $_REQUEST['bmphone'];
			$queryexist = "SELECT * FROM `cart` WHERE customerID=(SELECT customerID FROM customer WHERE email='".$_SESSION["email"]."')";
			$result = mysqli_query($con,$queryexist) or die(mysql_error());
			$rows = mysqli_fetch_array($result);
			$customerID = $rows['customerID'];
			$cart_id = $rows['cart_id'];
			$productName = stripslashes($_REQUEST['productName']);
			$productName = mysqli_real_escape_string($con,$productName);
			$subtotal = $_REQUEST['subtotal'];
			$productID = $_REQUEST['productID'];
			$newquantity = $_REQUEST['newquantityee'];
			$Product_Qty = $_REQUEST['Product_Qty'];
			$productPrice_unit = $_REQUEST['productPrice_unit'];
			$Product_Qty=$newquantity;
			$subtotal = $productPrice_unit * $Product_Qty;
			$query = ("UPDATE cart_details SET Product_Qty='$Product_Qty',subtotal='$subtotal' WHERE cart_id='$cart_id' AND productID='$productID'");
			$result = mysqli_query($con,$query);
			if ($result){
				$totalquery = ("SELECT SUM(subtotal) FROM `cart_details` WHERE cart_id='".$cart_id."'");
				$resulttotalquery = mysqli_query($con,$totalquery) or die(mysql_error());
				$rows = mysqli_fetch_array($resulttotalquery);
				$total = $rows['SUM(subtotal)'];
				$query = ("UPDATE cart SET total='$total' WHERE cart_id='$cart_id' AND customerID='$customerID'");
				$result = mysqli_query($con,$query);
				if($result){
				}else{
				echo '3p';
				}
			}
	}
	}
?>
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
            height: 130px;
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

/* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
	width: 502px;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
	width: 250px;
	height: 130px;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
}
/* Style the tab */
div.tabaddress {
    overflow: hidden;
    border: none;
    background-color: #f1f1f1;
    width: 274px;
}

/* Style the buttons inside the tab */
div.tabaddress button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    transition: 0.3s;
    font-size: 14px;
    width: 137px;
	height: 28px;
	
}

/* Change background color of buttons on hover */
div.tabaddress button:hover {
    background-color: rgba(181,113,114,1.00);
	color:rgba(204,203,204,1.00);
}

/* Create an active/current tablink class */
div.tabaddress button.active {
    background-color: rgba(150,73,74,0.81);
	color:rgba(204,203,204,1.00);
}

/* Style the tab content */
.tabaddcontent {
    display: none;
    padding: 0px 5px;
    border: none;
    border-top: none;
    width: 334px;
    -webkit-animation: fadeEffect 1s;
    animation: fadeEffect 1s;
}
/* Fade in tabs */
@-webkit-keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
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
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width:85%">
      Process: Payment
    </div>
  </div>
					</div>
					<div class="col-sm-8">
						<div class="review-payment">
				<h2>Payment Method</h2>
			</div>	
			<div class="tab" style="border-radius: 5px;">
  <button class="tablinks" onclick="openCity(event, 'cashondelivery')"><center><p style="text-align: top">Cash On Delivery</p><p style="line-height: 200%;"></p><img height="40px" weight="40px" src="images/cashondelivery.png" /><p style="line-height: 200%;"></p></center></button>
  <button class="tablinks" onclick="openCity(event, 'paypal')"><center><p style="text-align: top">Paypal</p><p style="line-height: 200%;"></p><img height="40px" weight="40px" src="images/paypal.png" /><p style="line-height: 200%;"></p></center></button>
</div>

<div id="cashondelivery" class="tabcontent" style="border-radius: 5px;">
  <p>You can pay in cash to our courier when you receive the goods at your doorstep.</p>
  <br/>
  <?php
		echo '
		<form action="paymentchoosen.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="name" value="'.$sname.'" />
		<input type="hidden" name="address" value="'.$saddress.'" />
		<input type="hidden" name="phone" value="'.$sphone.'" />
		<input type="hidden" name="mphone" value="'.$smphone.'" />
		<input type="hidden" name="bname" value="'.$bname.'" />
		<input type="hidden" name="baddress" value="'.$baddress.'" />
		<input type="hidden" name="bphone" value="'.$bphone.'" />
		<input type="hidden" name="bmphone" value="'.$bmphone.'" />'; ?>
  <button type="submit" style="background-color: red;color: white; " name="cashondelivery" class="btn btn-default add-to-cart"><i class="fa fa-lock"></i>&nbsp;PLACE YOUR ORDER</button></form>
</div>

<div id="paypal" class="tabcontent" style="border-radius: 5px;">
  <p>You can pay using your paypal account.</p><br/>
  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_xclick" />
  <input type="hidden" name="upload" value="1" />
  <input type="hidden" name="business" value="aifanshahran@icloud.com" />
  <input type="hidden" name="currency_code" value="MYR" />
  <?php
  require_once('db.php');
	  	$totalpaypal = 0;
		$query = "SELECT p.productID, p.photoProduct_name, p.productName, p.productPrice_unit, d.Product_Qty, d.subtotal FROM product p, cart_details d, cart c, customer cu WHERE p.productID=d.productID AND cu.customerID=c.customerID AND d.cart_id=c.cart_id AND c.customerID IN (SELECT customerID FROM cart WHERE customerID = (SELECT customerID FROM customer WHERE email='".$_SESSION["email"]."'))";
		$result = mysqli_query($con,$query) or die(mysql_error());
		if($result){
			while ($rows = mysqli_fetch_array($result)){
				echo '<tr>
		<input type="hidden" name="item_number" value="'.$rows['productID'].'" />
		<input type="hidden" name="item_name" value="'.$rows['productName'].'" />
		<input type="hidden" name="quantity" value="'.$rows['Product_Qty'].'" />';
		$totalpaypal = $totalpaypal + ($rows['productPrice_unit']);
		$shipping = $totalpaypal * $rows['Product_Qty']; }
		}
	  echo '<input type="hidden" name="amount" value="'.$totalpaypal.'">';
	  $tax = $totalpaypal * 0.06;
	  	if($shipping<99){
			echo '<input type="hidden" name="shipping" value="10.60" />';
		}
	?>
  <input type="hidden" name="tax" value="<?php echo sprintf('%0.2f', $tax) ?>">
  <input type="hidden" name="currency_code" value="MYR">
  <button type="submit" style="background-color: red;color: white; " name="submit" value="Pay with PayPal" class="btn btn-default add-to-cart"><i class="fa fa-lock"></i>&nbsp;PLACE YOUR ORDER</button>
</form>
</div>
</div>
<div class="col-sm-4">
				<div class="sub">
					<div class="panel-body" style="background:rgba(221,221,221,0.89);border-radius: 5px;">
						<div class="order-message">
							<p class="alignleft">Shipping &amp; Billing Address</p>
							<a href="checkout.php" class="alignright">Edit</a>
							<div style="clear: both;"></div>
							</div>
							<hr>
						<div class="tabaddress">
  <button class="tablinksb" onclick="openAddress(event, 'Shipping')" id="defaultOpen">Shipping Address</button>
  <button class="tablinksb" onclick="openAddress(event, 'Billing')">Billing Address</button>
						</div> 

<div id="Shipping" class="tabaddcontent">
  <span style="color: rgba(90,90,90,1.00)"><p><?php echo '<p style="line-height: 200%;"></p>', '<b>',$sname, '</b>','<p style="line-height: 200%;"></p>', $saddress; if($sphone==''){}else{echo '<br/>','Phone Number: ',$sphone;} echo '<br/>Mobile Number: ', $smphone ?><br/><i class="material-icons" style="font-size:16px">&#xe567;</i>Map location saved.</p></span>
</div>

<div id="Billing" class="tabaddcontent">
  <span style="color: rgba(90,90,90,1.00)"><p><?php echo '<p style="line-height: 200%;"></p>', '<b>',$bname, '</b>', '<p style="line-height: 200%;"></p>', $baddress; if($sphone==''){}else{echo '<br/>','Phone Number: ',$sphone;} echo '<br/>Mobile Number: ', $bmphone ?><br/><i class="material-icons" style="font-size:16px">&#xe567;</i>Map location saved.</p></span>
</div>
				</div>
		</div>
				<br/>
				<div id="refresh">
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
	  	$rowscheck = mysqli_num_rows($result);
	  	if ($rowscheck<1){
			echo '<meta http-equiv="refresh" content="0; url=index.php" />';
		}else{
		if($result){
			while ($rows = mysqli_fetch_array($result)){
				echo '<tr>
		<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="productID" value="'.$rows['productID'].'" />
		<input type="hidden" name="productName" value="'.$rows['productName'].'" />
		<input type="hidden" name="Product_Qty" value="'.$rows['Product_Qty'].'" />
		<input type="hidden" name="productPrice_unit" value="'.$rows['productPrice_unit'].'" />
		<input type="hidden" name="subtotal" value="'.$rows['subtotal'].'" />';
						if((isset($_POST['sameshippingsamebilling'])) || (isset($_POST['deletess'])) || (isset($_POST['newquantityss']))){
							echo '
							<input type="hidden" name="name" value="'.$sname.'" />
							<input type="hidden" name="address" value="'.$saddress.'" />
							<input type="hidden" name="phone" value="'.$sphone.'" />
							<input type="hidden" name="mphone" value="'.$smphone.'" />
							<input type="hidden" name="bname" value="'.$bname.'" />
							<input type="hidden" name="baddress" value="'.$baddress.'" />
							<input type="hidden" name="bphone" value="'.$bphone.'" />
							<input type="hidden" name="bmphone" value="'.$bmphone.'" />
							<td height="65" style="width:49%">'.$rows['productName'].'</td>
							<td height="65" style="width:18.5%;text-align: center;">
							<select type="text" onchange="this.form.submit()" name="newquantityss" style="text-indent: 35%; width: 40px; -webkit-appearance: none; -moz-appearance: none; text-overflow: "";">';	
						}else if((isset($_POST['sameshippingdifferentbilling']))  || (isset($_POST['deletesb'])) || (isset($_POST['newquantitysb']))){
							echo '
							<input type="hidden" name="name" value="'.$sname.'" />
							<input type="hidden" name="address" value="'.$saddress.'" />
							<input type="hidden" name="phone" value="'.$sphone.'" />
							<input type="hidden" name="mphone" value="'.$smphone.'" />
							<input type="hidden" name="bname" value="'.$bname.'" />
							<input type="hidden" name="baddress1" value="'.$baddress1.'" />
							<input type="hidden" name="baddress2" value="'.$baddress2.'" />
							<input type="hidden" name="bzip" value="'.$bzip.'" />
							<input type="hidden" name="bregion" value="'.$bregion.'" />
							<input type="hidden" name="bcountry" value="'.$bcountry.'" />
							<input type="hidden" name="bphone" value="'.$bphone.'" />
							<input type="hidden" name="bmphone" value="'.$bmphone.'" />
							<td height="65" style="width:49%">'.$rows['productName'].'</td>
							<td height="65" style="width:18.5%;text-align: center;">
							<select type="text" onchange="this.form.submit()" name="newquantitysb" style="text-indent: 35%; width: 40px; -webkit-appearance: none; -moz-appearance: none; text-overflow: "";">';
						}else{
							echo '
							<input type="hidden" name="name" value="'.$sname.'" />
							<input type="hidden" name="address1" value="'.$saddress1.'" />
							<input type="hidden" name="address2" value="'.$saddress2.'" />
							<input type="hidden" name="zip" value="'.$szip.'" />
							<input type="hidden" name="region" value="'.$sregion.'" />
							<input type="hidden" name="country" value="'.$scountry.'" />
							<input type="hidden" name="phone" value="'.$sphone.'" />
							<input type="hidden" name="mphone" value="'.$smphone.'" />
							<input type="hidden" name="bname" value="'.$bname.'" />
							<input type="hidden" name="baddress1" value="'.$baddress1.'" />
							<input type="hidden" name="baddress2" value="'.$baddress2.'" />
							<input type="hidden" name="bzip" value="'.$bzip.'" />
							<input type="hidden" name="bregion" value="'.$bregion.'" />
							<input type="hidden" name="bcountry" value="'.$bcountry.'" />
							<input type="hidden" name="bphone" value="'.$bphone.'" />
							<input type="hidden" name="bmphone" value="'.$bmphone.'" />
							<td height="65" style="width:49%">'.$rows['productName'].'</td>
							<td height="65" style="width:18.5%;text-align: center;">
							<select type="text" onchange="this.form.submit()" name="newquantityee" style="text-indent: 35%; width: 40px; -webkit-appearance: none; -moz-appearance: none; text-overflow: "";">';
						}
			for($i=1;$i<6;$i++){
			if ($i==($rows['Product_Qty'])){
			echo '<option value="'.$i.'" selected>'.$i.'</option>';	
			}else{
			echo '<option value="'.$i.'">'.$i.'</option>';}
		}
				echo '</select>';
				if((isset($_POST['sameshippingsamebilling'])) || (isset($_POST['deletess'])) || (isset($_POST['newquantityss']))){
							echo '<br/><button type="submit" name="deletess" style="background-color: Transparent;background-repeat:no-repeat;border:none;cursor:pointer;overflow: hidden;outline:none;color:red;" title="Delete this item" data-toggle="tooltip" title="Delete this item">Delete</button>
        					</button>';
						}else if((isset($_POST['sameshippingdifferentbilling']))  || (isset($_POST['deletesb'])) || (isset($_POST['newquantitysb']))){
							echo '<br/><button type="submit" name="deletesb" style="background-color: Transparent;background-repeat:no-repeat;border:none;cursor:pointer;overflow: hidden;outline:none;color:red;" title="Delete this item" data-toggle="tooltip" title="Delete this item">Delete</button>
        					</button>';
						}else{
							echo '<br/><button type="submit" name="deleteee" style="background-color: Transparent;background-repeat:no-repeat;border:none;cursor:pointer;overflow: hidden;outline:none;color:red;" title="Delete this item" data-toggle="tooltip" title="Delete this item">Delete</button>
        					</button>';
						}
		 echo'</form></td>
        <td height="65" style="width:32.5%;text-align: center;">RM '.sprintf('%0.2f', $rows['subtotal']).'</td>
    </tr>';
			}
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
						<div style="clear: both;"></div>';
						if($subtotal>99){
							echo '<p style="color: green" class="alignleft">Shipping fee:</p>
						<p style="color: green" class="alignright" >Free</p>
						<div style="clear: both;"></div>';
						}else{
							echo '<p style="color: green" class="alignleft">Shipping fee:</p>
						<p style="color: green" class="alignright" >RM 10.60</p>
						<div style="clear: both;"></div>';
						$total = $total + 10.60;
						}
						echo '<hr>
						<p class="alignleft">Total:</p>
						<p class="alignright">RM '.sprintf('%0.2f', $total).'</p>
						<div style="clear: both;"></div>
					</div>	
						</div>';
					?>
					<br/>				
				</div>
		</div>
</div>
				</div>
</div>
		</div>
		</div>
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
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
   <script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
 <script>
  function openAddress(evt, addressType) {
    var i, tabcontentb, tablinksb;
    tabcontentb = document.getElementsByClassName("tabaddcontent");
    for (i = 0; i < tabcontentb.length; i++) {
        tabcontentb[i].style.display = "none";
    }
    tablinksb = document.getElementsByClassName("tablinksb");
    for (i = 0; i < tablinksb.length; i++) {
        tablinksb[i].className = tablinksb[i].className.replace(" active", "");
    }
    document.getElementById(addressType).style.display = "block";
    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
</script>
    
</body>
</html>