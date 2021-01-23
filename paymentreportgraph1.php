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
	$query = "SELECT SUM(productQuantity) AS duck FROM product WHERE productBrand='dUCk'";
	$result = mysqli_query($con, $query) or die(mysqli_error());
	$sum = mysqli_fetch_array($result);
	$rowsduck = $sum['duck'];
	$query2 = "SELECT SUM(productQuantity) AS Naelofar FROM product WHERE productBrand='Naelofar'";
	$result2 = mysqli_query($con, $query2) or die(mysqli_error());
	$sum2 = mysqli_fetch_array($result2);
	$rowsnaelofar = $sum2['Naelofar'];
	$query3 = "SELECT SUM(productQuantity) AS Cakenis FROM product WHERE productBrand='Cakenis'";
	$result3 = mysqli_query($con, $query3) or die(mysqli_error());
	$sum3 = mysqli_fetch_array($result3);
	$rowscakenis = $sum3['Cakenis'];
	$query4 = "SELECT SUM(productQuantity) AS CLOVERUSH FROM product WHERE productBrand='CLOVERUSH'";
	$result4 = mysqli_query($con, $query4) or die(mysqli_error());
	$sum4 = mysqli_fetch_array($result4);
	$rowscloverush = $sum4['CLOVERUSH'];;
?>
<body>
		<div class="header-middle"><!--header-middle-->
			<div class="container">
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
					</div>
				</div>
			</div>
            <section>
				<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">  
                	<center><h2>Availability of the Brands</h2></center>
                  	<center><div id="chartdiv" style="width:90%; height:400px;"></div></center><br/>
                    <br/>
                    <br/>
                        <center>
							<a href="paymentreport.php"><img border="0" height="50" src="images/blog/back.png" width="50" /></a></center>
					</div><!--/blog-post-area-->
				</div>
				</div>
	</section>

	
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
    <script src="js/pie.js" type="text/javascript"></script>
    <script>
            var chart;
            var legend;

            var chartData = [
                {
                    "country": "Naelofar Hijab",
                    "value": "<?php echo $rowsnaelofar ?>"
                },
                {
                    "country": "Cloverush",
                    "value": "<?php echo $rowscloverush ?>"
                },
                {
                    "country": "Cakenis",
                    "value": "<?php echo $rowscakenis ?>"
                },
				{
                    "country": "Duck Scarves",
                    "value": "<?php echo $rowsduck ?>"
                }
            ];

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartData;
                chart.titleField = "country";
                chart.valueField = "value";
                chart.outlineColor = "#FFFFFF";
                chart.outlineAlpha = 0.8;
                chart.outlineThickness = 2;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // this makes the chart 3D
                chart.depth3D = 15;
                chart.angle = 30;

                // WRITE
                chart.write("chartdiv");
            });
        </script>
</body>
</html>