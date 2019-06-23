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
require_once("public/function.php");
$cateClass = new Category;
$result_arr=json_decode(Products::GetCartList($userid));
?>
<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo $cateClass->get_meta_seo("cart")->title; ?></title>
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
											<li><a href="cart.html">Cart<i class="fa fa-angle-right"></i></a></li>
											<li>Checkout</li>
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
							<li>
								<div class="inner">
									<span class="step">01</span> <span class="inner-step">Shopping Cart</span>
								</div>
							</li>
							<li class="active">
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
	
	<!--checkout-area start-->
	<div class="checkout-area mt-15">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p>Please fill out the form information.</p>
				</div>
			</div>
			<?php $url= encrypti("slow", "E", "123456");?>
			<form data-action="app/payment.php?type=<?=$url?>" action="app/payment.php?type=<?=$url?>" method="post" id="defaultForm" class="form-horizontal" target="_blank">
			<div class="row mt-10">
				<div class="col-lg-8">
					<div class="billing-form">
						<h4>Billing Address</h4>
						<?php $url= encrypti("slow", "E", "123456");?>
						<form data-action="app/payment.php?type=<?=$url?>" action="app/payment.php?type=<?=$url?>" method="post" id="defaultForm" class="form-horizontal" target="_blank">
							<div class="row form-group">
								<div class="col-lg-3 align-items-center">
									<label for="countrySelector" class="control-label">COUNTRY *</label>
								</div>
								<div class="col-lg-9">
									<select onchange="FunReg(this.id);" name="country" id="countrySelector" class="form-control">
										<option value="" SELECTED ></option>
										<option value="AU" >AUSTRALIA</option>
										<option value="AT" >AUSTRIA</option>
										<option value="BE" >BELGIUM</option>
										<option value="CA" >CANADA</option>
										<option value="DK" >DENMARK</option>
										<option value="FI" >FINLAND</option>
										<option value="FR" >FRANCE</option>
										<option value="DE" >GERMANY</option>
										<option value="IE" >IRELAND</option>
										<option value="IL" >ISRAEL</option>
										<option value="IT" >ITALY</option>
										<option value="JP" >JAPAN</option>
										<option value="KZ" >KAZAKHSTAN</option>
										<option value="NL" >NETHERLANDS</option>
										<option value="NZ" >NEW ZEALAND </option>
										<option value="NO" >NORWAY</option>
										<option value="PH" >PHILIPPINES</option>
										<option value="PL" >POLAND</option>
										<option value="RU" >RUSSIA</option>
										<option value="SG" >SINGAPORE</option>
										<option value="ES" >SPAIN</option>
										<option value="SE" >SWEDEN</option>
										<option value="CH" >SWITZERLAND</option>
										<option value="GB" >UNITED KINGDOM</option>
										<option value="US" selected>UNITED STATES</option>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-lg-3">
									<label for="personname"class="control-label">Personname <sup>*</sup></label>
								</div>
								<div class="col-lg-9">
									<input type="text" class="form-control" name="personname" id="personname" />
								</div>
							</div>
							<div class="row form-group">
								<div class="col-lg-3">
									<label for="state" class="control-label">state <sup>*</sup></label>
								</div>
								<div class="col-lg-9">
									<input type="text" class="form-control" name="state" id="state" />
								</div>
							</div>
							<div class="row form-group">
								<div class="col-lg-3">
									<label for="city" class="control-label">city <sup>*</sup></label>
								</div>
								<div class="col-lg-9">
									<input type="text" class="form-control" name="city" id="city" />
								</div>
							</div>
							<div class="row form-group">
								<div class="col-lg-3">
									<label for="address1" class="control-label">address <sup>*</sup></label>
								</div>
								<div class="col-lg-9">
									<input type="text" class="form-control" name="address1" id="address1" />
								</div>
							</div>
							<div class="row form-group">
								<div class="col-lg-3">
									<label for="address2" class="control-label">address2</label>
								</div>
								<div class="col-lg-9">
									<input type="text" class="form-control" name="address2" id="address2" />
								</div>
							</div>
							<div class="row form-group">
								<div class="col-lg-3">
									<label for="postal" class="control-label">postal <sup>*</sup></label>
								</div>
								<div class="col-lg-9">
									<input type="text" class="form-control" name="postal" id="postal" />
								</div>
							</div>
							<div class="row form-group">
								<div class="col-lg-3">
									<label for="phone" class="control-label">phone <sup>*</sup></label>
								</div>
								<div class="col-lg-9">
									<input type="text" class="form-control" name="phone" id="phone" />
								</div>
							</div>
							<div class="row form-group">
								<div class="col-lg-3">
									<label for="email" class="control-label">email <sup>*</sup></label>
								</div>
								<div class="col-lg-9">
									<input type="email" class="form-control" name="email" id="email" />
								</div>
							</div>
							<div class="row form-group">
								<div class="col-lg-3">
									<label for="attention" class="control-label">attention</label>
								</div>
								<div class="col-lg-9">
									<textarea type="text" name="attention" id="attention" class="form-control" id="attention" autocomplete="on" value=""/> </textarea>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="order-details">
						<h4>Your Order</h4>
						<div class="order-details-inner">
							<table>
								<thead>
									<tr>
										<th>DETAIL</th>
										<th>PRICE</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Sub-Total:</td>
										<td><strong class="nof_subtotal">0</strong> <?php echo $unit; ?></td>
									</tr>
									<tr>
										<td>Discount:</td>
										<td>-<strong class="discount">0</strong> <?php echo $unit; ?></td>
									</tr>
									<tr>
										<td>Shipping Fee:</td>
										<td><strong class="freight">0</strong> <?php echo $unit; ?></td>
									</tr>									<tr>
										<td>Total:</td>
										<td><strong class="total">0</strong> <?php echo $unit; ?></td>
									</tr>
								</tbody>
							</table>
							<div class="payment-gateways mt-30">
								<div class="single-payment-gateway">
									<div class="checkbox" id="offcheckbox" style="position: relative; text-align: center;">
										<input type="checkbox" name="offprice" id="offprice" <?php echo isset($_GET['offprice'])?"checked":""; ?> onclick='shopCart.Cart(2,"","","")' value="1"/>
										<label for="offprice">Create an account?</label>
										<div class="pop-site"></div>
									</div>
									<div class="payment-gateway-desc">
										<p>10% discount on purchases greater than 5</p>
										<p>20% discount on purchases greater than 10</p>
									</div>
								</div>
							</div>
							<div class="place-order text-center mt-60">
								<button type="submit" class="btn-common width-180">submit</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
	<!--checkout-area end-->
	
	<!--brands-area start-->
	<?php include("frame-brandBanner.php"); ?>
	<!--brands-area end-->
	
	<!--footer-area start-->
	<?php include("frame-footer.php"); ?>
	<!--footer-area end-->
	<?php include("frame-js.php"); ?>
	<script src="static/js/BootstrapValidator.js"></script>
	<script src="static/js/us_state.js"></script>
	<script src="static/js/pro_msg.js"></script>
</body>
</html>
