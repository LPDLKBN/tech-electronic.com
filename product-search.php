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
require_once("data/page.class.php");
require_once("data/get_product_search.php");
$cateClass = new Category;
isset($_GET["keystr"])?$keystr=$_GET["keystr"]:$keystr="acer Aspire";
isset($_GET["type"])?$type=$_GET["type"]:$type="";
$keystr=trim($keystr);
$keystr=str_replace("+", ",", $keystr);
$keystr=str_replace(" ", ",", $keystr);
$keystr=str_replace("-", ",", $keystr);
$keyarr=explode(",", $keystr);
$curpage = isset($_GET['page'])?$_GET['page']:1; //当前页
$showrow = 12; //一页显示的行数  
$url = "search.html?page={page}&keystr=$keystr&type=$type"; //分页地址
$total_rows = json_decode(Products::GetSearch($type,$keyarr,"",""));
$total_rows=count($total_rows);
if ((!empty($_GET['page']) && $total_rows != 0 && $curpage > ceil($total_rows / $showrow))){ 
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
};
if ($type!="") {
	$be_type=substr($type,0,2);
};
$arr["keystr"]=$keystr;
$arr['page']=$curpage;
?>
<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<title><?php echo $cateClass->get_meta_seo("search",$arr)->title; ?></title>
    <meta name="keyword" content="<?php echo $cateClass->get_meta_seo("search",$arr)->metaKeyword; ?>">
    <meta name="description" content="<?php echo $cateClass->get_meta_seo("search",$arr)->metaDescription; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<base href="<?php echo $_config['base_url']; ?>">
	<?php if ($curpage!=1) { 
		$prev = $curpage-1;
	?>
	<link rel="prev" href="<?php echo $_config['base_url']."search.html?page=".$prev."&keystr=$keystr&type=$type"; ?>" />
	<?php } ?>
	<?php if ( $curpage != ceil($total_rows / $showrow) ) { 
		$next = $curpage+1;
	?>
	<link rel="next" href="<?php echo $_config['base_url']."search.html?page=".$next."&keystr=$keystr&type=$type"; ?>" />
	<?php } ?>
	<?php include("frame-css.php"); ?>
</head>

<body>
	<?php include("frame-header.php"); ?>
	<!--breadcrumb-area start-->
	<div class="breadcrumb-area mt-25  mb-20">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumbs">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li class="active"><?php echo $keystr; ?></li>
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
						<!--latest-products-->
						<?php include("frame-recent.php"); ?>
					</div>
				</div>
				<div class="col-xl-10 col-lg-9">
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3><?php echo $typeName." ".$keystr; ?></h3>
							</div>
						</div>
						<div class="col-lg-5 col-md-12">
							<div class="site-pagination pull-right row">
								<?php  
									if ($total_rows > $showrow) {//总记录数大于每页显示数，显示分页  
									    $page = new page($total_rows, $showrow, $curpage, $url, 2);  
									    echo $page->myde_write(); 
									};
								?>
							</div>
							<div class="product-view-system pull-right" role="tablist">
								<ul class="nav nav-tabs">
									<li><a data-toggle="tab" href="#grid-products"><img src="static/picture/icon-grid.png" alt="" /></a></li>
									<li><a class="active" data-toggle="tab" href="#list-products"><img src="static/picture/icon-list.png" alt="" /></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div id="grid-products" class="tab-pane">
							<div class="row">
								<?php echo getSearchList($type,$keyarr,$curpage,$showrow,1); ?>
							</div>
						</div>
						<div id="list-products" class="tab-pane active">
							<?php echo getSearchList($type,$keyarr,$curpage,$showrow,2); ?>
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
		$(".page a").on('click',function () {
			var dataUrl = $(this).attr("data-url");
			window.location.href=dataUrl;
		});
	</script>
</body>
</html>
