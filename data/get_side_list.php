<?php  
function GetSideList($conType,$brand,$curpage,$showrow){
	global $unit;
	$cateClass = new Category;
	$result_arr=json_decode(Products::GetHotNew($conType,$brand,$curpage,$showrow));
	foreach ($result_arr as $rowbt) {
		$pid=$rowbt->pid;
        $type=$rowbt->category;
        $brand=$rowbt->cs;
        $pcode=$rowbt->pcode;
        $okpcode=$rowbt->okpcode;
        $jianjie1=$rowbt->jianjie1;
        $jianjie0=getjan($jianjie1);
        $jianjie2=$rowbt->jianjie2;
        $price=get_ouprice($rowbt->pprice);
        $oldprice=get_old($rowbt->pprice);
        $sale_percent="-30%";
        $imgUrl=get_img_file($type)."/".$okpcode.".jpg";
        $allTypeName=$cateClass->allType["allTypeName"];
        $allTypeUrl=$cateClass->allType["allTypeUrl"];
        $typeName = $cateClass->getSecondLevel($type)->secondArr["typeName"];
        $typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
        $typeUrl = get_second_url($type,$typeUrl0);
        $productUrl = get_products_url($jianjie0,$type,$typeUrl0,$pid);
        $brandCateUrl = get_brand_url($type,$typeUrl0);
?>
<!-- Start Single-Product -->
<div class="single-product clearfix">
	<div class="product-img">
		<a class="pro-little" href="<?php echo $productUrl; ?>" title="<?php echo $jianjie0; ?>">
			<img class="primary-img" src="<?php echo $imgUrl; ?>" alt="<?php echo $jianjie0; ?>">
		</a>
	</div>
	<div class="product-description">
		<h5><a class="pro-little" href="<?php echo $productUrl; ?>" title="<?php echo $jianjie2; ?>"><?php echo $jianjie2; ?></a></h5>
		<div class="price-box">
			<span class="price"><?php echo $price; ?> <?php echo $unit; ?></span>
			<span class="old-price"><?php echo $oldprice; ?> <?php echo $unit; ?></span>
		</div>
		<span class="rating">
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star-o"></i>
		</span>
	</div>
</div>
<!-- End Single-Product -->
<?php } } ?>