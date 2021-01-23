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
	$date11 = date('Y-m-d', strtotime('-11 days'));
	$date10 = date('Y-m-d', strtotime('-10 days'));
	$date9 = date('Y-m-d', strtotime('-9 days'));
	$date8 = date('Y-m-d', strtotime('-8 days'));
	$date7 = date('Y-m-d', strtotime('-7 days'));
	$date6 = date('Y-m-d', strtotime('-6 days'));
	$date5 = date('Y-m-d', strtotime('-5 days'));
	$date4 = date('Y-m-d', strtotime('-4 days'));
	$date3 = date('Y-m-d', strtotime('-3 days'));
	$date2 = date('Y-m-d', strtotime('-2 days'));
	$date1 = date('Y-m-d', strtotime('-1 days'));
	$date = date('Y-m-d');
	$query = "SELECT SUM(totalproductorder) AS total FROM orders WHERE order_date='".$date."'";
	$result = mysqli_query($con, $query) or die(mysqli_error());
	$sum = mysqli_fetch_array($result);
	$dateon = $sum['total'];
	$query1 = "SELECT SUM(totalproductorder) AS total FROM orders WHERE order_date='".$date1."'";
	$result1 = mysqli_query($con, $query1) or die(mysqli_error());
	$sum1 = mysqli_fetch_array($result1);
	$dateon1 = $sum1['total'];
	$query2 = "SELECT SUM(totalproductorder) AS total FROM orders WHERE order_date='".$date2."'";
	$result2 = mysqli_query($con, $query2) or die(mysqli_error());
	$sum2 = mysqli_fetch_array($result2);
	$dateon2 = $sum2['total'];
	$query3 = "SELECT SUM(totalproductorder) AS total FROM orders WHERE order_date='".$date3."'";
	$result3 = mysqli_query($con, $query3) or die(mysqli_error());
	$sum3 = mysqli_fetch_array($result3);
	$dateon3 = $sum3['total'];
	$query4 = "SELECT SUM(totalproductorder) AS total FROM orders WHERE order_date='".$date4."'";
	$result4 = mysqli_query($con, $query4) or die(mysqli_error());
	$sum4 = mysqli_fetch_array($result4);
	$dateon4 = $sum4['total'];
	$query5 = "SELECT SUM(totalproductorder) AS total FROM orders WHERE order_date='".$date5."'";
	$result5 = mysqli_query($con, $query5) or die(mysqli_error());
	$sum5 = mysqli_fetch_array($result5);
	$dateon5 = $sum5['total'];
	$query6 = "SELECT SUM(totalproductorder) AS total FROM orders WHERE order_date='".$date6."'";
	$result6 = mysqli_query($con, $query6) or die(mysqli_error());
	$sum6 = mysqli_fetch_array($result6);
	$dateon6 = $sum6['total'];
	$query7 = "SELECT SUM(totalproductorder) AS total FROM orders WHERE order_date='".$date7."'";
	$result7 = mysqli_query($con, $query7) or die(mysqli_error());
	$sum7 = mysqli_fetch_array($result7);
	$dateon7 = $sum7['total'];
	$query8 = "SELECT SUM(totalproductorder) AS total FROM orders WHERE order_date='".$date8."'";
	$result8 = mysqli_query($con, $query8) or die(mysqli_error());
	$sum8 = mysqli_fetch_array($result8);
	$dateon8 = $sum8['total'];
	$query9 = "SELECT SUM(totalproductorder) AS total FROM orders WHERE order_date='".$date9."'";
	$result9 = mysqli_query($con, $query9) or die(mysqli_error());
	$sum9 = mysqli_fetch_array($result9);
	$dateon9 = $sum9['total'];
	$query10 = "SELECT SUM(totalproductorder) AS total FROM orders WHERE order_date='".$date10."'";
	$result10 = mysqli_query($con, $query10) or die(mysqli_error());
	$sum10 = mysqli_fetch_array($result10);
	$dateon10 = $sum10['total'];
	$query11 = "SELECT SUM(totalproductorder) AS total FROM orders WHERE order_date='".$date11."'";
	$result11 = mysqli_query($con, $query11) or die(mysqli_error());
	$sum11 = mysqli_fetch_array($result11);
	$dateon11 = $sum11['total'];
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
                	<center><h2>Data Shows Daily Payment</h2></center>
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
var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "theme": "none",
  "marginRight": 70,
  "dataProvider": [{
    "date": "<?php echo date('d-m-Y', strtotime('-11 days')) ?>",
    "paid": "<?php echo sprintf('%0.2f', $dateon11) ?>",
    "color": "#FF0F00"
  }, {
    "date": "<?php echo date('d-m-Y', strtotime('-10 days')) ?>",
    "paid": "<?php echo sprintf('%0.2f', $dateon10) ?>",
    "color": "#FF6600"
  }, {
    "date": "<?php echo date('d-m-Y', strtotime('-9 days')) ?>",
    "paid": "<?php echo sprintf('%0.2f', $dateon9) ?>",
    "color": "#FF9E01"
  }, {
    "date": "<?php echo date('d-m-Y', strtotime('-8 days')) ?>",
    "paid": "<?php echo sprintf('%0.2f', $dateon8) ?>",
    "color": "#FCD202"
  }, {
    "date": "<?php echo date('d-m-Y', strtotime('-7 days')) ?>",
    "paid": "<?php echo sprintf('%0.2f', $dateon7) ?>",
    "color": "#F8FF01"
  }, {
    "date": "<?php echo date('d-m-Y', strtotime('-6 days')) ?>",
    "paid": "<?php echo sprintf('%0.2f', $dateon6) ?>",
    "color": "#B0DE09"
  }, {
    "date": "<?php echo date('d-m-Y', strtotime('-5 days')) ?>",
    "paid": "<?php echo sprintf('%0.2f', $dateon5) ?>",
    "color": "#04D215"
  }, {
    "date": "<?php echo date('d-m-Y', strtotime('-4 days')) ?>",
    "paid": "<?php echo sprintf('%0.2f', $dateon4) ?>",
    "color": "#0D8ECF"
  }, {
    "date": "<?php echo date('d-m-Y', strtotime('-3 days')) ?>",
    "paid": "<?php echo sprintf('%0.2f', $dateon3) ?>",
    "color": "#0D52D1"
  }, {
    "date": "<?php echo date('d-m-Y', strtotime('-2 days')) ?>",
    "paid": "<?php echo sprintf('%0.2f', $dateon2) ?>",
    "color": "#2A0CD0"
  }, {
    "date": "<?php echo date('d-m-Y', strtotime('-1 days')) ?>",
    "paid": "<?php echo sprintf('%0.2f', $dateon1) ?>",
    "color": "#8A0CCF"
  }, {
    "date": "<?php echo date('d-m-Y') ?>",
    "paid": "<?php echo sprintf('%0.2f', $dateon) ?>",
    "color": "#CD0D74"
  }],
  "valueAxes": [{
    "axisAlpha": 0,
    "position": "left",
    "title": "Total customer paid"
  }],
  "startDuration": 1,
  "graphs": [{
    "balloonText": "<b>[[category]]: RM [[value]]</b>",
    "fillColorsField": "color",
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "line",
    "valueField": "paid"
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "date",
  "categoryAxis": {
    "gridPosition": "start",
    "labelRotation": 45
  },
  "export": {
    "enabled": true
  }

});
</script>
</body>
</html>