<?php  
function GetDlDyList($type,$brandVal,$seriesVal,$attrType,$curpage,$showrow,$act=""){
	global $unit;
	$cateClass = new Category;
	$result_arr=json_decode(Products::GetAttrDlDy($type,$brandVal,$seriesVal,$attrType,$curpage,$showrow));
	foreach ($result_arr as $rowbt){
    	$pid=$rowbt->pid;
        $type=$rowbt->category;
        $dl=$rowbt->dladd;
        $dy=$rowbt->dyadd;
        $average=$rowbt->average;
        $pType=$rowbt->type;
        $power=$rowbt->power;
        $pin=$rowbt->pin;
        $brand=$rowbt->cs;
        $pcode=$rowbt->pcode;
        $okpcode=$rowbt->okpcode;
        $rep=$rowbt->rep;
        $comp=preg_replace('/<[img|IMG].*?src=[\'|\"](.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/i','',$rowbt->comp);
        if ($seriesVal!="") {
        	$des=limit_words($comp,$series,140);
        } else {
        	$pType!=""?$pTypeDes="Battery Type: ".$pType."; ":$pTypeDes="";
        	$pin!=""?$pinDes="Cells: ".$pin."; ":$pinDes="";
        	$power!=""?$powerDes="Power: ".$power."; ":$powerDes="";
        	$dl!=""?$dlDes="Capacity: ".$dl."; ":$dlDes="";
        	$dy!=""?$dyDes="Voltage: ".$dy."; ":$dyDes="";
        	$des="-".$pTypeDes.$pinDes.$powerDes.$dlDes.$dyDes." <br/>-100% brand new from the manufacturer. Up to 500 recharge cycles during battery life. CE- / FCC- / RoHS-Certified for security. 24 x 7 e-mail support, warranty 12 months";
        }
        $jianjie1=$rowbt->jianjie1;
        $jianjie0=getjan($jianjie1);
        $jianjie2=$rowbt->jianjie2;
        $price=get_ouprice($rowbt->pprice);
        $oldprice=get_old($rowbt->pprice);
        $sale_percent="30%";
        $imgUrl=get_img_file($type)."/".$okpcode.".jpg";
        $allTypeName=$cateClass->allType["allTypeName"];
        $allTypeUrl=$cateClass->allType["allTypeUrl"];
        $typeName = $cateClass->getSecondLevel($type)->secondArr["typeName"];
        $typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
        $typeUrl = get_second_url($type,$typeUrl0);
        $productUrl = get_products_url($jianjie0,$type,$typeUrl0,$pid);
        $brandCateUrl = get_brand_url($type,$typeUrl0);
        if ($act==1) {
?>
<!-- Start Single-Product -->
<div class="col-xl-3 col-md-4 col-sm-6">
	<div class="product-single">
		<div class="product-title">
			<small><a href="<?php echo $CateUrl; ?>" title="<?php echo $CateUrl; ?>"><?php echo $typeName; ?></a></small>
			<h4><a href="<?php echo $productUrl; ?>" target="_blank" title="<?php echo $productUrl; ?>"><?php echo $jianjie2; ?></a></h4>
		</div>
		<div class="product-thumb limit-height">
			<a href="<?php echo $productUrl; ?>"><img src="<?php echo $imgUrl; ?>" alt="<?php echo $jianjie2; ?>" /></a>
			<div class="downsale"><span>-</span><?php echo $sale_percent; ?></div>
			<div class="product-quick-view">
				<a href="javascript:void(0);" onclick="dataPopFun(<?php echo $pid ?>);" data-toggle="modal" data-target="#quick-view">quick view</a>
			</div>
		</div>
		<div class="product-price-rating">
			<div class="pull-left">
				<span><?php echo $price." ".$unit; ?> </span>
				<del><?php echo $oldprice." ".$unit; ?> </del>
			</div>
			<div class="pull-right">
				<?php 
					for ($i=0; $i < 5; $i++) { 
						if ($i+0.5 < round($average)) { 
				?>
				<i class="fa fa-star"></i>
					<?php } else { ?>
				<i class="fa fa-star-o"></i>
				<?php } } ?>
			</div>
		</div>
		<div class="product-action">
			<a href="<?php echo $CateUrl; ?>" title="<?php echo $typeName; ?>" class="product-compare"><i class="fa fa-navicon"></i></a>
			<a href="<?php echo $productUrl; ?>" target="_blank" class="add-to-cart">See Details</a>
			<a href="<?php echo $allTypeUrl; ?>" title="<?php echo $allTypeName; ?>" class="product-wishlist"><i class="fa fa-th"></i></a>
		</div>
	</div>
</div>
<!-- Start Single-Product -->
<?php } else { ?>
<div class="product-single wide-style">
	<div class="row align-items-center data_input">
		<div class="col-xl-3 col-lg-6 col-md-6">
			<div class="product-thumb">
				<a href="<?php echo $productUrl; ?>"><img src="<?php echo $imgUrl; ?>" alt="<?php echo $jianjie2; ?>" /></a>
				<div class="product-quick-view">
					<a href="javascript:void(0);" onclick="dataPopFun(<?php echo $pid ?>);" data-toggle="modal" data-target="#quick-view">quick view</a>
				</div>
			</div>
		</div>
		<div class="col-xl-6 col-lg-8 col-md-8 product-desc mt-md-50 sm-mt-50">
			<div class="product-title">
				<small><a href="<?php echo $brandCateUrl; ?>"><?php echo $brand; ?></a></small>
				<h4><a href="<?php echo $productUrl; ?>" target="_blank" title="<?php echo $productUrl; ?>"><?php echo $jianjie2; ?></a></h4>
			</div>
			<div class="product-rating">
				<?php 
					for ($i=0; $i < 5; $i++) { 
						if ($i+0.5 < round($average)) { 
				?>
				<i class="fa fa-star"></i>
					<?php } else { ?>
				<i class="fa fa-star-o"></i>
				<?php } } ?>
			</div>
			<div class="product-text">
				<p><?php echo $des; ?></p>
			</div>
		</div>
		<div class="col-xl-3 col-lg-4 col-md-4">
			<div class="product-action stuck text-left">
				<div class="free-delivery">
					<img src="https://www.tuttebatterie.com/img/s-pic/paypal_verified_seal.png" alt="">
				</div>
				<div class="product-price-rating">
					<div>
						<del><?php echo $price." ".$unit; ?> </del>
					</div>
					<span><?php echo $oldprice." ".$unit; ?> </span>
				</div>
				<div class="product-stock">
					<p>Avability: <?php echo $result_arr[0]->stock=="ok"?"<span class=\"text-stock\">In Stock</span>":"<span class=\"text-onstock\">on Stock</span>"; ?></p>
				</div>
				<a href="<?php echo $productUrl; ?>" class="add-to-cart">SEE DETAILS</a>
				<a href="javascript:;" onclick="flyToCart(this)" class="add-to-cart compare">+ Add To Cart</a>
				<input type="hidden" name="pid" value="<?php echo $pid; ?>"/>
				<input type="hidden" name="jian" value="<?php echo $jianjie0; ?>"/>
				<input type="hidden" name="gwc_procode" value="<?php echo $pcode; ?>"/>
				<input type="hidden" name="gwc_prodes" value="<?php echo $jianjie2; ?>"/>
			</div>
		</div>
	</div>
</div>
<?php } } } ?>