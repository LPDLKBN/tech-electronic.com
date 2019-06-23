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
$home=true;
?>
<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo $cateClass->get_meta_seo("index")->title; ?></title>
    <meta name="keyword" content="<?php echo $cateClass->get_meta_seo("index")->metaKeyword; ?>">
    <meta name="description" content="<?php echo $cateClass->get_meta_seo("index")->metaDescription; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include("frame-css.php"); ?>
</head>
<body>
	<h1 id="top-h1"><?php echo $cateClass->get_meta_seo("index")->title; ?></h1>
	<?php include("frame-header.php"); ?>
	<!--slider-area start-->
	<div class="slider-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-2">
				</div>
				<div class="col-xl-6">
					<div class="main-slider mt-30 mt-sm-0">
						<div class="slider-single bg-1">
							<div class="d-table">
								<div class="slider-caption">
									<h4>clothing</h4>
									<h2 class="cssanimation leDoorCloseLeft sequence">Men Collections</h2>
									<p>The 10 Best Man Collection 2018</p>
									<div class="slider-product-price">
										<del>$120.00</del> 
										<span>$295.00</span>
									</div>
									<a href="#" class="btn-common mt-43">buy now</a>
								</div>
							</div>
						</div>
						<div class="slider-single bg-2">
							<div class="d-table">
								<div class="slider-caption">
									<h4>clothing</h4>
									<h2 class="cssanimation leDoorCloseLeft sequence">Gadgets</h2>
									<p>The 10 Best Man Collection 2018</p>
									<div class="slider-product-price">
										<del>$120.00</del> 
										<span>$295.00</span>
									</div>
									<a href="#" class="btn-common mt-43">buy now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4">
					<div class="row mt-30">
						<div class="col-lg-6 col-sm-6 pl-05">
							<div class="banner-sm hover-effect">
								<img src="static/picture/1.jpg" alt="" />
								<div class="banner-info">
									<h4>Clothing</h4>
									<p>Extra <strong>30%</strong> <br/>  <strong>Off</strong> All <br/> Sale Styles</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 pl-05">
							<div class="banner-sm hover-effect mt-sm-20">
								<img src="static/picture/2.jpg" alt="" />
								<div class="banner-info">
									<h4>Tech</h4>
									<p>Riley <strong>Smart</strong> <br/>  <strong>Home</strong> Patrol <br/> Robot</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 pl-05">
							<div class="banner-sm hover-effect mt-20">
								<img src="static/picture/3.jpg" alt="" />
								<div class="banner-info">
									<h4>Beauty</h4>
									<p>20% Off or <br/> more <strong>Beauty <br/> Product</strong></p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 pl-05">
							<div class="banner-sm hover-effect mt-20">
								<img src="static/picture/4.jpg" alt="" />
								<div class="banner-info">
									<h4>Electronics</h4>
									<p>Globe Electric <br/> <strong>House & <br/> Appliances</strong></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--slider-area end-->
	<!--products-area start-->
	<div class="products-area mt-47 mt-sm-37">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-2 col-lg-3">
					<div class="sidebar">
						<!--product-deal-->
						<div class="sidebar-single">
							<div class="section-title">
								<h3><?php echo $cateClass->getSecondLevel("B218")->secondArr["typeName"]; ?></h3>
							</div>
							<div class="row product-deals">
								<?php echo GetProList("B218","","","","","","",1,4,7); ?>
							</div>
						</div>
						<!--product-deal-->
						<div class="sidebar-single">
							<div class="section-title">
								<h3><?php echo $cateClass->getSecondLevel("B219")->secondArr["typeName"]; ?></h3>
							</div>
							<div class="row product-deals">
								<?php echo GetProList("B219","","","","","","",1,4,7); ?>
							</div>
						</div>
						<?php include("frame-recent.php"); ?>
						<?php include("frame-suport.php"); ?>
					</div>
				</div>
				<div class="col-xl-10 col-lg-9 fix">
					<!--product-categories-->
					<div class="product-categories mt-sm-40">
						<div class="row">
							<div class="col-lg-12">
								<div class="section-title">
									<h3>Hot Categories</h3>
								</div>
							</div>
						</div>
						<div class="row product-categories-carousel mt-30">
							<div class="col-lg-3">
								<div class="single-product-cat">
									<a href="<?php echo get_second_url("K902",$cateClass->getSecondLevel("K902")->secondArr["typeUrl"]); ?>"><img src="https://www.machiibattery.com/images/K902.jpg" alt="" /></a>
									<h4><a href="<?php echo get_second_url("K902",$cateClass->getSecondLevel("K902")->secondArr["typeUrl"]); ?>"><?php echo $cateClass->getSecondLevel("K902")->secondArr["typeName"]; ?></a></h4>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single-product-cat">
									<a href="<?php echo get_second_url("B201",$cateClass->getSecondLevel("B201")->secondArr["typeUrl"]); ?>"><img src="https://www.machiibattery.com/images/B201.jpg" alt="" /></a>
									<h4><a href="<?php echo get_second_url("B201",$cateClass->getSecondLevel("B201")->secondArr["typeUrl"]); ?>"><?php echo $cateClass->getSecondLevel("B201")->secondArr["typeName"]; ?></a></h4>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single-product-cat">
									<a href="<?php echo get_second_url("B209",$cateClass->getSecondLevel("B209")->secondArr["typeUrl"]); ?>"><img src="https://www.machiibattery.com/images/B209.jpg" alt="" /></a>
									<h4><a href="<?php echo get_second_url("B209",$cateClass->getSecondLevel("B209")->secondArr["typeUrl"]); ?>"><?php echo $cateClass->getSecondLevel("B209")->secondArr["typeName"]; ?></a></h4>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single-product-cat">
									<a href="<?php echo get_second_url("E503",$cateClass->getSecondLevel("E503")->secondArr["typeUrl"]); ?>"><img src="https://www.machiibattery.com/images/E503.jpg" alt="" /></a>
									<h4><a href="<?php echo get_second_url("E503",$cateClass->getSecondLevel("E503")->secondArr["typeUrl"]); ?>"><?php echo $cateClass->getSecondLevel("E503")->secondArr["typeName"]; ?></a></h4>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single-product-cat">
									<a href="<?php echo get_second_url("E510",$cateClass->getSecondLevel("E510")->secondArr["typeUrl"]); ?>"><img src="https://www.machiibattery.com/images/E510.jpg" alt="" /></a>
									<h4><a href="<?php echo get_second_url("E510",$cateClass->getSecondLevel("E510")->secondArr["typeUrl"]); ?>"><?php echo $cateClass->getSecondLevel("E510")->secondArr["typeName"]; ?></a></h4>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single-product-cat">
									<a href="<?php echo get_second_url("B205",$cateClass->getSecondLevel("B205")->secondArr["typeUrl"]); ?>"><img src="https://www.machiibattery.com/images/B205.jpg" alt="" /></a>
									<h4><a href="<?php echo get_second_url("B205",$cateClass->getSecondLevel("B205")->secondArr["typeUrl"]); ?>"><?php echo $cateClass->getSecondLevel("B205")->secondArr["typeName"]; ?></a></h4>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single-product-cat">
									<a href="<?php echo get_second_url("B214",$cateClass->getSecondLevel("B214")->secondArr["typeUrl"]); ?>"><img src="https://www.machiibattery.com/images/B214.jpg" alt="" /></a>
									<h4><a href="<?php echo get_second_url("B214",$cateClass->getSecondLevel("B214")->secondArr["typeUrl"]); ?>"><?php echo $cateClass->getSecondLevel("B214")->secondArr["typeName"]; ?></a></h4>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single-product-cat">
									<a href="<?php echo get_second_url("B211",$cateClass->getSecondLevel("B211")->secondArr["typeUrl"]); ?>"><img src="https://www.machiibattery.com/images/B211.jpg" alt="" /></a>
									<h4><a href="<?php echo get_second_url("B211",$cateClass->getSecondLevel("B211")->secondArr["typeUrl"]); ?>"><?php echo $cateClass->getSecondLevel("B211")->secondArr["typeName"]; ?></a></h4>
								</div>
							</div>
						</div>
					</div>
					<!--products-tab-->
					<div class="products-tab mt-35">
						<div class="product-nav-tabs">
							<ul class="nav nav-tabs">
								<li><a class="active" data-toggle="tab" href="#new-arrivals"><?php echo $cateClass->getSecondLevel("B203")->secondArr["typeName"]; ?></a></li>
								<li><a data-toggle="tab" href="#on-sale"><?php echo $cateClass->getSecondLevel("B201")->secondArr["typeName"]; ?></a></li>
								<li><a data-toggle="tab" href="#best-rated"><?php echo $cateClass->getSecondLevel("B202")->secondArr["typeName"]; ?></a></li>
							</ul>
						</div>
						<div class="tab-content pb-40">
							<div id="new-arrivals" class="tab-pane fade in show active">
								<div class="row product-carousel cv-visible">
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B203","","","","","","",1,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B203","","","","","","",2,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B203","","","","","","",3,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B203","","","","","","",4,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B203","","","","","","",5,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B203","","","","","","",6,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B203","","","","","","",7,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B203","","","","","","",8,2); ?>
										<!--single-product-->
									</div>
								</div>
							</div>
							<div id="on-sale" class="tab-pane fade">
								<div class="row product-carousel cv-visible">
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B201","","","","","","",1,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B201","","","","","","",2,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B201","","","","","","",3,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B201","","","","","","",4,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B201","","","","","","",5,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B201","","","","","","",6,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B201","","","","","","",7,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B201","","","","","","",8,2); ?>
										<!--single-product-->
									</div>
								</div>
							</div>
							<div id="best-rated" class="tab-pane fade">
								<div class="row product-carousel cv-visible">
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B202","","","","","","",1,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B202","","","","","","",2,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B202","","","","","","",3,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B202","","","","","","",4,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B202","","","","","","",5,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B202","","","","","","",6,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B202","","","","","","",7,2); ?>
										<!--single-product-->
									</div>
									<div class="col-lg-3">
										<!--single-product-->
										<?php echo GetProList("B202","","","","","","",8,2); ?>
										<!--single-product-->
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--best sellers-->
					<div class="best-sellers mt-minus-40">
						<div class="row">
							<div class="col-lg-12">
								<div class="section-title">
									<h3>Best Sellers</h3>
								</div>
							</div>
						</div>
						<div class="row best-seller cv-visible">
							<?php echo GetProList("hot","","","","","","",1,12,5); ?>
						</div>
					</div>
					<!--product-categories-->
					<div class="product-categories mt-sm-40">
						<div class="row">
							<div class="col-lg-12">
								<div class="section-title">
									<h3>Hot Categories</h3>
								</div>
							</div>
						</div>
						<div class="row product-categories-carousel mt-30">
							<div class="col-lg-3">
								<div class="single-product-cat">
									<a href="<?php echo get_second_url("B218",$cateClass->getSecondLevel("B218")->secondArr["typeUrl"]); ?>"><img src="https://www.machiibattery.com/images/B218.jpg" alt="" /></a>
									<h4><a href="<?php echo get_second_url("B218",$cateClass->getSecondLevel("B218")->secondArr["typeUrl"]); ?>"><?php echo $cateClass->getSecondLevel("B218")->secondArr["typeName"]; ?></a></h4>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single-product-cat">
									<a href="<?php echo get_second_url("B219",$cateClass->getSecondLevel("B219")->secondArr["typeUrl"]); ?>"><img src="https://www.machiibattery.com/images/B219.jpg" alt="" /></a>
									<h4><a href="<?php echo get_second_url("B219",$cateClass->getSecondLevel("B219")->secondArr["typeUrl"]); ?>"><?php echo $cateClass->getSecondLevel("B219")->secondArr["typeName"]; ?></a></h4>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single-product-cat">
									<a href="<?php echo get_second_url("F605",$cateClass->getSecondLevel("F605")->secondArr["typeUrl"]); ?>"><img src="https://www.machiibattery.com/images/F605.jpg" alt="" /></a>
									<h4><a href="<?php echo get_second_url("F605",$cateClass->getSecondLevel("F605")->secondArr["typeUrl"]); ?>"><?php echo $cateClass->getSecondLevel("F605")->secondArr["typeName"]; ?></a></h4>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single-product-cat">
									<a href="<?php echo get_second_url("F609",$cateClass->getSecondLevel("F609")->secondArr["typeUrl"]); ?>"><img src="https://www.machiibattery.com/images/F609.jpg" alt="" /></a>
									<h4><a href="<?php echo get_second_url("F609",$cateClass->getSecondLevel("F609")->secondArr["typeUrl"]); ?>"><?php echo $cateClass->getSecondLevel("F609")->secondArr["typeName"]; ?></a></h4>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single-product-cat">
									<a href="<?php echo get_second_url("D401",$cateClass->getSecondLevel("D401")->secondArr["typeUrl"]); ?>"><img src="https://www.machiibattery.com/images/D401.jpg" alt="" /></a>
									<h4><a href="<?php echo get_second_url("D401",$cateClass->getSecondLevel("D401")->secondArr["typeUrl"]); ?>"><?php echo $cateClass->getSecondLevel("D401")->secondArr["typeName"]; ?></a></h4>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single-product-cat">
									<a href="<?php echo get_second_url("D403",$cateClass->getSecondLevel("D403")->secondArr["typeUrl"]); ?>"><img src="https://www.machiibattery.com/images/D403.jpg" alt="" /></a>
									<h4><a href="<?php echo get_second_url("D403",$cateClass->getSecondLevel("D403")->secondArr["typeUrl"]); ?>"><?php echo $cateClass->getSecondLevel("D403")->secondArr["typeName"]; ?></a></h4>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single-product-cat">
									<a href="<?php echo get_second_url("D406",$cateClass->getSecondLevel("D406")->secondArr["typeUrl"]); ?>"><img src="https://www.machiibattery.com/images/D406.jpg" alt="" /></a>
									<h4><a href="<?php echo get_second_url("D406",$cateClass->getSecondLevel("D406")->secondArr["typeUrl"]); ?>"><?php echo $cateClass->getSecondLevel("D406")->secondArr["typeName"]; ?></a></h4>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single-product-cat">
									<a href="<?php echo get_second_url("D408",$cateClass->getSecondLevel("D408")->secondArr["typeUrl"]); ?>"><img src="https://www.machiibattery.com/images/D408.jpg" alt="" /></a>
									<h4><a href="<?php echo get_second_url("D408",$cateClass->getSecondLevel("D408")->secondArr["typeUrl"]); ?>"><?php echo $cateClass->getSecondLevel("D408")->secondArr["typeName"]; ?></a></h4>
								</div>
							</div>
						</div>
					</div>
					<!--products-tab-->
				</div>
			</div>
		</div>
	</div>
	<!--products-area end-->
	<!--products-tab start-->
	<div class="products-tab-area mt-45 mt-sm-40">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-md-3 pr-0">
					<div class="section-title">
						<h3>Electronics</h3>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 pl-0">
					<div class="product-nav-tabs style-3">
						<ul class="nav nav-tabs text-right">
							<li><a class="active" data-toggle="tab" href="#<?php echo $cateClass->getFirstLevel('A08')->firstArr["be_typeUrl"]; ?>"><?php echo $cateClass->getFirstLevel('A08')->firstArr["be_typeName"]; ?></a></li>
							<li><a data-toggle="tab" href="#<?php echo $cateClass->getFirstLevel('A03')->firstArr["be_typeUrl"]; ?>"><?php echo $cateClass->getFirstLevel('A03')->firstArr["be_typeName"]; ?></a></li>
							<li><a data-toggle="tab" href="#<?php echo $cateClass->getFirstLevel('A04')->firstArr["be_typeUrl"]; ?>"><?php echo $cateClass->getFirstLevel('A04')->firstArr["be_typeName"]; ?></a></li>
							<li><a data-toggle="tab" href="#<?php echo $cateClass->getFirstLevel('A12')->firstArr["be_typeUrl"]; ?>"><?php echo $cateClass->getFirstLevel('A12')->firstArr["be_typeName"]; ?></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="tab-content">
				<div id="<?php echo $cateClass->getFirstLevel('A08')->firstArr["be_typeUrl"]; ?>" class="tab-pane active">
					<div class="row product-carousel-fullwidth cv-visible">
						<?php echo GetHotNewEle('A08',"",1,8); ?>
					</div>
				</div>
				<div id="<?php echo $cateClass->getFirstLevel('A03')->firstArr["be_typeUrl"]; ?>" class="tab-pane fade">
					<div class="row product-carousel-fullwidth cv-visible">
						<?php echo GetHotNewEle('A03',"",1,8); ?>
					</div>
				</div>
				<div id="<?php echo $cateClass->getFirstLevel('A04')->firstArr["be_typeUrl"]; ?>" class="tab-pane fade">
					<div class="row product-carousel-fullwidth cv-visible">
						<?php echo GetHotNewEle('A04',"",1,8); ?>
					</div>
				</div>
				<div id="<?php echo $cateClass->getFirstLevel('A12')->firstArr["be_typeUrl"]; ?>" class="tab-pane fade">
					<div class="row product-carousel-fullwidth cv-visible">
						<?php echo GetHotNewEle('A12',"",1,8); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--products-tab end-->
	<!--products-tab start-->
	<div class="products-tab-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-md-3 pr-0">
					<div class="section-title">
						<h3>Battery</h3>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 pl-0">
					<div class="product-nav-tabs style-3">
						<ul class="nav nav-tabs text-right">
							<li><a class="active" data-toggle="tab" href="#accessories"><?php echo $cateClass->getFirstLevel('F6')->firstArr["be_typeName"]; ?></a></li>
							<li><a data-toggle="tab" href="#tv-fridge"><?php echo $cateClass->getFirstLevel('C3')->firstArr["be_typeName"]; ?></a></li>
							<li><a data-toggle="tab" href="#kitchen-appliance"><?php echo $cateClass->getFirstLevel('D4')->firstArr["be_typeName"]; ?></a></li>
							<li><a data-toggle="tab" href="#seasonal-appliances"><?php echo $cateClass->getFirstLevel('E5')->firstArr["be_typeName"]; ?></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="tab-content">
				<div id="accessories" class="tab-pane active">
					<div class="row product-carousel-fullwidth cv-visible">
						<?php echo GetProList("F6","","","","","","",1,8,1); ?>
					</div>
				</div>
				<div id="tv-fridge" class="tab-pane fade">
					<div class="row product-carousel-fullwidth cv-visible">
						<?php echo GetProList("C3","","","","","","",1,8,1); ?>
					</div>
				</div>
				<div id="kitchen-appliance" class="tab-pane fade">
					<div class="row product-carousel-fullwidth cv-visible">
						<?php echo GetProList("D4","","","","","","",1,8,1); ?>
					</div>
				</div>
				<div id="seasonal-appliances" class="tab-pane fade">
					<div class="row product-carousel-fullwidth cv-visible">
						<?php echo GetProList("E5","","","","","","",1,8,1); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--products-tab end-->
	
	<!--recently-viewed-products-start-->
	<div class="recent-viewed-products">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-2">
					<!--blog-list-widget-->
					<div class="sidebar-single">
						<div class="section-title">
							<h3>New Electronic</h3>
						</div>
						<div class="row blog-carousels mt-30">
							<?php echo GetHotNewEle("A","new",1,4); ?>
						</div>
					</div>
				</div>
				<div class="col-xl-10 mt-sm-40">
					<?php include("frame-hot-elect.php"); ?>
				</div>
			</div>
		</div>
	</div>
	<!--recently-viewed-products-end-->
	
	<!--brands-area start-->
	<?php include("frame-brandBanner.php"); ?>
	<!--brands-area end-->
	
	<!--footer-area start-->
	<?php include("frame-footer.php"); ?>
	<!--footer-area end-->
	<?php include("frame-js.php"); ?>
</body>
</html>
