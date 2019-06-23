<?php
session_start();
if (!isset($_SESSION['pcode'])) {
	$_SESSION['pcode'] = array();
};
require_once("data/config.php");
require_once("data/sql.class.php");
require_once("data/get_category.class.php");
require_once("data/get_category.php");
require_once("data/get_product_list.php");
require_once("data/get_elect_list.php");
require_once("data/get_brand_series.php");
require_once("data/get_recent_list.php");
require_once("data/fun.php");
require_once("data/page.class.php");
require_once("data/more_img_class.php");
require_once("data/get_product_similar.php");
$cateClass = new Category;
isset($_GET['typename'])?$typename=$_GET['typename']:$typename="";
isset($_GET['keyword'])?$keyword=$_GET['keyword']:$keyword="";
isset($_GET['pid'])?$pid=$_GET['pid']:$pid="";
$result_arr=json_decode(Products::GetProductInfo($keyword,$pid));
$arr=(array)$result_arr;
$arr['keyword']=$keyword;
$type=$result_arr[0]->category;
$be_type=substr($type,0,3);
$brand=$result_arr[0]->cs;
$dl=$result_arr[0]->dl;
$dy=$result_arr[0]->dy;
$attrType=$result_arr[0]->type;
$color=$result_arr[0]->color;
$size=$result_arr[0]->size;
$rep=$result_arr[0]->rep;
$comp=$result_arr[0]->comp;
$jianjie1=$result_arr[0]->jianjie1;
$jianjie0=getjan($jianjie1);
$jianjie2=$result_arr[0]->jianjie2;
$series=$result_arr[0]->seriesadd;
$price=get_ouprice($result_arr[0]->pprice);
$oldprice=get_old($result_arr[0]->pprice);
$pcode=$result_arr[0]->pcode;
$okpcode=$result_arr[0]->okpcode;
$imgUrl=get_img_file($type)."/".$okpcode.".jpg";
$imgmore=$result_arr[0]->imgmore;
$typeName = $cateClass->getSecondLevel($type)->secondArr["typeName"];
$typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
$arr["be_type"]=$be_type;
$arr["typeName"]=$typeName;
$productUrl = get_products_url($jianjie0,$type,$typeUrl0,$pid);
$typeListUrl = get_brand_url($type,$typeUrl0);
// 查询评论
$sqlReview=json_decode(Products::GetReview($pcode));
$reviewCount = count($sqlReview);
$average = $result_arr[0]->average;
if (!in_array($pcode,$_SESSION['pcode'])) {
	array_push($_SESSION['pcode'], $pcode);
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $cateClass->get_meta_seo("product",$arr)->title; ?></title>
        <meta name="keyword" content="<?php echo $cateClass->get_meta_seo("product",$arr)->metaKeyword; ?>">
        <meta name="description" content="<?php echo $cateClass->get_meta_seo("product",$arr)->metaDescription; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="<?php echo $_config['base_url']; ?>">
		<?php include("frame-css.php"); ?>
		<script type="application/ld+json">
		{
		  "@context": "https://schema.org/",
		  "@type": "Product",
		  "name": "<?php echo $brand." ".$jianjie0; ?>",
		  "image": [
		    "<?php echo $imgUrl; ?>"
		   ],
		  "description": "<?php echo $cateClass->getSecondLevel($type)->secondArr["typeName"]; ?> <?php echo $jianjie0; ?> <?php echo $jianjie2; ?>",
		  "sku": "<?php echo $pcode; ?>",
		  "mpn": "<?php echo $jianjie0; ?>",
		  "brand": {
		    "@type": "Thing",
		    "name": "<?php echo $brand; ?>"
		  },
		<?php if ($reviewCount!=0) { ?>
		  "aggregateRating": {
		    "@type": "AggregateRating",
		    "ratingValue": <?php echo $average==""?5:$average; ?>,
		    "reviewCount": <?php echo $reviewCount; ?>
		  },
		<?php } ?>
		  "offers": {
		    "@type": "Offer",
		    "url": "<?php echo $_config['https'].'/'.$productUrl; ?>",
		    "priceCurrency": "<?php echo $unit; ?>",
		    "price": "<?php echo $price; ?>",
		    "priceValidUntil": "2020-11-05",
		    "itemCondition": "https://schema.org/UsedCondition",
		    "availability": "https://schema.org/<?php echo $result_arr[0]->stock=="ok"?'InStock':'Discontinued'; ?>",
		    "seller": {
		      "@type": "Organization",
		      "name": "Executive Objects"
		    }
		  }
		}
		</script>
		<script type="application/ld+json">
		{
		  "@context": "https://schema.org",
		  "@type": "BreadcrumbList",
		  "itemListElement": [{
		    "@type": "ListItem",
		    "position": 1,
		    "name": "Home",
		    "item": "<?php echo $_config['https']; ?>/index.html"
		  },{
		    "@type": "ListItem",
		    "position": 2,
		    "name": "<?php echo $cateClass->allType["allTypeName"]; ?>",
		    "item": "<?php echo $_config['https'].'/'.$cateClass->allType["allTypeUrl"]; ?>"
		  },{
		    "@type": "ListItem",
		    "position": 3,
		    "name": "<?php echo $cateClass->getFirstLevel($be_type)->firstArr["be_typeName"]; ?>",
		    "item": "<?php echo $_config['https'].'/'.$cateClass->allType["allTypeUrl"]; ?>?site=<?php echo $be_type; ?>"
		  },{
		    "@type": "ListItem",
		    "position": 4,
		    "name": "<?php echo $cateClass->getSecondLevel($type)->secondArr["typeName"]; ?>",
		    "item": "<?php echo $_config['https'].'/'.$typeListUrl; ?>"
		  },{
		    "@type": "ListItem",
		    "position": 5,
		    "name": "<?php echo $brand." ".$keyword; ?>",
		    "item": "<?php echo $_config['https'].'/'.$productUrl; ?>"
		  }]
		}
</script>
<body>
	<!--[if lte IE 9]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->
	<h1 id="top-h1"><?php echo $cateClass->get_meta_seo("product",$arr)->title; ?></h1>
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
							<li><a href="<?php echo $cateClass->allType["allTypeUrl"]; ?>?site=<?php echo $be_type; ?>"><?php echo $cateClass->getFirstLevel($be_type)->firstArr["be_typeName"]; ?><i class="fa fa-angle-right"></i></a></li>
							<li><a href="<?php echo $typeListUrl; ?>"><?php echo $cateClass->getSecondLevel($type)->secondArr["typeName"]; ?><i class="fa fa-angle-right"></i></a></li>
							<li><?php echo $brand." ".$keyword; ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--breadcrumb-area end-->
	<!--product-details-area start-->
	<div class="product-details-area mt-20">
		<div class="container-fluid">
			<div class="product-details data_input">
				<div class="row">
					<div class="col-lg-1 col-md-2">
						<div class="nav nav-tabs products-nav-tabs product-img-tab">
							<?php
                            if (!empty($imgmore)) {
                                $img_arry=GetMoreimages::GetMoreImg($imgmore);
                                $count=count($img_arry);
                                $j=0;
                                foreach ($img_arry as $key=>$value){
                                    $img=get_img_file($type)."/".$value.".jpg";
                                    if(!empty($img)){
                            ?>
                            <div><a <?php echo $j==0?"class='active'":""; ?> data-toggle="tab" href="#product-<?php echo $key; ?>"><img src="<?php echo $img; ?>"/></a></div>
							<?php $j++; } } }
                        	else { ?>
                        	<div><a class="active" data-toggle="tab" href="#product"><img src="<?php echo $imgUrl; ?>" /></a></div>
							<?php } ?>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="tab-content">
							<?php
                            if (!empty($imgmore)) {
                                $img_arry=GetMoreimages::GetMoreImg($imgmore);
                                $count=count($img_arry);
                                $j=0;
                                foreach ($img_arry as $key=>$value){
                                    $img=get_img_file($type)."/".$value.".jpg";
                                    if(!empty($img)){
                            ?>
                            <div id="product-<?php echo $key; ?>" class="tab-pane fade <?php echo $j==0?"in show active":""; ?>">
								<div class="product-details-thumb">
									<a class="venobox" data-gall="myGallery" href="<?php echo $img; ?>"><i class="fa fa-search-plus"></i></a>
									<img src="<?php echo $img; ?>"/>
								</div>
							</div>
							<?php $j++; } } }
                        	else { ?>
                        	<div id="product" class="tab-pane fade in show active">
								<div class="product-details-thumb">
									<a class="venobox" data-gall="myGallery" href="<?php echo $imgUrl; ?>"><i class="fa fa-search-plus"></i></a>
									<img src="<?php echo $imgUrl; ?>"/>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="col-lg-7 mt-sm-50">
						<div class="row">
							<div class="col-lg-8 col-md-7">
								<div class="product-details-desc">
									<h2><?php echo $cateClass->getSecondLevel($type)->secondArr["typeName"]; ?> <?php echo $keyword; ?> <?php echo $jianjie2; ?></h2>
									<div class="product-rating-control">
										<div class="ave-star">
											<span class="rating">
												<?php 
													for ($i=0; $i < 5; $i++) { 
														if ($i+0.5 < round($average)) { 
												?>
												<i class="fa fa-star"></i>
													<?php } else { ?>
												<i class="fa fa-star-o"></i>
												<?php } } ?>
											</span>
											<span>(<?php echo $reviewCount; ?>)</span>
											<div class="rating-details">
												<p><span><?php echo $average==""?5:$average; ?></span> out of 5 stars</p>
												<div class="rating-num">
													<table class="table table-condensed table-hover">
														
													</table>
												</div>
												<a href="javascript:;" onclick="toDetail(3)"><?php echo $average==""?"Go to comment":"See all ".$reviewCount." review"; ?> >></a>
											</div>
										</div>
										<a href="javascript:;" onclick="toDetail(3)">Customer reviews</a>
										/
										<a href="javascript:;" onclick="toDetail(2)">More details</a>
										/
										<a href="mailto:<?php echo $_config['domain_email'].$_SERVER["SERVER_NAME"]; ?>">contact us</a>
									</div>
									<ul>
										<li>1.6 GHz dual-core Intel Core i5 (Turbo Boost up to 2.7 GHz) with 3 MB shared L3 cache 8 GB of 1600 MHz LPDDR3 RAM; 128 GB PCIe-based flash storage</li>
										<li>13.3-Inch (diagonal) LED-backlit Glossy Widescreen Display, 1440 x 900 resolution Intel HD Graphics 6000</li>
										<li>OS X El Capitan, Up to 12 Hours of Battery Life Macbook Air does not have a Retina display on any model.</li>
									</ul>
									<div class="product-meta">
										<ul class="list-none">
											<li>SKU: <?php echo $pcode; ?> <span>|</span></li>
											<li>Categoriess: 
												<a href="<?php echo $typeListUrl; ?>" title="<?php echo $typeName; ?>"><?php echo $typeName; ?></a> 
												<span>|</span>
											</li>
											<li>Brand: 
												<?php echo $brand; ?>
												<span>|</span>
											</li>
											<?php 
												if ($type=="B218"||$type=="B219") {
													$dlname="DC Outpu";
            										$dyname="Input Voltage";
												} else {
													$dlname="Capacity";
										            $dyname="Volt";
												}
											?>
											<?php if ($dl!=""||$dl!=null) { ?>
											<li><?php echo $dlname; ?>: <?php echo $dl; ?>
												<span>|</span>
											</li>
											<?php } ?>
											<?php if ($dy!=""||$dy!=null) { ?>
											<li><?php echo $dyname; ?>: <?php echo $dy; ?>
											</li>
											<?php } ?>
										</ul>
									</div>
									<div class="social-icons style-5">
										<span>Share Link:</span>
										<a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-google-plus"></i></a>
										<a href="#"><i class="fa fa-rss"></i></a>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-5">
								<div class="product-action stuck text-left">
									<div class="free-delivery">
										<img src="https://www.tuttebatterie.com/img/s-pic/paypal_verified_seal.png" alt="">
									</div>
									<div class="product-price-rating">
										<div>
											<del><?php echo $oldprice." ".$unit; ?></del>
										</div>
										<span><?php echo $price." ".$unit; ?></span>
									</div>
									<form action="data/cart_buy.php" method="post">
										<?php 
											$colorarr = explode('|',trim($color));
											$colornum = count($colorarr);
											if ($colornum>1) {
										?>
										<div class="product-colors mt-20">
											<label>Select Color:</label>
											<ul class="list-none">
												<?php
													$coloridx=0;
													foreach ($colorarr as $colorval) {
														$coloridx++;
												?>
												<li <?php echo $coloridx==1?"class='act'":""; ?>>
													<input id="<?php echo $colorval; ?>" type="radio" name="color" value="<?php echo $colorval; ?>" <?php echo $coloridx==1?"checked":""; ?>/>
													<label for="<?php echo $colorval; ?>"><span class="color_chose" style="background-color:<?php echo $colorval; ?>"><i class="fa fa-check"></i></span></label>
												</li>
												<?php } ?>
											</ul>
										</div>
										<?php } ?>
										<div class="product-quantity mt-15">
											<label>Quatity:</label>
											<a href="javascript:;" class="btn btn-primary btn-count active" role="button" count="reduce" onclick="countNum(this)">-</a>
											<input type="number" onkeyup="modify(this);" name="gwc_shuliang" min="1" max="999" value="1" />
											<a href="javascript:;" class="btn btn-primary btn-count active" role="button" count="plus" onclick="countNum(this)">+</a>
										</div>
										<div class="add-to-get mt-50">
											<button type="submit" class="add-to-cart">Buy now</button>
											<a href="javascript:;" onclick="flyToCart(this)" class="add-to-cart compare">+ ADD to Compare</a>
											<input type="hidden" name="pid" value="<?php echo $pid; ?>"/>
											<input type="hidden" name="jian" value="<?php echo $jianjie0; ?>"/>
											<input type="hidden" name="gwc_procode" value="<?php echo $pcode; ?>"/>
											<input type="hidden" name="gwc_prodes" value="<?php echo $jianjie2; ?>"/>
										</div>
									</form>
									<!-- <div class="product-features mt-50">
										<ul class="list-none">
											<li>Satisfaction 100% Guaranteed</li>
											<li>Free shipping on orders over $99</li>
											<li>14 day easy Return</li>
										</ul>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--product-details-area end-->
	
	<!--product-specifications-area start-->
	<div class="product-review-area mt-45">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<ul class="nav nav-tabs product-review-nav">
						<li><a class="active" data-toggle="tab" href="#description">Description</a></li>
						<li><a data-toggle="tab" href="#specifications">Product parameters</a></li>
						<li><a data-toggle="tab" href="#reviews">Reviews (<?php echo $reviewCount; ?>)</a></li>
					</ul>
					<div class="tab-content">
						<div id="description" class="tab-pane fade in show active">
							<div class="product-description">
								<h2>Product information</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim  veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
								<div class="row align-items-center mt-20">
									<div class="col-lg-4">
										<img src="static/picture/global.png" alt="" />
									</div>
									<div class="col-lg-8">
										<h2>Product information</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
								</div>
								<div class="row align-items-center mt-30">
									<div class="col-lg-4">
										<img src="static/picture/water.png" alt="" />
									</div>
									<div class="col-lg-8">
										<h2>An incredible view</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
								</div>
							</div>
						</div>
						<div id="specifications" class="tab-pane fade specifications">
							<table class="table table-bordered">
								<tr>
									<td>Price</td>
									<td><strong class="price"><?php echo $unit." ".$price; ?></strong></td>
								</tr>
								<tr>
									<td>Category</td>
									<td><a href="<?php echo $typeListUrl; ?>" title="<?php echo $cateClass->getSecondLevel($type)->secondArr["typeName"]; ?>"><?php echo $cateClass->getSecondLevel($type)->secondArr["typeName"]; ?></a></td>
								</tr>
								<tr>
									<td>Brand</td>
									<td><a href="<?php echo $brandListUrl; ?>" title="<?php echo $brand; ?>"><?php echo $brand; ?></a></td>
								</tr>
								<?php if ($dl!=""||$dl!=null) { ?>				
								<tr>
									<td><?php echo $dlname; ?></td>
									<td><?php echo $dl; ?></td>
								</tr>
								<?php } ?>
								<?php if ($dy!=""||$dy!=null) { ?>	
								<tr>
									<td><?php echo $dyname; ?></td>
									<td><?php echo $dy; ?></td>
								</tr>
								<?php } ?>
								<tr>
									<td>SKU</td>
									<td><?php echo $pcode; ?></td>
								</tr>
								<tr>
									<td>Model</td>
									<td><?php echo $keyword; ?></td>
								</tr>
								<tr>
									<td>Type</td>
									<td><?php echo $attrType; ?></td>
								</tr>
								<tr>
									<td>color</td>
									<td><?php echo $color; ?></td>
								</tr>
								<?php if ($size!="") { ?>
								<tr>
									<td>Dimensions</td>
									<td><?php echo $size; ?></td>
								</tr>
								<?php } ?>
								<tr>
									<td>Compatible Part Numbers</td>
									<td><?php
                                            $rep=str_replace(',',' ',$rep);
                                            $rep_arry=explode(" ",$rep);
                                            foreach ($rep_arry as $value)
                                                {
                                                    $value_t=trim($value);
                                                    if(!empty($value_t))
                                                    {
                                                        $url_detail_arry=get_products_url($value_t,$type,$typeUrl0,$pid);
                                                        ?> <a href="<?php echo $url_detail_arry;?>"><?php echo $value;?></a><?php 
                                                    }                                       
                                                }   
                                        ?>
                                    </td>
								</tr>
								<tr>
									<td>Compatible Model Numbers</td>
									<td>
										<?php 
                                            if (preg_match ("/<img.*src\s*=\s*[\"|\']?\s*([^>\"\'\s]*)/i", $comp)) {
                                                $imgarr = array('ppimageb' => 'http://pc-akku.at/ppimageb');
                                                print(strtr($comp,$imgarr)."<br>");
                                            } else {
                                                print($comp);
                                            }
                                        ?>
									</td>
								</tr>
							</table>
						</div>
						<div id="reviews" class="tab-pane fade">
							<div class="blog-comments product-comments mt-0">
								<table class="table table-striped table-bordered">
									<tbody>
										<tr>
											<td colspan="2" style="text-align: center;">
												<div class="rating-content-wrap">
													<em class="r-c-score"><?php echo number_format($average,1); ?></em>
													<span class="rating">
														<?php 
															for ($i=0; $i < 5; $i++) { 
																if ($i+0.5 < round($average)) { 
														?>
														<i class="fa fa-star"></i>
															<?php } else { ?>
														<i class="fa fa-star-o"></i>
														<?php } } ?>
													</span>
													<p><?php echo $reviewCount; ?> product rating</p>
												</div>
												<ul class="rating-detail-wrap">
													<li>
														<div class="r-d-star"><i class="fa fa-star"></i><span>5</span></div>
														<div class="r-d-bar"><span></span></div>
														<div class="r-d-num">0</div>
													</li>
													<li>
														<div class="r-d-star"><i class="fa fa-star"></i><span>4</span></div>
														<div class="r-d-bar"><span></span></div>
														<div class="r-d-num">0</div>
													</li>
													<li>
														<div class="r-d-star"><i class="fa fa-star"></i><span>3</span></div>
														<div class="r-d-bar"><span></span></div>
														<div class="r-d-num">0</div>
													</li>
													<li>
														<div class="r-d-star"><i class="fa fa-star"></i><span>2</span></div>
														<div class="r-d-bar"><span></span></div>
														<div class="r-d-num">0</div>
													</li>
													<li>
														<div class="r-d-star"><i class="fa fa-star"></i><span>1</span></div>
														<div class="r-d-bar"><span></span></div>
														<div class="r-d-num">0</div>
													</li>
												</ul>
											</td>
										</tr>									
									</tbody>
								</table>
							</div>
							<div class="blog-comments product-comments mt-0">
								<ul class="list-none">
									<?php  
										if ($reviewCount!=0) {
											foreach ($sqlReview as $re_value) {
												$re_name=$re_value->re_name;
												$re_content=$re_value->re_content;
												$re_star=$re_value->star;
												$re_date=$re_value->date;
									?>
									<li>
										<div class="comment-avatar text-center">
											<img src="static/picture/headimg.png" alt="" />
											<div class="product-rating mt-10">
												<?php for ($i=0; $i < 5; $i++) { 
													if ($i<$re_star) {
												?>
												<i class="fa fa-star" style="color: #f9af51;"></i>
												<?php } else { ?>
												<i class="fa fa-star"></i>
												<?php } } ?>
											</div>
										</div>
										<div class="comment-desc">
											<span><?php echo date("Y-m-d H:m:s",$re_date); ?></span>
											<h4><?php echo $re_name; ?></h4>
											<p style="font-size: 12px; color: #ddd;"><?php echo $typeName; ?> <?php echo $keyword; ?></p>
											<p><?php echo $re_content; ?></p>
										</div>
									</li>
									<?php } } else { ?>
										<li>
											<p style="text-align: center;">We have no comments yet, You can comment below.</p>
										</li>
									<?php } ?>
								</ul>
							</div>
							<div class="blog-comment-form product-comment-form mt-05">
								<h4><span>Add Review</span></h4>
								<form action="data/review.php" method="post">
								<div class="row mt-30">
									<div class="col-sm-6 single-form">
										<input type="text" name="review_name" placeholder="Name" />
									</div>
									<div class="col-sm-6">
										<input type="text" name="review_email" placeholder="Email" />
									</div>
									<div class="col-sm-12">
										<div class="product-rating style-2">
											<input type="hidden" name="star" value="5" />
											<span>Your Rating:</span>
											<div class="star-wrap clearfix">
												<div id="star-rating">
												</div>
												<div id="star-tips"></div>
											</div>
										</div>
									</div>
									<div class="col-sm-12">
										<textarea name="review_content" placeholder="Messages"></textarea>
									</div>
									<div class="col-sm-12">
										<input type="hidden" name="product_pcode" value="<?php echo $pcode; ?>" />
										<button class="btn-common mt-25">Submit</button>
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--product-specifications-area end-->
	
	<!--products-area start-->
	<div class="best-sellers mt-45">
		<div class="container-fluid fix">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h3>Latest Products</h3>
					</div>
				</div>
			</div>
			<div class="row four-items cv-visible">
				<?php $pcodeArr=$_SESSION['pcode']; echo getRecentList($pcodeArr,1,8,1); ?>
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
	<script src="static/js/PDStar.js"></script>
  	<script>
  		$(".product-colors label").on("click",function () {
			$(this).parent().addClass("act").siblings().removeClass('act');
		});
	  	$('.products-nav-tabs [data-toggle="tab"]').on('click',function (e) {
	  		$(e.target).parents('[data-toggle="tab"]').parent().siblings().find('[data-toggle="tab"]').removeClass('active show');
	  	});
	    function getOffNum() {
	    	var offCheck = $("#offprice").prop("checked");
	    	if (offCheck==true) {
	    		var qtyNum = $("#qty").val();
	    		if (qtyNum<5) {
	    			$("#qty").val(5);
	    		}
	    	}
	    };
	    window.onload = function() {
	    	var pdStar = new PDStar();
			pdStar.PDstar("star-rating",{
				tipEle: "star-tips",
				fontSize: "20px",
				tips: ["1 points", "2 points", "3 points", "4 points", "5 points"],
				content: "<i class='fa fa-star'></i>",
				isReScore: true,
				score: 5,
				callBack: function(score) {
					$('input[name = "star"]').val(score);
				}
			});
	    };
	    $(".ave-star").on("mouseenter", function() {
	    	$(".rating-num .table").empty();
	    	ratingShow(1);
	    });
	    ratingShow(2);
	    function ratingShow(site) {
	    	$.ajax({
	    		method: 'get',
	            url: "data/json_ajax_rating.php",
	            data: {'pid': '<?php echo $pcode; ?>'},
	            dataType: 'Json',
	            success: function(data) {
	            	if (site==1) {
	                	if (data!=0) {
		                	var str='';
							for (var i = Object.keys(data).length; i >= 1; i--) {
								str += '<tr>\
											<td><p>'+i+' star</p></td>\
											<td><span class="num-bar" title="'+data[i].singleNum+'"><span></span></span></td>\
											<td><p class="num-percent">'+data[i].percent+'</p></td>\
										</tr>';
							}
							$(".rating-num .table").html(str);
							for (var i = Object.keys(data).length; i >= 1; i--) {
								$(".num-bar").find("span").eq(5-i).width(data[i].percent);
							};
	                	} else {
	            			$(".rating-num").text("no comment yet");
	                	}
	                }
	                if (site==2) {
	                	for (var i = Object.keys(data).length; i >= 1; i--) {
	                		$('.rating-detail-wrap li').eq(5-i).find('.r-d-num').text(data[i].singleNum).siblings('.r-d-bar').children().width(data[i].percent);
	                	}
	                }
	            },
	            error: function(msg) {
	            	console.log(msg);
	            }
	    	});
	    }
	    function toDetail(idx) {
	    	var detailTop = $(".product-review-nav").offset().top;
	    	$('html,body').stop(true).animate({scrollTop:detailTop-180},500,function(){
	    		var contId = $('.product-review-nav [data-toggle="tab"]').eq(idx-1).attr("href");
	    		$('.product-review-nav [data-toggle="tab"]').eq(idx-1).addClass("active").parent().siblings().children().removeClass("active");
	    		$(contId).addClass("show active").siblings().removeClass("show active");
	    	});
	    };
  	</script>
</body>
</html>
