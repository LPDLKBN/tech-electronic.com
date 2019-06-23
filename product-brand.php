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
$arr=[];
isset($_GET['cate'])?$type=$_GET['cate']:$type="";
isset($_GET['typename'])?$typename=$_GET['typename']:$typename="";
if ($type==""||$typename=="") {
	header("location:404.html");
};
$be_type=substr($type,0,2);
$typeName = $cateClass->getSecondLevel($type)->secondArr["typeName"];
$typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
$arr["be_type"]=$be_type;
$arr["typeName"]=$typeName;
?>
<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<title><?php echo $cateClass->get_meta_seo("brand",$arr)->title; ?></title>
    <meta name="keyword" content="<?php echo $cateClass->get_meta_seo("brand",$arr)->metaKeyword; ?>">
    <meta name="description" content="<?php echo $cateClass->get_meta_seo("brand",$arr)->metaDescription; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<base href="<?php echo $_config['base_url']; ?>">
	<?php include("frame-css.php"); ?>
</head>

<body>
	<h1 id="top-h1"><?php echo $cateClass->get_meta_seo("brand")->title; ?></h1>
	<?php include("frame-header.php"); ?>
	<!--breadcrumb-area start-->
	<div class="breadcrumb-area mt-25  mb-20">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumbs">
						<ul>
							<li><a href="index.html">Home<i class="fa fa-angle-right"></i></a></li>
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
						<div class="col-lg-12">
							<div class="section-title">
								<h3 id="B2"><?php echo $cateClass->getFirstLevel("B2")->firstArr["be_typeName"]; ?> Brand</h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo getBrandSeries($type,""); ?>
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
