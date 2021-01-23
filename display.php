<?php
	$query = "SELECT * FROM `customer` WHERE email = '".$_SESSION['email']."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_fetch_array($result);
		$id = $rows['customerID'];
		$name = $rows['name'];
		$email = $rows['email'];
		$dateOf_Birth = $rows['dateOf_birth'];
		$gender = $rows['gender'];
	if($gender==NULL){
		$gender = 'Not specified';
	}else{
		$gender = $rows['gender'];
	}
		$photo_name = $rows['photo_name'];
    if($rows['photo_name'] == NULL)
    {
        $file = "uploads/defaultimg.png";
    }
    else
    {
        $file = "uploads/".$rows['photo_name'];
    }
	if($rows['address']!=NULL){
		$address = str_replace(", ",", <br  />", $rows['address']);
		$address = str_replace(",",", ", $address);
		$address = ucwords(strtoupper($address));
	}else{
		$address = 'Not specified';
	}
	?>