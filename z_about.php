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
    <title><?php echo $cateClass->get_meta_seo("about")->title; ?></title>
    <meta name="keyword" content="<?php echo $cateClass->get_meta_seo("about")->metaKeyword; ?>">
    <meta name="description" content="<?php echo $cateClass->get_meta_seo("about")->metaDescription; ?>">
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
	
	<!--about-area start-->
	<div class="about-area mt-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<img class="img-100p" src="static/picture/1.jpg" alt="" />
				</div>
				<div class="col-lg-6 mt-sm-30">
					<div id="accordion">
					  	<div class="card single-faq">
							<div class="card-header faq-heading" id="headingOne">
							  <h5 class="mb-0">
								<a href="#collapseOne" class="btn btn-link" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
								 OUR MISSION:
									<i class="fa fa-plus-circle pull-right"></i>
									<i class="fa fa-minus-circle pull-right"></i>
								</a>
							  </h5>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body">
									<p><?php echo $_SERVER['SERVER_NAME'] ?> mission is create the most efficient product distribution system from supplier to consumer, for the benefit of all.</p>
								</div>
							</div>
					  	</div>
						<div class="card single-faq">
							<div class="card-header faq-heading" id="headingTwo">
								<h5 class="mb-0">
									<a href="#collapseTwo" class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									  OUR VALUES:
										<i class="fa fa-plus-circle pull-right"></i>
										<i class="fa fa-minus-circle pull-right"></i>
									</a>
								</h5>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
							  <div class="card-body">
								<p><b>Super Fast Delivery Time.</b> We ship within 24 hours from payment update to our bank account of all items in stock!</p>
								<p><b>Specialisation</b> - we do batteries and components with excellence!</p>
								<p><b>Passion</b> - We love what we do - the secret of our success!</p>
								<p><b>Customer Service</b> - The customer is king. We know that building trusting, long-term relationships with our customers is key to our collaborative success.Prompt email response and good communication.Fast shipping and tracking number email notification.Simple procedures for merchandise return,exchange,or replacement.</p>
								<p><b>Sharp Pricing</b> - The formula is simple. We have to make a profit, or we go out of business, right? Above that we aim to pass on the benefits of competitive pricing to our customers. We also build great relationships with our suppliers to make this pricing possible. We may not always be the cheapest but we do offer the best value.</p>
							  </div>
							</div>
						</div>
						<div class="card single-faq">
							<div class="card-header faq-heading" id="headingThree">
							  <h5 class="mb-0">
								<a href="#collapseThree" class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								  OUR GUARANTEE
									<i class="fa fa-plus-circle pull-right"></i>
									<i class="fa fa-minus-circle pull-right"></i>
								</a>
							  </h5>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
							  <div class="card-body">
								<p>* Shopping with us is safe and secure.</p>
								<p>* 100% High Quality and low price.</p>
								<p>* 100% compatible original equipment.</p>
								<p>* Full 1 year warranty! 30 days money back !</p>
								<p>* 8-15 days arrive fast and secure !</p>
							  </div>
							</div>
						</div>
						<div class="card single-faq">
							<div class="card-header faq-heading" id="headingFour">
							  <h5 class="mb-0">
								<a href="#collapseFour" class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								  CORPORATION INFORMATION:
									<i class="fa fa-plus-circle pull-right"></i>
									<i class="fa fa-minus-circle pull-right"></i>
								</a>
							  </h5>
							</div>
							<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
							  <div class="card-body">
								<p>If you need a quotation for a volume order, please email us for quote via info@<?php echo $_SERVER['SERVER_NAME']; ?> and one of our Account Managers will provide you with a competitive quote ASAP.</p>
								<p>We have a group of experienced technical experts who can provide free assist to your question or problem about our products. You can order products for delivery right to home on our website and have a superior shopping experience. We are dedicated to bring the highest quality products at rock bottom prices.</p>
								<p>Through this direct selling model, middleman cost is minimized and so <b>WE PASS ON ALL SAVINGS TO YOU!</b> In addition, because of our sophisticated vertically integrated supply chain system and streamlined order fulfillment system, we are able to truly offer high quality products at unbelievably low price with best customer service.</p>
							  </div>
							</div>
						</div>
						<div class="card single-faq">
							<div class="card-header faq-heading" id="headingFive">
							  <h5 class="mb-0">
								<a href="#collapseFive" class="btn btn-link" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
								  E-mail contact:
									<i class="fa fa-plus-circle pull-right"></i>
									<i class="fa fa-minus-circle pull-right"></i>
								</a>
							  </h5>
							</div>
							<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
							  <div class="card-body">
								<p>If you have any question,please feel free to send email</p>
								<a href="server@<?php echo $_SERVER['SERVER_NAME']; ?>">info@<?php echo $_SERVER['SERVER_NAME']; ?></a>
							  </div>
							</div>
						</div>
					</div>
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