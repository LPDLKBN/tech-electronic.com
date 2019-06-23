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
isset($_GET["site"])?$site=$_GET["site"]:$site="";
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $cateClass->get_meta_seo("battery")->title; ?></title>
    <?php if ($site!="") { ?>
    <link rel="canonical" href="https://www.machiibattery.com/battery.html"/>
    <?php } ?>
    <meta name="keyword" content="<?php echo $cateClass->get_meta_seo("battery")->metaKeyword; ?>">
    <meta name="description" content="<?php echo $cateClass->get_meta_seo("battery")->metaDescription; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<base href="<?php echo $_config['base_url']; ?>">
	<?php include("frame-css.php"); ?>
</head>

<body>
	<h1 id="top-h1"><?php echo $cateClass->get_meta_seo("battery")->title; ?></h1>
	<?php include("frame-header.php"); ?>
	<!--breadcrumb-area start-->
	<div class="breadcrumb-area mt-25  mb-20">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumbs">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li class="active"><a  href="<?php echo $cateClass->allType["allTypeUrl"]; ?>"><?php echo $cateClass->allType["allTypeName"]; ?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--breadcrumb-area end-->
	<!--products-area start-->
	<div class="shop-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-2 col-lg-3">
					<div class="sidebar">
						<?php include("frame-sidecate.php"); ?>
						<?php include("frame-brandnav.php"); ?>
						<!--latest-products-->
						<?php include("frame-recent.php"); ?>
					</div>
				</div>
				<div class="col-xl-10 col-lg-9">
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="B2"><?php echo $cateClass->getFirstLevel("B2")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("B2","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="C3"><?php echo $cateClass->getFirstLevel("C3")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("C3","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="D4"><?php echo $cateClass->getFirstLevel("D4")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("D4","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="E5"><?php echo $cateClass->getFirstLevel("E5")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("E5","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="F6"><?php echo $cateClass->getFirstLevel("F6")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("F6","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="G7"><?php echo $cateClass->getFirstLevel("G7")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("G7","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="H8"><?php echo $cateClass->getFirstLevel("H8")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("H8","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="K9"><?php echo $cateClass->getFirstLevel("K9")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("K9","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="A01"><?php echo $cateClass->getFirstLevel("A01")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("A01","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="A02"><?php echo $cateClass->getFirstLevel("A02")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("A02","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="A03"><?php echo $cateClass->getFirstLevel("A03")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("A03","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="A04"><?php echo $cateClass->getFirstLevel("A04")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("A04","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="A05"><?php echo $cateClass->getFirstLevel("A05")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("A05","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="A06"><?php echo $cateClass->getFirstLevel("A06")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("A06","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="A07"><?php echo $cateClass->getFirstLevel("A07")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("A07","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="A08"><?php echo $cateClass->getFirstLevel("A08")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("A08","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="A09"><?php echo $cateClass->getFirstLevel("A09")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("A09","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="A11"><?php echo $cateClass->getFirstLevel("A11")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("A11","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="A12"><?php echo $cateClass->getFirstLevel("A12")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("A12","",4); ?>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3 id="A13"><?php echo $cateClass->getFirstLevel("A13")->firstArr["be_typeName"]; ?></h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetCatecory("A13","",4); ?>
						</div>
					</div>
					<!--recently-viewed-products-start-->
					<div class="recent-viewed-products mt-50">
						<?php include("frame-hot.php"); ?>
					</div>
					<!--recently-viewed-products-end-->
				</div>
			</div>
		</div>
	</div>
	<!--products-area end-->
	
	<!--brands-area start-->
	<?php include("frame-brandBanner.php"); ?>
	<!--brands-area end-->
	
	<!--footer-area start-->
	<?php include("frame-footer.php"); ?>
	<!--footer-area end-->
	<?php include("frame-js.php"); ?>
	<script>
		$(".page a").on('click',function () {
			var dataUrl = $(this).attr("data-url");
			window.location.href=dataUrl;
		});
	</script>
</body>
</html>
