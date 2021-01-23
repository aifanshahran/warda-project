<?php
require('db.php');
session_start();
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
		$createorder = "INSERT into `orders` (customerID) VALUES ($customerID)";
		$result = mysqli_query($con,$createorder);
		if($result){
			$selectID = "SELECT order_id FROM `orders` WHERE customerID='".$customerID."'";
			$result = mysqli_query($con,$selectID) or die(mysql_error());
			if($result){
			$rows = mysqli_fetch_array($result);
			$order_id = $rows['order_id'];
			echo $order_id;
			$query = "UPDATE `orders` SET shippingAddress='".$saddress."', billingAddress='".$baddress."' WHERE order_id='".$order_id."' AND customerID=".$customerID."";
			$result = mysqli_query($con,$query) or die(mysql_error());
				if($result){
					
				}else{
					echo 'Sorry, the server can\'t update your shipping address and billing address. Please try again';
				}
			}else{
				echo 'We couldn\'t find your customerID. Please shut down the browser and login back :)';
			}
		}else{
			echo 'Oppsss! Something wrong to connect between you and our database. Please call our customer service. Thank you.';
		}
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
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
			$baddress = ''.$baddress1.', '.$bzip.', '.$bregion.', '.$bcountry.'';
		}else{
			$baddress = ''.$baddress1.', '.$baddress2.', '.$bzip.', '.$bregion.', '.$bcountry.'';
		}
		$bphone = $_REQUEST['bphone'];
		$bmphone = $_REQUEST['bmphone'];
		echo $sname, '<br/>', $saddress, '<br/>', $sphone, '<br/>', $smphone, $bname, '<br/>', $baddress, '<br/>', $bphone, '<br/>', $bmphone;
	}else{
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
			$saddress = ''.$saddress1.', '.$szip.', '.$sregion.', '.$sountry.'';
		}else{
			$saddress = ''.$saddress1.', '.$saddress2.', '.$szip.', '.$sregion.', '.$scountry.'';
		}
		if($_REQUEST['baddress2']==''){
			$baddress = ''.$baddress1.', '.$bzip.', '.$bregion.', '.$bcountry.'';
		}else{
			$baddress = ''.$baddress1.', '.$baddress2.', '.$bzip.', '.$bregion.', '.$bcountry.'';
		}
		$bphone = $_REQUEST['bphone'];
		$bmphone = $_REQUEST['bmphone'];
		echo 'differentshippingdifferentbilling', $sname, '<br/>', $saddress, '<br/>', $sphone, '<br/>', $smphone, $bname, '<br/>', $baddress, '<br/>', $bphone, '<br/>', $bmphone;
	}
?>
