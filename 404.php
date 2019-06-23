<?php
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
	
	<!--404-area start-->
	<div class="error-msg-area display-table">
		<div class="vertical-middle">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-12">
						<div class="error-msg text-center">
							<img src="static/picture/404.png" alt="" />
							<h1>Opps! This page Could Not Be Found!</h1>
							<p>Sorry bit the page you are looking for does not exist, have been removed or name changed</p>
							<a href="index.html" class="btn-common mt-75">go to homepage</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--404-area end-->
	
	<!--footer-area start-->
	<?php include("frame-footer.php"); ?>
	<!--footer-area end-->
	<?php include("frame-js.php"); ?>
</body>
</html>
