<?php
session_start();
$userid=session_id();
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
$result_arr=json_decode(Products::GetCartList($userid));
?>
<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo $cateClass->get_meta_seo("cart")->title; ?></title>
    <meta name="keyword" content="<?php echo $cateClass->get_meta_seo("cart")->metaKeyword; ?>">
    <meta name="description" content="<?php echo $cateClass->get_meta_seo("cart")->metaDescription; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<base href="<?php echo $_config['base_url']; ?>">
	<?php include("frame-css.php"); ?>
</head>

<body>
	<!--[if lte IE 9]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->
	<h1 id="top-h1"><?php echo $cateClass->get_meta_seo("cart")->title; ?></h1>
	<?php include("frame-header.php"); ?>
	<div class="shopping-cart-steps">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!--breadcrumb-area start-->
					<div class="breadcrumb-area mt-25  mb-20">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-12">
									<div class="breadcrumbs">
										<ul>
											<li><a href="index.html">Home<i class="fa fa-angle-right"></i></a></li>
											<li>Cart</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--breadcrumb-area end-->
				</div>
				<div class="col-lg-12">
					<div class="cart-steps">
						<ul class="clearfix">
							<li class="active">
								<div class="inner">
									<span class="step">01</span> <span class="inner-step">Shopping Cart</span>
								</div>
							</li>
							<li>
								<div class="inner">
									<span class="step">02</span> <span class="inner-step">Checkout </span>
								</div>
							</li>
							<li>
								<div class="inner">
									<span class="step">03</span> <span class="inner-step">Order Completed </span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--shopping-cart area-->
	<div class="shopping-cart-area">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 cart_wrap">
					<div class="table-responsive">
						<table class="cart-table">
							<thead>
								<tr>
									<th>Image</th>
									<th>Product Name</th>
									<th>Model</th>
									<th>Quantity</th>
									<th>Unit Price</th>
									<th>Total</th>
									<th class="text-center"><i class="fa fa-times" aria-hidden="true"></i></th>
								</tr>
							</thead>
							<tbody>
								<?php 
									foreach ($result_arr as $rowbt) {
										$gwc_shuliang=$rowbt->gwc_shuliang;
										$gwc_procode=$rowbt->gwc_procode;
										$gwc_prodes=$rowbt->gwc_prodes;
										$gwc_key=$rowbt->gwc_key;
										$gwc_id=$rowbt->gwc_id;
										$pid=$rowbt->pid;
										$type=$rowbt->category;
										$brand=$rowbt->cs;
										$okpcode=$rowbt->okpcode;
										$jianjie1=$rowbt->jianjie1;
								        $jianjie0=getjan($jianjie1);
								        $jianjie2=$rowbt->jianjie2;
								        $price=get_ouprice($rowbt->pprice);
								        $SubTotal=ceil($gwc_shuliang*$price);
								        $imgUrl=get_img_file($type)."/".$okpcode.".jpg";
										$typeName = $cateClass->getSecondLevel($type)->secondArr["typeName"];
										$typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
										$productUrl=get_products_url(trim(strtolower($gwc_key)),$type,$typeUrl0,$pid);
								?>
								<tr data-pid="<?php echo $gwc_id; ?>">
									<td>
										<div class="cart-product-thumb">
											<a href="<?php echo $productUrl; ?>"><img class="cart-img img-thumbnail" src="<?php echo $imgUrl; ?>" alt="<?php echo $gwc_procode ; ?>" /></a>
										</div>
									</td>
									<td>
										<div class="cart-product-name">
											<h5><a href="<?php echo $productUrl; ?>"><?php echo $gwc_prodes; ?></a></h5>
										</div>
									</td>
									<td>
										<span class="cart-product-price"><?php echo $gwc_key; ?></span>
									</td>
									<td>
										<div class="cart-quantity-changer">
											<a class="value-decrease qtybutton" onclick="shopCart.minusCart(this,<?php echo $gwc_id; ?>)">-</a>
											<input type="text" name="gwc_shuliang" min="1" max="999" value="<?php echo $gwc_shuliang; ?>" />
											<a class="value-increase qtybutton" onclick="shopCart.plusCart(this,<?php echo $gwc_id; ?>);return false;">+</a>
										</div>
									</td>
									<td>
										<span class="cart-product-price"><?php echo $price; ?> <?php echo $unit; ?></span>
									</td>
									<td>
										<span class="cart-product-price"><span class="subtotal"><?php echo $SubTotal; ?></span> <?php echo $unit; ?></span>
									</td>
									<td>
										<div class="product-remove">
											<a onclick="shopCart.deleteCart(this,<?php echo $gwc_id; ?>);">
												<i class="fa fa-times" aria-hidden="true"></i>
											</a>
										</div>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row mt-30">
				<div class="col-lg-6">
					<div class="cart-update">
						<a href="index.html" class="btn-common">CONTINUE SHOPPING</a>
					</div>
				</div>
			</div>
			<div class="row mt-40">
				<div class="col-lg-4">
					<div class="cart-box shpping-tax">
						<h5>Shipping</h5>
						<div class="cart-box-inner">
							<p>Enter your destination to get shipping & tax</p>
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
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="cart-box cart-coupon fix">
						<h5>The more you buy, the more affordable</h5>
						<div class="cart-box-inner">
							<p>10% discount on purchases greater than 5</p>
							<p>20% discount on purchases greater than 10</p>
							<div class="checkbox" id="offcheckbox" style="position: relative;">
								<label for="offprice">
									<input type="checkbox" name="offprice" id="offprice" <?php echo isset($_GET['offprice'])?"checked":""; ?> onclick='shopCart.Cart(2,"","","")' value="1" />
									Volume Purchase
								</label>
								<div class="pop-site"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="cart-box cart-total">
						<h5>Cart Total</h5>
						<div class="cart-box-inner">
							<table class="table">
								<tr>
									<td>Sub-Total:</td>
									<td><span class="nof_subtotal">0</span> <?php echo $unit; ?></td>
								</tr>
								<tr>
									<td>Discount:</td>
									<td><span style="font-size: 16px; color: red; font-weight: bold;">-<span class="discount">0</span></span> <?php echo $unit; ?></td>
								</tr>
								<tr>
									<td>Shipping Fee:</td>
									<td><span class="freight">0</span> <?php echo $unit; ?></td>
								</tr>
								<tr>
									<td>Total:</td>
									<td><span class="total">0</span> <?php echo $unit; ?></td>
								</tr>
							</table>
							<div class="proceed-checkout">
								<div class="col-lg-12">
									<a href="#">Checkout with multiple address</a>
								</div>
								<div class="col-lg-12 clearfix">
									<div class="cart-update pull-right">
										<form data-action="app/payment.php" action="app/payment.php" id="fastpay" method="POST" target="_blank">
											<input type="submit" name="update" class="btn-common" value="Fast Pay">
										</form>
									</div>
								</div>
								<div class="col-lg-12">
									<a href="checkout.html" class="btn-common">PROCEED TO CHECK OUT</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--shopping-cart end-->
	
	<!--brands-area start-->
	<?php include("frame-brandBanner.php"); ?>
	<!--brands-area end-->
	
	<!--footer-area start-->
	<?php include("frame-footer.php"); ?>
	<!--footer-area end-->
	<?php include("frame-js.php"); ?>
</body>
</html>
