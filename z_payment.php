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
						<h2>PAYMENT METHOD</h2>
						<p>We accept PayPal payment, and also accept Check and Money Order.</p>
						<img src="static/picture/visa.gif" alt="visa"/>
						<p>Also you can pay with your mainly credit card by paypal.</p>
						<img src="static/picture/payment.png" alt="paypal"/>
						<p>(Please remember that we will not ship any goods until payment is Cleared )</p>
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
					<h4>SHIPPING METHOD: PRIORITY MAIL(USPS )</h4>
					<p>Our shipping charges are based on the total price, please look at the following listing.</p>
					<table class="table table-striped">
						<tr>
							<td>below $9.99</td>
							<td>free</td>
						</tr>
						<tr>
							<td>$10 to $49.99</td>
							<td>$3.5</td>
						</tr>
						<tr>
							<td>$50 to $99.99</td>
							<td>$5</td>
						</tr>
						<tr>
							<td>Above $100</td>
							<td>$7</td>
						</tr>
					</table>
					<p>Priority mail will be used for all PO Box shipping addresses, But All APO's and military addresses do not apply here. Please use standard shipping for these. Thank you.</p>
					<h4>1. Any purchase over US$500, please pay by BANK TRANSFER or MONEY ORDER. thanks for your cooperation.</h4>
					<h4>2. For Canadian orders</h4>
					<p>a. shipment will be done by Canada Post.</p>
					<p>b. All charges and taxes fee (PST and GST) outsides USA will be at buyer's account.</p>
					<p>c. Import tax is included in the shipping cost.</p>
					<p>d. Lead time for shipment to Canada should be around 7 to 10 days .</p>
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