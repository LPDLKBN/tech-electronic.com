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
    <title><?php echo $cateClass->get_meta_seo("faq")->title; ?></title>
    <meta name="keyword" content="<?php echo $cateClass->get_meta_seo("faq")->metaKeyword; ?>">
    <meta name="description" content="<?php echo $cateClass->get_meta_seo("faq")->metaDescription; ?>">
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
						<h2>Welcome To <?php echo $_SERVER['SERVER_NAME'] ?></h2>
						<p>We are a manufacturer representative and wholesaler that specializes in Laptop Batteries , Laptop AC Adapters and Some Electronics . We have tested Batteries from virtually every manufacturer on the market. Our commitment is to provide our customers with the price/performance available on the market.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--banner-area end-->
	
	<!--faq-area start-->
	<div class="faq-area mt-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div id="accordion">
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="headingOne">
						  <h5 class="mb-0">
							<a href="#collapseOne" class="btn btn-link" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
								Q: Can I choose shipping methods other than the shipping method you provided, such as UPS or FedEx?
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>

						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
						  <div class="card-body">
							<p>A: Yes, if your order weights more than 30lbs. If your order weight less than 30lbs, it's not cost effecient to use FedEx or UPS and the shipping rate will cost much more than using airmail.</p>
						  </div>
						</div>
					  </div>
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="headingTwo">
							<h5 class="mb-0">
								<a href="#collapseTwo" class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								  Q: Can I ship to an address other than my billing or confirmed address?
									<i class="fa fa-plus-circle pull-right"></i>
									<i class="fa fa-minus-circle pull-right"></i>
								</a>
							</h5>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						  <div class="card-body">
							<p>Q: I don't see those small prints on most e-commerce site, where is your disclaimers?</p>
						  </div>
						</div>
					  </div>
					   <div class="card single-faq">
						<div class="card-header faq-heading" id="headingThree">
						  <h5 class="mb-0">
							<a href="#collapseThree" class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							  A: We don't have a 50 pages sales term. But there are few conditions that you must agreed upon before we can take your business.
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
						  <div class="card-body">
							<p>1.You can return your purchase within 30days of the receipt date for any or no reason. However, the orgianl Shipping fee is none-refundable under any circumstances.</p>
							<p>2.We will not responsible for the returning cost of defective product(s), but we will pay for the S/H cost of the replacement.</p>
							<p>3.If we send you the wrong item, we will pay the S/H of the replacement, as well as the returning S/H cost of the wrong item.</p>
							<p>4.We reserve the right to cancel or refuse any order at any time for any reason.</p>
						  </div>
						</div>
					  </div>
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="headingThree">
						  <h5 class="mb-0">
							<a href="#collapseThree" class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							  Q: Do you offer combine shipping or any shipping discount on large purchased?
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>
						<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
						  <div class="card-body">
							<p>A: Since we calculate shipping rate by total price, you enjoy the shipping discount automatically. The more you purchase, the more you save.</p>
						  </div>
						</div>
					  </div>
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="headingFour">
						  <h5 class="mb-0">
							<a href="#collapseFour" class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
							  Q: Is there a wholesale price for bulk/volume purchases?
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>
						<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
						  <div class="card-body">
							<p>A: You will see the wholesale price automatically when we mark your account as "wholeseller". In order to be qualify as a wholesaler, you need to meet either one of the following conditions:</p>
							<p>1) Your total purchase for past 30 days exceed USD $2000.</p>
							<p>2) Your order exceed $1000 in a single purchase.</p>
							<p>If you believe you are qualify as a wholeseller, please write a email to: <a href="server@<?php echo $_SERVER['SERVER_NAME']; ?>">info@<?php echo $_SERVER['SERVER_NAME']; ?></a>. We will process your request in 24 hours.</p>
						  </div>
						</div>
					  </div>
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="headingFive">
						  <h5 class="mb-0">
							<a href="#collapseFive" class="btn btn-link" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
							  Q: How do I check my order status?
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>
						<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
						  <div class="card-body">
							<p>A: usually we process your order the same day and send the tracking number to you the second day, if we received your order on weekend ,we will process your order on monday.</p>
						  </div>
						</div>
					  </div>
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="headingSix">
						  <h5 class="mb-0">
							<a href="#collapseSix" class="btn btn-link" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
							  Q: I just completed an order and my payment is cleared. When will it ship?
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>
						<div id="collapseEve" class="collapse" aria-labelledby="headingEve" data-parent="#accordion">
						  <div class="card-body">
							<p>A: Orders generally ship within 3 business days of when the order is placed (see processing steps chart above).</p>
						  </div>
						</div>
					  </div>
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="headingEve">
						  <h5 class="mb-0">
							<a href="#collapseEve" class="btn btn-link" data-toggle="collapse" data-target="#collapseEve" aria-expanded="false" aria-controls="collapseEve">
							  Q: Can I change or cancel my order?
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>
						<div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
						  <div class="card-body">
							<p>A: if you want to change or cancel your order please contact us within 5 hours after your order placed . However, if the order has been market "shipped", You will not able to cancel or change the order.</p>
						  </div>
						</div>
					  </div>
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="headingEight">
						  <h5 class="mb-0">
							<a href="#collapseEight" class="btn btn-link" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
							  Q: What is your return policy. Is there a restocking fee if I want to request for return?
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>
						<div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion">
						  <div class="card-body">
							<p>A: We do not charge restocking fee, but we do have few simple return policies.</p>
							<ul>
								<li>Request for refund must be made within 15 days of receiving date.</li>
								<li>Request for replacement must be made within 30 days of receiving date.</li>
								<li>If the replacement item is out of stock, we will issue you a store credit of your purchase value.</li>
								<li>Shipping and handling is NOT refundable.</li>
								<li>The shipping costs of returning any defective merchandise will be the sole responsibility of the customer.</li>
							</ul>
						  </div>
						</div>
					  </div>
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="headingNine">
						  <h5 class="mb-0">
							<a href="#collapseNine" class="btn btn-link" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
							  Q: My product is defective and I need to get a return or replacement, what should I do?
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>
						<div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion">
						  <div class="card-body">
							<p>A: Simple. Go to the "contact us" page, send an email to us and Request RMA ,a email contain the instruction alone with the RMA# will be send to you shortly. Pack the return according to the instruction and ship it back to us. A replacement will be ship to you once we received your return or the refund will be credited to your account if you requested.</p>
						  </div>
						</div>
					  </div>
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="headingTen">
						  <h5 class="mb-0">
							<a href="#collapseTen" class="btn btn-link" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
							  Q: How come I never received your order confirmation email?
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>
						<div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordion">
						  <div class="card-body">
							<p>A: check your email's spam folder.</p>
						  </div>
						</div>
					  </div>
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="heading11">
						  <h5 class="mb-0">
							<a href="#collapse11" class="btn btn-link" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
							  Q: I got the shipping confirmation email. Where do I track my package?
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>
						<div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordion">
						  <div class="card-body">
							<p>A: You can track your package at your country's postal office website. Or you can use the link below: http://www.ems.com.cn/english-main.jsp.</p>
						  </div>
						</div>
					  </div>
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="heading12">
						  <h5 class="mb-0">
							<a href="#collapse12" class="btn btn-link" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
							  Q: Where should I go after 1 year if the item is defected?
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>
						<div id="collapse13" class="collapse" aria-labelledby="heading13" data-parent="#accordion">
						  <div class="card-body">
							<p>A: Warranty service for defected merchandise are handled by the manufacturers and not by <?php echo $_SERVER['SERVER_NAME']; ?>, unless otherwise indicated. Please contact the manufacture directly.</p>
							<p>If any item was damaged during transit, immediately contact your local postal office. Keep all shipping materials and contact our Customer Service Immediately we are aware of the issue. If you have purchased shipping insurance, we will help you to get recovered from carrier.</p>
						  </div>
						</div>
					  </div>
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="heading13">
						  <h5 class="mb-0">
							<a href="#collapse13" class="btn btn-link" data-toggle="collapse" data-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
							  Q: Can I use the <?php echo $_SERVER['SERVER_NAME'] ?> receipt for product warranties?
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>
						<div id="collapse14" class="collapse" aria-labelledby="heading14" data-parent="#accordion">
						  <div class="card-body">
							<p>A: Yes. You can get a copy of your receipt at "your account" page at any time.</p>
						  </div>
						</div>
					  </div>
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="heading14">
						  <h5 class="mb-0">
							<a href="#collapse14" class="btn btn-link" data-toggle="collapse" data-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
							 Q: Can I change the email address on my account?
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>
						<div id="collapse15" class="collapse" aria-labelledby="heading15" data-parent="#accordion">
						  <div class="card-body">
							<p>A: Yes.</p>
						  </div>
						</div>
					  </div>
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="heading15">
						  <h5 class="mb-0">
							<a href="#collapse15" class="btn btn-link" data-toggle="collapse" data-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
							  Q: Can I add an item to my order?
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
						  <div class="card-body">
							<p>A: yes.</p>
						  </div>
						</div>
					  </div>
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="headingThree">
						  <h5 class="mb-0">
							<a href="#collapseThree" class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							  E-mail contact:
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
						  <div class="card-body">
							<p>If you have any question,please feel free to send email</p>
							<a href="info@<?php echo $_SERVER['SERVER_NAME']; ?>">info@<?php echo $_SERVER['SERVER_NAME']; ?></a>
						  </div>
						</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--faq-area end-->

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