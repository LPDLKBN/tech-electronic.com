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
$cateClass = new Category;
isset($_GET['contype'])?$conType=$_GET['contype']:$conType="new";
isset($_GET['brand'])?$brand=$_GET['brand']:$brand="default";
$arr = array();
$brandVal=$brand;
if ($brandVal=="default") {
	$brandVal="";
};
$curpage = isset($_GET['page'])?$_GET['page']:1; //当前页
$showrow = 36; //一页显示的行数  
$urlStr = "battery-".$conType."-".$brand;
$url = $urlStr."-{page}.html"; //分页地址
$total_rows = json_decode(Products::GetCount("",$brandVal,$conType));
$total_rows=$total_rows[0]->num;
if ($total_rows>80) {
	$total_rows=80;
};
if ((!empty($_GET['page']) && $total_rows != 0 && $curpage > ceil($total_rows / $showrow))){ 
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
};
$arr["brand"] = $brandVal;
if ($conType=="hot") {
	$tit_h = "Best-selling ".$brandVal." brand";
}
if ($conType=="new") {
	$tit_h = "New ".$brandVal." products";
}
$arr['page']=$curpage;
?>
<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<title><?php echo $cateClass->get_meta_seo($conType,$arr)->title; ?></title>
    <meta name="keyword" content="<?php echo $cateClass->get_meta_seo($conType,$arr)->metaKeyword; ?>">
    <meta name="description" content="<?php echo $cateClass->get_meta_seo($conType,$arr)->metaDescription; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<base href="<?php echo $_config['base_url']; ?>">
	<?php if ($curpage!=1) { 
		$prev = $curpage-1;
	?>
	<link rel="prev" href="<?php echo $_config['base_url'].$urlStr."-".$prev.".html"; ?>" />
	<?php } ?>
	<?php if ( $curpage != ceil($total_rows / $showrow) ) { 
		$next = $curpage+1;
	?>
	<link rel="next" href="<?php echo $_config['base_url'].$urlStr."-".$next.".html"; ?>" />
	<?php } ?>
	<?php include("frame-css.php"); ?>
</head>

<body>
	<h1 id="top-h1"><?php echo $cateClass->get_meta_seo($conType,$arr)->title; ?></h1>
	<?php include("frame-header.php"); ?>
	<!--breadcrumb-area start-->
	<div class="breadcrumb-area mt-25  mb-20">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumbs">
						<ul>
							<li><a href="index.html">Home<i class="fa fa-angle-right"></i></a></li>
							<li><?php echo $conType; ?></a></li>
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
				<div class="col-xl-12 col-lg-12">
					<div class="row align-items-center">
						<div class="col-lg-5 col-md-4">
							<div class="section-title">
								<h3><?php echo $tit_h; ?></h3>
							</div>
						</div>
						<div class="col-lg-5 col-md-6">
							<div class="products-sort">
								<label>Brand:</label>
								<select name="brand" id="select-brand">
									<option value="<?php echo "battery-".$conType."-default-1.html"; ?>">Default</option>
									<?php  
										$result_arr=json_decode(Products::GetBrand("","",""));
							            foreach ($result_arr as $rowbt) {
							                $sleBrand=$rowbt->cs;
							                $is_exsit = json_decode(Products::GetCount("",$sleBrand,$conType));
							                if ($is_exsit[0]->num!=0) {
									?>
									<option value="<?php echo "battery-".$conType."-".strtolower($sleBrand)."-1.html"; ?>" <?php echo strtolower($brand)==strtolower($sleBrand)?"selected":""; ?>><?php echo $sleBrand; ?></option>
									<?php } } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div class="row">
							<?php echo GetProList($conType,$brandVal,"","","","","",$curpage,$showrow,5) ?>
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
		$("#select-brand").change(function () {
			var brandVal=$(this).children('option:selected').val();
			location.href=brandVal;
		});
		$(".page a").on('click',function () {
			var dataUrl = $(this).attr("data-url");
			window.location.href=dataUrl;
		});
	</script>
</body>
</html>
