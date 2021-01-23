<?php
require('db.php');
session_start();
	if(isset($_POST['cashondelivery'])){
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
		$searching = "SELECT * FROM `orders` where customerID=$customerID";
		$resultsearching = mysqli_query($con,$searching) or die(mysql_error());
		$rows = mysqli_num_rows($resultsearching);
		$rows++;
		$invoiceNo = date("mYd").$rows.$customerID;
		$insertorder = "INSERT into `orders` (customerID, invoiceNo, order_date, paystatus, shippingStatus, sname, bname, billingAddress, shippingAddress) VALUES ($customerID, '$invoiceNo', '".date("Y/m/d")."', 'Cash On Delivery','In Process', '$sname', '$bname', '$baddress', '$saddress')";
		$resultinsertorder = mysqli_query($con,$insertorder);
		if($resultinsertorder){
			$getorderid = "SELECT order_ID FROM `orders` where customerID=$customerID AND invoiceNo=$invoiceNo";
			$resultgetorderid = mysqli_query($con,$getorderid) or die(mysql_error());
			$rows = mysqli_fetch_array($resultgetorderid);
			$orderID = $rows['order_ID'];
			$query = "SELECT p.productID, p.photoProduct_name, p.productName, p.productPrice_unit, c.cart_id, d.Product_Qty, d.subtotal FROM product p, cart_details d, cart c, customer cu WHERE p.productID=d.productID AND cu.customerID=c.customerID AND d.cart_id=c.cart_id AND c.customerID IN (SELECT customerID FROM cart WHERE customerID = (SELECT customerID FROM customer WHERE customerID=$customerID))";
			$result = mysqli_query($con,$query) or die(mysql_error());
			if($result){
				while ($rows = mysqli_fetch_array($result)){
					$insertproductorder = "INSERT into `orders_details` (order_ID, productID, product_qty, total, subtotal) VALUES ($orderID, ".$rows['productID'].", ".$rows['Product_Qty'].", '".$rows['subtotal']."', '".$rows['subtotal']/$rows['Product_Qty']."')";
					$resultinsertproductorder = mysqli_query($con,$insertproductorder);
					$queryselectquantityproduct = "SELECT productQuantity FROM `product` WHERE productID=".$rows['productID']."";
					$resultproductquantity = mysqli_query($con,$queryselectquantityproduct);
					$rowsproductquantity = mysqli_fetch_array($resultproductquantity);
					$oldproductquantity = $rowsproductquantity['productQuantity'];
					$newproductquantity = $oldproductquantity-$rows['Product_Qty'];
					$queryquantityproduct = "UPDATE product SET productQuantity=$newproductquantity WHERE productID=".$rows['productID']."";
					mysqli_query($con,$queryquantityproduct);
					$querydeletecart = ("DELETE FROM `cart_details` WHERE `cart_details`.`productID` = ".$rows['productID']." AND `cart_details`.`cart_id` = ".$rows['cart_id']."");
					mysqli_query($con,$querydeletecart);
					$cartID=$rows['cart_id'];
				}
				$totalquery = ("SELECT SUM(total) FROM `orders_details` WHERE order_ID=".$orderID."");
				$resulttotalquery = mysqli_query($con,$totalquery) or die(mysql_error());
				$rowstotal = mysqli_fetch_array($resulttotalquery);
				if($rowstotal['SUM(total)']>100){
					$total = $rowstotal['SUM(total)']+(($rowstotal['SUM(total)']/100)*6);
					$query = ("UPDATE orders SET totalproductorder='$total' WHERE order_ID=".$orderID." AND customerID=$customerID");
					mysqli_query($con,$query);
				}else{
					$total = $rowstotal['SUM(total)']+(($rowstotal['SUM(total)']/100)*6)+10.60;
					$query = ("UPDATE orders SET totalproductorder='$total' WHERE order_ID=".$orderID." AND customerID=$customerID");
					mysqli_query($con,$query);
				}
				$deletecarttotal = ("UPDATE `cart` SET `total`= NULL WHERE cart_id=$cartID AND customerID=$customerID");
				mysqli_query($con,$deletecarttotal);
				header("location: orderreceived.php?invoiceNo=$invoiceNo");
			}
		}else{echo 'TAK MASUK OII';}
		
	}else{
		echo 'AWAI2 TAK MASUK DAH';}
		?>