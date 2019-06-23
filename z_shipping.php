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
    <title><?php echo $cateClass->get_meta_seo("shipping")->title; ?></title>
    <meta name="keyword" content="<?php echo $cateClass->get_meta_seo("shipping")->metaKeyword; ?>">
    <meta name="description" content="<?php echo $cateClass->get_meta_seo("shipping")->metaDescription; ?>">
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
						<h2>Shipping Info</h2>
						<p>1.Shipment Methods</p>
						<p>2.Shipping & Handling</p>
						<p>3.International Shipping</p>
						<p>4.Back Orders</p>
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
					<h3>All item will arrive you in the 5 to 10 business days with tracking number .</h3>
					<h4>1.Shipment Methods</h4>
					<p>if you are dealer,you can selected others .We can not offer Overnight (UPS Red) and 2nd Day Delivery (UPS Blue) . All orders placed for Standard Shipping on all stock items will be shipped within one business days. all item will arrive you in the 5 to 10 business days with tracking number.</p>
					<h4>2.Shipping & Handling</h4>
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
					<p>Attention: Priority mail will be used for all PO Box shipping addresses, But All APO's and military addresses do not apply here. Please use standard shipping for these. Thank you.</p>
					<h4>3. International Shipping</h4>
					<p>We ship to the worldwide,please enquiry shipping & handling if you are out of Europe.</p>
					<h4>4. Back Orders</h4>
					<p>Currently, We have the ability to ship over 95% of our products within 24 hours. Most of our products are in stock, either in our warehouse in Providence, or at a number of our suppliers across the country, in which we will drop ship directly from them. In the case where an item is back ordered, We will notify you as soon as possible with an expected ship date. In the event that multiple items are ordered and one is back ordered. We will only charge for the item that is shipped. And not until we ship the back ordered item will we charge you for that. For all orders We will not charge the credit card until the order is ready to ship</p>
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