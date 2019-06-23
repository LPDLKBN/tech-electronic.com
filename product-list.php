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
isset($_GET['cate'])?$type=$_GET['cate']:$type="";
isset($_GET['typename'])?$typename=$_GET['typename']:$typename="";
isset($_GET['brand'])?$brand=$_GET['brand']:$brand="default";
isset($_GET['series'])?$series=$_GET['series']:$series="default";
$series=str_replace("_", " ", $series);
// 表单提交
if (isset($_POST['round-price'])) {
	$roundPrice=$_POST['round-price'];
	$roundPrice=explode("-", preg_replace("/[\$\s]/","",$roundPrice));
} else {
	$roundPrice="";
};
isset($_POST['dladd'])?$dladd=$_POST['dladd']:$dladd="";
isset($_POST['dyadd'])?$dyadd=$_POST['dyadd']:$dyadd="";
isset($_POST['type'])?$attrType=$_POST['type']:$attrType="";
if ($type==""||$typename=="") {
	header("location:404.html");
};
$brandVal=$brand;
$seriesVal=$series;
if ($brandVal=="default") {
	$brandVal="";
	$seriesVal="";
};
if ($series=="default") {
	$seriesVal="";
};
$curpage = isset($_GET['page'])?$_GET['page']:1; //当前页
$showrow = 12; //一页显示的行数  
$urlStr = $type."/".$typename."/".$brand."/".$series;
$url = $urlStr."-{page}.html"; //分页地址
$total_rows = json_decode(Products::GetAttr($type,$brandVal,$seriesVal,$roundPrice,$dladd,$dyadd,$attrType,"",""));
$total_rows=count($total_rows);
if ((!empty($_GET['page']) && $total_rows != 0 && $curpage > ceil($total_rows / $showrow))){ 
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
};
$be_type=substr($type,0,2);
$arr=[];
$typeName = $cateClass->getSecondLevel($type)->secondArr["typeName"];
$typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
$arr["brand"]=$brandVal;
$arr["series"]=$seriesVal;
$arr["be_type"]=$be_type;
$arr["typeName"]=$typeName;
$arr['page']=$curpage;
?>
<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo $cateClass->get_meta_seo("category",$arr)->title; ?></title>
	<meta name="keyword" content="<?php echo $cateClass->get_meta_seo("category",$arr)->metaKeyword; ?>">
	<meta name="description" content="<?php echo $cateClass->get_meta_seo("category",$arr)->metaDescription; ?>">
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
	<?php include("frame-header.php"); ?>
	
	<!--products-area start-->
	<div class="shop-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-2 col-lg-3">
					<div class="sidebar">
						<?php include("frame-sidecate.php"); ?>
						<?php include("frame-sideattr.php"); ?>
						<!--latest-products-->
						<?php include("frame-recent.php"); ?>
					</div>
				</div>
				<div class="col-xl-10 col-lg-9">
					<div class="row align-items-center">
						<?php 
							if ($dladd!=""||$dyadd!=""||$attrType!="") {
						?>
						<ul class="col-lg-12 attr-checked">
							<?php if ($dladd!="") {
								foreach ($dladd as $i => $dlval) {
							?>
							<li><?php echo $dlval; ?><a href="javascript:;" data-id="dladd-<?php echo $i; ?>" title="remove"><i class="fa fa-close"></i></a></li>
							<?php } } ?>
							<?php if ($dyadd!="") {
								foreach ($dyadd as $i => $dyval) {
							?>
							<li><?php echo $dyval; ?><a href="javascript:;" data-id="dyadd-<?php echo $i; ?>" title="remove"><i class="fa fa-close"></i></a></li>
							<?php } } ?>
							<?php if ($attrType!="") {
								foreach ($attrType as $i => $attrTypeval) {
							?>
							<li><?php echo $attrTypeval; ?><a href="javascript:;" data-id="type-<?php echo $i; ?>" title="remove"><i class="fa fa-close"></i></a></li>
							<?php } } ?>
						</ul>
						<?php } ?>
						<div class="col-lg-2 col-md-6">
							<div class="section-title">
								<h3>List of <?php echo $cateClass->getSecondLevel($type)->secondArr["typeName"]; ?> brands<?php echo $brandVal!=""?" ● ".$brandVal." ".$seriesVal:""; ?></h3>
							</div>
						</div>
						<div class="col-lg-5 col-md-6">
							<div class="products-sort">
								<label>Brand:</label>
								<select name="brand" id="select-brand">
									<option value="<?php echo get_series_url($type,$typename,"default","default",1); ?>">Default</option>
									<?php  
										$result_arr=json_decode(Products::GetBrand($type,"",""));
							            foreach ($result_arr as $rowbt) {
							                $sleBrand=$rowbt->cs;
									?>
									<option value="<?php echo get_series_url($type,$typename,$sleBrand,"default",1); ?>" <?php echo strtolower($brand)==strtolower($sleBrand)?"selected":""; ?>><?php echo $sleBrand; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="products-sort">
								<label>Series:</label>
								<select id="select-series" style="<?php echo $brandVal==""?"background: #ddd":""; ?>" <?php echo $brandVal==""?"disabled":""; ?>>
									<option value="<?php echo get_series_url($type,$typename,$brand,"default",1); ?>"><?php echo $brandVal==""?"":"default"; ?></option>
									<?php  
										$result_series=json_decode(Products::GetSeriesNav($type,$brandVal));
										$sleSeriesArr=[];
							            foreach ($result_series as $resVal) {
							                $sleSeries0=$resVal->seriesadd;
							                $sleSeries0=explode(",", $sleSeries0);
							                foreach ($sleSeries0 as $key => $sleSeriesVal) {
							                	$sleSeriesArr[]=$sleSeriesVal;
							                };
							            }
							            $sleSeriesArr=array_filter(array_unique($sleSeriesArr));
							            foreach ($sleSeriesArr as $sleSeries) {
									?>
									<option value="<?php echo get_series_url($type,$typename,$brand,$sleSeries,1); ?>" <?php echo strtolower($series)==strtolower($sleSeries)?"selected":""; ?>><?php echo $sleSeries; ?></option>
									<?php } ?>
								</select>						
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
								<?php echo GetProList($type,$brandVal,$seriesVal,$roundPrice,$dladd,$dyadd,$attrType,$curpage,$showrow,2) ?>
							</div>
						</div>
						<div id="list-products" class="tab-pane active">
							<?php echo GetProList($type,$brandVal,$seriesVal,$roundPrice,$dladd,$dyadd,$attrType,$curpage,$showrow,3) ?>
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
		$("#select-series").change(function () {
			var seriesVal=$(this).children('option:selected').val();
			location.href=seriesVal;
		});
		$(".page a").on('click',function () {
			var dataUrl = $(this).attr("data-url");
			$("#submit-attr").attr("action",dataUrl);
			$("#submit-attr").submit();
		});
		$(".attr-checked a").on("click",function (){
			var inputId = $(this).attr("data-id");
			$("#"+inputId).attr("checked",false).siblings("label").removeClass("act");
			setTimeout(function () {
				$("#submit-attr").submit();
			},100);
		});
	</script>
</body>
</html>
