<?php
require_once("data/config.php");
require_once("data/sql.class.php");
require_once("data/get_category.class.php");
require_once("data/get_category.php");
require_once("data/get_product_list.php");
require_once("data/get_recent_list.php");
require_once("data/get_elect_list.php");
require_once("data/get_brand_series.php");
require_once("data/fun.php");
$cateClass = new Category;
isset($_GET['cate'])?$type=$_GET['cate']:$type="";
isset($_GET['typename'])?$typename=$_GET['typename']:$typename="";
$be_type=substr($type,0,3);
if (isset($_POST['round-price'])) {
	$roundPrice=$_POST['round-price'];
	$roundPrice=explode("-", preg_replace("/[\$\s]/","",$roundPrice));
} else {
	$roundPrice="";
};
$curpage = isset($_GET['page'])?$_GET['page']:1; //当前页
$showrow = 12; //一页显示的行数  
$urlStr = $type."/".$typename;
$url = $urlStr."-{page}.html"; //分页地址
$total_rows = json_decode(Products::GetEle($type,$roundPrice,"",""));
$total_rows=count($total_rows);
if ((!empty($_GET['page']) && $total_rows != 0 && $curpage > ceil($total_rows / $showrow))){ 
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
};
$arr=[];
if (strlen($type)===3) {
	$typeName = $cateClass->getFirstLevel($type)->firstArr["be_typeName"];
	$typeUrl0 = $cateClass->getFirstLevel($type)->firstArr["be_typeUrl"];	
} else {
	$typeName = $cateClass->getSecondLevel($type)->secondArr["typeName"];
	$typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
}
$arr["be_type"]=$be_type;
$arr["typeName"]=$typeName;
$arr['page']=$curpage;
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo $cateClass->get_meta_seo("category",$arr)->title; ?></title>
	<meta name="keyword" content="<?php echo $cateClass->get_meta_seo("category",$arr)->metaKeyword; ?>">
	<meta name="description" content="<?php echo $cateClass->get_meta_seo("category",$arr)->metaDescription; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<base href="<?php echo $_config['base_url']; ?>">
	<?php include("frame-css.php"); ?>
</head>

<body>
	<h1 id="top-h1"><?php echo $cateClass->get_meta_seo("category",$arr)->title; ?></h1>
	<?php include("frame-header.php"); ?>
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
								<h3>List of <?php echo $cateClass->getSecondLevel($type)->secondArr["typeName"]; ?> brands<?php echo $brandVal!=""?" ● ".$brandVal." ".$seriesVal:""; ?></h3>
							</div>
						</div>
						<div class="col-lg-5 col-md-12">
							<div class="site-pagination pull-right">
								<?php  
									if ($total_rows > $showrow) {//总记录数大于每页显示数，显示分页  
									    $page = new page($total_rows, $showrow, $curpage, $url, 2);  
									    echo $page->myde_write(); 
									};
								?>
							</div>
							<div class="product-view-system pull-right" role="tablist">
								<ul class="nav nav-tabs">
									<li><a class="active" data-toggle="tab" href="#grid-products"><img src="static/picture/icon-grid.png" alt="" /></a></li>
									<li><a data-toggle="tab" href="#list-products"><img src="static/picture/icon-list.png" alt="" /></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="tab-content">
						<div id="grid-products" class="tab-pane active">
							<div class="row">
								<?php echo GetEleList($type,$roundPrice,$curpage,$showrow,1); ?>
							</div>
						</div>
						<div id="list-products" class="tab-pane">
							<?php echo GetEleList($type,$roundPrice,$curpage,$showrow,2); ?>
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
						<?php include("frame-hot-elect.php"); ?>
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
