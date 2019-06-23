<?php
session_start();
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
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
    <title><?php echo $cateClass->get_meta_seo("payment")->title; ?></title>
    <meta name="keyword" content="<?php echo $cateClass->get_meta_seo("payment")->metaKeyword; ?>">
    <meta name="description" content="<?php echo $cateClass->get_meta_seo("payment")->metaDescription; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include("frame-css.php"); ?>
</head>

<body>
	<?php include("frame-header.php"); ?>
	
	<!--page-banner-area start-->
	<div class="page-banner-area bg-1">
		<div class="container">
			<div class="row align-items-center height-400">
				<div class="col-lg-8 offset-lg-4">
					<div class="page-banner-text">
						<h2>Return policy</h2>
						<p>We are a manufacturer representative and wholesaler that specializes in Laptop Batteries , Laptop AC Adapters and Some Electronics . We have tested Batteries from virtually every manufacturer on the market. Our commitment is to provide our customers with the price/performance available on the market.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--banner-area end-->
	
	<!--about-area start-->
	<div class="about-area mt-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mt-sm-30">
					<h3>Product Guarantee</h3>
					<p>All of our products carry a 100% satisfaction guarantee. If you are not satisfied with your purchase, for any reason, you may return the product(s) to us within 30 days and we will refund the full product price. We will refund shipping costs only if the result is our error (wrong item shipped, shipping damage). Customers are responsible for all shipping charges back to us on returned items unless there was an incorrect item(s) shipped, in which we will refund the shipping charges.</p>
					<div style="background-color: #ddd; padding: 40px;">
						<p>We warrant our products for 6 Month under normal, non-commercial use. During the first ninety (90) days from the date of purchase, we will repair or replace any defective product.</p>
						<p>After ninety (90) days and up to 6 Month of purchase, we will, subject to inspection, repair the defective battery pack or replace it with a new or reconditioned unit. The return must be accompanied by a Return Merchandise Authorization (RMA) number, which is to be issued upon request, and must be shipped prepaid. A shipping rebate will be extended to the customer in the event that a defect in material or workmanship is confirmed.</p>
						<p>The warranty period is 6 Month from the date of original purchase. A replacement item, if sent, does not restart, or in any way extend, the warranty period.</p>
						<p>All non defective returns have to be in new and resalable condition. If the customer does not wish to exchange their product, a 20% restocking fee may apply.</p>
					</div>
					<h4>Return Authorization</h4>
					<p>All returns within 30 days from the purchase date can be for an exchange or refund. Buyer Cover return fee. If thelaptopbattery.co.uk has sent the wrong item, shipping charges will be refunded upon receipt and a replacement product shipped immediately. thelaptopbattery.co.uk will only refund amounts relative to standard shipping, before return us, please contact customer service department and obtain a Return Merchandise Authorization (RMA) number, For your protection, we strongly recommend that you insure your return shipment against loss or damages, and that you use a shipper that can provide you with proof of delivery.</p>
					<p>Shipping & handling charges will be paid for by the customer on all exchanges after the 30 day period. thelaptopbattery.co.uk reserves the right to add additional charges to cover other expenses (price increases, etc.) on all exchanges after the 30 day period.</p>
					<img class="img-responsive img-thumbnail" src="static/picture/hdr_uspsLogo.gif" alt="postal"/><img class="img-thumbnail" src="static/picture/security.gif" alt="security">
					<h3>E-mail contact:</h3>
					<p>If you have any question,please feel free to send email</p>
					<a href="mailto:<?php echo $_config['domain_email']; ?>"><?php echo $_config['domain_email']; ?></a>
				</div>
			</div>
		</div>
	</div>
	<!--about-area end-->

	<!--office-address-area start-->
	<div class="office-address-area mt-40">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="office-address">
						<h3>Fast Transport</h3>
						<p>We will process your request in 24 hours, All products will be delivered within 5 - 10 days.</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="office-address">
						<h3>Easy Returns</h3>
						<p>30-day refund, one-year warranty</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="office-address">
						<h3>Volume discount</h3>
						<p>Buy more and cheaper</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="office-address">
						<h3>Paypal payment</h3>
						<p>Payment security !</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--office-address-area end-->
	
	<!--brands-area start-->
	<?php include("frame-brandBanner.php"); ?>
	<!--brands-area end-->
	
	<!--footer-area start-->
	<?php include("frame-footer.php"); ?>
	<!--footer-area end-->
	<?php include("frame-js.php"); ?>
</body>
</html>