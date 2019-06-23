<?php
require_once("data/config.php");
require_once("data/sql.class.php");
require_once("data/get_category.class.php");
require_once("data/get_category.php");
require_once("data/get_product_list.php");
require_once("data/get_elect_list.php");
require_once("data/get_recent_list.php");
require_once("data/get_brand_series.php");
require_once("data/fun.php");
$cateClass = new Category;
?>
<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Payment failed</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include("frame-css.php"); ?>
</head>
<body>
	<h1 id="top-h1"><?php echo $cateClass->get_meta_seo("index")->title; ?></h1>
	<?php include("frame-header.php"); ?>
	
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12">
				<div class="error-msg text-center">
					<h3 style="color: red">Payment failed</h3>
					<p>Your payment failed, please try to buy again, automatically return to the home page after <span class="times">5</span> seconds</p>
				</div>
			</div>
		</div>
	</div>
	<!--404-area end-->
	
	<!--footer-area start-->
	<?php include("frame-footer.php"); ?>
	<!--footer-area end-->
	<?php include("frame-js.php"); ?>
	<script>
	    var timeS = 5;
	    var oTime = document.getElementsByClassName('times')[0];
	    function countTime() {
	        oTime.innerHTML = timeS;
	        if (timeS>=0) {
	            timeS--;
	        };
	    };
	    function jumpHome() {
	        window.location = "https://www.tech-electronic.com";
	    };
	    setInterval(countTime, 1000);
	    setTimeout(jumpHome, 5000);
	</script>
</body>
</html>
