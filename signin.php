<?php
require('db.php');
session_start();
	$statusY = "Y";
	$statusN = "N";
		$email = stripslashes($_REQUEST['email']);
        //escapes special characters in a string
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		//Checking is user existing in the database or not
        $query = "SELECT * FROM `customer` WHERE email='$email'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
			$rows = mysqli_fetch_array($result);
			if($rows['customerStatus']==$statusN){
				echo "<div class=\"alert alert-danger\"><strong>Activate your account first!</strong> Please activate your account first</div>";
			}else{
			$_SESSION['email'] = $email;
			echo "Success";
}
         }else{
			echo "<div class=\"alert alert-danger\"> <strong>Email/password is incorrect.</strong> <a href=\"\">Forgot password?</a> </div>";
	}
?>