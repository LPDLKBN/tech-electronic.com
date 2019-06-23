<?php 
function getRecentList($pcodeArr,$curpage,$showrow,$act=""){
	global $unit;
	$cateClass = new Category;
	$result_arr=json_decode(Products::GetRecent($pcodeArr,$curpage,$showrow));
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
        strlen($type)==4?$keyword=$jianjie0:$keyword=$pcode;
        $productUrl = get_products_url($keyword,$type,$typeUrl0,$pid);
        $brandCateUrl = get_brand_url($type,$typeUrl0,1);
        if ($act=="") {
?>
<li>
	<div class="product-single style-2">
		<div class="row align-items-center m-0">
			<div class="col-lg-4 p-0">
				<div class="product-thumb">
					<a href="<?php echo $productUrl; ?>" title="<?php echo $jianjie2; ?>"><img src="<?php echo $imgUrl; ?>" alt="<?php echo $jianjie0; ?>" /></a>
				</div>
			</div>
			<div class="col-lg-8 p-0">
				<div class="product-title">
					<h4><a href="<?php echo $productUrl; ?>" target="_blank" title="<?php echo $jianjie2; ?>"><?php echo $jianjie2; ?></a></h4>
				</div>
				<div class="product-price-rating">
					<span><?php echo $price." ".$unit; ?> </span>
					<del><?php echo $oldprice." ".$unit; ?> </del>
				</div>
			</div>
		</div>
	</div>
</li>
<?php } else if ($act==1) { //详情页底部最近浏览?>
<div class="ml-10 mr-10">
    <div class="product-single">
        <div class="product-title">
            <small><a href="<?php echo $brandCateUrl; ?>"><?php echo $brand; ?></a></small>
            <h4><a href="<?php echo $productUrl; ?>" target="_blank" title="<?php echo $jianjie2; ?>"><?php echo $jianjie2; ?></a></h4>
        </div>
        <div class="product-thumb limit-height">
            <a href="<?php echo $productUrl; ?>" title="<?php echo $jianjie2; ?>"><img src="<?php echo $imgUrl; ?>" alt="<?php echo $jianjie0; ?>" /></a>
            <div class="downsale"><span>-</span><?php echo $sale_percent; ?></div>
            <div class="product-quick-view">
                <a onclick="dataPopFun(<?php echo $pid ?>);" data-toggle="modal" data-target="#quick-view">quick view</a>
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
            <a href="<?php echo $typeUrl; ?>" title="<?php echo $typeName; ?>" class="product-compare"><i class="fa fa-navicon"></i></a>
            <a href="<?php echo $productUrl; ?>" target="_blank" class="add-to-cart">See Details</a>
            <a href="<?php echo $allTypeUrl; ?>" title="<?php echo $allTypeName; ?>" class="product-wishlist"><i class="fa fa-th"></i></a>
        </div>
    </div>
</div>
<?php } } } ?>