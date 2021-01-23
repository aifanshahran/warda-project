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
	<?php 
	$query = "SELECT COUNT(gender) AS Male FROM `customer` WHERE gender='Male'";
	$result = mysqli_query($con, $query) or die(mysqli_error());
	$gendermale = mysqli_fetch_array($result);
	$male = $gendermale['Male'];
	$queryF = "SELECT COUNT(gender) AS Female FROM `customer` WHERE gender='Female'";
	$resultF = mysqli_query($con, $queryF) or die(mysqli_error());
	$genderfemale = mysqli_fetch_array($resultF);
	$female = $genderfemale['Female'];
	$queryN = "SELECT gender FROM `customer` WHERE gender IS NULL";
	$resultN = mysqli_query($con, $queryN) or die(mysqli_error());
	$notspecified = mysqli_num_rows($resultN);
	$querya = "SELECT COUNT(gender) AS gender FROM `customer`";
	$resulta = mysqli_query($con, $querya) or die(mysqli_error());
	$gendera = mysqli_fetch_array($resulta);
	$total = $gendera['gender'];
	?>
	<body>
		<div class="header-middle"><!--header-middle-->
			<div class="container">
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
					</div>
				</div>
			</div>
						</div>
            <section>
				<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">  
                	<center><h2>Gender Statistics</h2></center>
                  	<center><div id="chartdiv" style="width:90%; height:500px;"></div></center></br>
                    </br>
                    </br>
                        <center>
							<a href="paymentreport.php"><img border="0" height="50" src="images/blog/back.png" width="50" /></a></center>
					</div><!--/blog-post-area-->
	</section>

	<style>
#chartdiv {
  width: 100%;
  height: 500px;
}

.amcharts-export-menu-top-right {
  top: 10px;
  right: 0;
}
</style>
<style>
body {
    background-color: #F0E9E9;
	color: #FF3333;
}
</style>
  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script src="js/amcharts.js" type="text/javascript"></script>
    <script src="js/serial.js" type="text/javascript"></script> 
    <script>
var chart = AmCharts.makeChart("chartdiv",
{
    "type": "serial",
    "theme": "light",
    "dataProvider": [{
        "name": "Male",
        "points": "<?php echo $male ?>",
        "color": "rgba(33,125,201,1.00)",
        "bullet": "images/blog/boy.png"
    }, {
        "name": "Female",
        "points": "<?php echo $female ?>",
        "color": "#DB4C3C",
        "bullet": "images/blog/girl.png"
    },
		{
        "name": "Not specified",
        "points": "<?php echo $notspecified ?>",
        "color": "#5A28DC",
        "bullet": "images/blog/specified.png"
    },
					],
    "valueAxes": [{
        "maximum": "<?php echo $total ?>",
        "minimum": 0,
        "axisAlpha": 0,
        "dashLength": 4,
        "position": "left"
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]]</b></span>",
        "bulletOffset": 10,
        "bulletSize": 52,
        "colorField": "color",
        "cornerRadiusTop": 8,
        "customBulletField": "bullet",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "type": "column",
        "valueField": "points"
    }],
    "marginTop": 0,
    "marginRight": 0,
    "marginLeft": 0,
    "marginBottom": 0,
    "autoMargins": false,
    "categoryField": "name",
    "categoryAxis": {
        "axisAlpha": 0,
        "gridAlpha": 0,
        "inside": true,
        "tickLength": 0
    },
    "export": {
    	"enabled": true
     }
});
</script>
</body>
</html>