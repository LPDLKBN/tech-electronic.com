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
require_once("data/get_product_video.php");
require_once("data/fun.php");
require_once("data/page.class.php");
$cateClass = new Category;
$curpage = isset($_GET['page'])?$_GET['page']:1; //当前页
$showrow = 12; //一页显示的行数  
$url = "battery-video-{page}.html"; //分页地址
$total_rows = json_decode(Products::GetVideoList("","",""));
$total_rows=count($total_rows);
if ((!empty($_GET['page']) && $total_rows != 0 && $curpage > ceil($total_rows / $showrow))){ 
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
};
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
    <title><?php echo $cateClass->get_meta_seo("video")->title; ?></title>
    <meta name="keyword" content="<?php echo $cateClass->get_meta_seo("video")->metaKeyword; ?>">
    <meta name="description" content="<?php echo $cateClass->get_meta_seo("video")->metaDescription; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include("frame-css.php"); ?>
</head>

<body>
	<h1 id="top-h1"><?php echo $cateClass->get_meta_seo("video")->title; ?></h1>
	<?php include("frame-header.php"); ?>

	<!--breadcrumb-area start-->
	<div class="breadcrumb-area mt-25  mb-20">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumbs">
						<ul>
							<li><a href="index.html">Home<i class="fa fa-angle-right"></i></a></li>
							<li><a href="<?php echo $cateClass->allType["allTypeUrl"]; ?>"><?php echo $cateClass->allType["allTypeName"]; ?><i class="fa fa-angle-right"></i></a></li>
							<li class="active">battery video</li>
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
			<div class="product-video">
				<div class="row">
					<div class="col-md-12">
						<?php echo GetVideo(true); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12 col-lg-12">
					<div class="row align-items-center">
						<div class="col-lg-5 col-md-4">
							<div class="section-title">
								<h3>Corresponding product</h3>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetVideoList("",$curpage,$showrow,"",true) ?>
						</div>
					</div>
					<div class="row align-items-center mt-30">
						<?php  
							if ($total_rows > $showrow) {//总记录数大于每页显示数，显示分页  
							    $page = new page($total_rows, $showrow, $curpage, $url, 2);  
							    echo $page->myde_write(); 
							};
						?>
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
	$(".video-nav video").on("click",function (e) {
		var srcVideo = $(e.target).attr("src");
		$(".video-play video").attr("src",srcVideo);
		$(".video-play video").trigger("play");
	});
	$("#page a").on('click',function () {
		var dataUrl = $(this).attr("data-url");
		window.location.href=dataUrl;
	});
	</script>
</body>
</html>