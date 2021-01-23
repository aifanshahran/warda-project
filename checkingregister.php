<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
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

<body>
<?php
	require('db.php');
	require_once 'class.user.php';
// If form submitted, insert values into the database.
	$reg_user = new USER();
		if (isset($_REQUEST['name'])){
        // removes backslashes
		$name = stripslashes($_REQUEST['name']);
        //escapes special characters in a string
		$name = mysqli_real_escape_string($con,$name); 
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$check = "SELECT * FROM `customer` WHERE email='$email'";
		$resultcheck = mysqli_query($con,$check);
		$rowscheck = mysqli_num_rows($resultcheck);
			if($rowscheck>0){
				header('location: register.php?v=Email exists. Please Log in.');
			}else{
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		$dateOf_birth = $_POST['dateOf_birth'];
		$code = md5(uniqid(rand()));
        $query = ("INSERT into `customer` (name, password, email, dateOf_birth, code)
VALUES ('$name', '".md5($password)."', '$email', '$dateOf_birth', '$code')");
        $result = mysqli_query($con,$query);
				
        if($result){
			$query = "SELECT email FROM `customer` WHERE email='$email'";
			$result = mysqli_query($con,$query) or die(mysql_error());
			$rows = mysqli_fetch_array($result);
			$email = $rows['email'];
			
			$message = '<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style type="text/css" media="screen">

    /* Force Hotmail to display emails at full width */
    .ExternalClass {
      display: block !important;
      width: 100%;
    }

    /* Force Hotmail to display normal line spacing */
    .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
      line-height: 100%;
    }

    body,
    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      margin: 0;
      padding: 0;
    }

    body,
    p,
    td {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 15px;
      color: #;
      line-height: 1.5em;
    }

    h1 {
      font-size: 24px;
      font-weight: normal;
      line-height: 24px;
    }

    body,
    p {
      margin-bottom: 0;
      -webkit-text-size-adjust: none;
      -ms-text-size-adjust: none;
    }

    img {
      outline: none;
      text-decoration: none;
      -ms-interpolation-mode: bicubic;
    }

    a img {
      border: none;
    }

    .background {
      background-color: #333333;
    }

    table.background {
      margin: 0;
      padding: 0;
      width: 100% !important;
    }

    .block-img {
      display: block;
      line-height: 0;
    }

    a {
      color: white;
      text-decoration: none;
    }

    a,
    a:link {
      color: #2A5DB0;
      text-decoration: underline;
    }

    table td {
      border-collapse: collapse;
    }

    td {
      vertical-align: top;
      text-align: left;
    }

    .wrap {
      width: 600px;
    }

    .wrap-cell {
      padding-top: 30px;
      padding-bottom: 30px;
    }

    .header-cell,
    .body-cell,
    .footer-cell {
      padding-left: 20px;
      padding-right: 20px;
    }

    .header-cell {
      background-color: #FF3333;
      font-size: 24px;
      color: #ffffff;
	  align-content: center;
    }

    .body-cell {
      background-color: #ffffff;
      padding-top: 30px;
      padding-bottom: 34px;
    }

    .footer-cell {
      background-color: #FF3333;
      text-align: center;
      font-size: 13px;
      padding-top: 30px;
      padding-bottom: 30px;
    }

    .card {
      width: 400px;
      margin: 0 auto;
    }

    .data-heading {
      text-align: right;
      padding: 10px;
      background-color: #ffffff;
      font-weight: bold;
    }

    .data-value {
      text-align: left;
      padding: 10px;
      background-color: #ffffff;
    }

    .force-full-width {
      width: 100% !important;
    }

  </style>
  <style type="text/css" media="only screen and (max-width: 600px)">
    @media only screen and (max-width: 600px) {
      body[class*="background"],
      table[class*="background"],
      td[class*="background"] {
        background: #eeeeee !important;
      }

      table[class="card"] {
        width: auto !important;
      }

      td[class="data-heading"],
      td[class="data-value"] {
        display: block !important;
      }

      td[class="data-heading"] {
        text-align: left !important;
        padding: 10px 10px 0;
      }

      table[class="wrap"] {
        width: 100% !important;
      }

      td[class="wrap-cell"] {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
      }
    }
  </style>
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor="" class="background">
  <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" class="background">
    <tr>
      <td align="center" valign="top" width="100%" class="background">
        <center>
          <table cellpadding="0" cellspacing="0" width="600" class="wrap">
            <tr>
              <td valign="top" class="wrap-cell" style="padding-top:30px; padding-bottom:30px;">
                <table cellpadding="0" cellspacing="0" class="force-full-width">
                  <tr>
                   <td height="60" valign="top" class="header-cell" >
                      <center><img width="199" height="201" src="images/home/logo.png" alt="logo"> </center>
                    </td>
                  </tr>
                  <tr>
                    <td valign="top" class="body-cell">

                      <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
                        <tr>
                          <td valign="top" style="padding-bottom:15px; background-color:#ffffff;">
                            <h1>Welcome to Chicrush</h1>
                          </td>
                        </tr>
                        <tr>
                          <td valign="top" style="padding-bottom:20px; background-color:#ffffff;">
                            <b>Hey '.$name.', thanks for signing up!</b><br>
                            We\'re really excited for you to join our community! You\'re just one click away from activate your account.
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
                              <tr>
                                <td style="width:200px;background:#008000;">
                                  <div>
                                        <a href="http://192.168.64.2/WardaHadfina/verify.php?email='.$email.'&code='.$code.'"
                                  style="background-color:#FF3333;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:18px;line-height:40px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;">Activate Account</a></div>
                                </td>
                                <td width="360" style="background-color:#ffffff; font-size:0; line-height:0;">&nbsp;</td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td style="padding-top:20px;background-color:#ffffff;">
                            Thank you so much,<br>
                            Your Chicrush team
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td valign="top" class="footer-cell" style="color: #FFFFFF
                     ">
                      WardaHadfina Parlour<br>
                      
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </center>
      </td>
    </tr>
  </table>

</body>
</html>';
						
			$subject = "Chicrush Register Confirmation";
						
			$reg_user->send_mail($email,$message,$subject);	
			
            echo ('<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                            	<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
								<li><a href="register.php" class="active"><i class="fa fa-lock" class="active"></i> Login</a></li>
							</ul>
						</div>
		</div><!--/header-middle-->
	
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
						<h2>You\'re success.</h2>
                        </div>
					</div>');
        }
		}
    }else{
		header("Location: register.php");
		
		}
?>
<script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>