<?php
function GetVideoList($be_type,$curpage,$showrow,$act="",$hasClass=false){
	global $unit;
	$cateClass = new Category;
    $result_arr=json_decode(Products::GetVideoList($be_type,$curpage,$showrow));
    foreach ($result_arr as $rowbt){
    	$pid=$rowbt->pid;
        $type=$rowbt->category;
        $brand=$rowbt->cs;
        $pcode=$rowbt->pcode;
        $okpcode=$rowbt->okpcode;
        $average=$rowbt->average;
        $jianjie1=$rowbt->jianjie1;
        $jianjie0=getjan($jianjie1);
        $jianjie2=$rowbt->jianjie2;
        $price=get_ouprice($rowbt->pprice);
        $oldprice=get_old($rowbt->pprice);
        $sale_percent="-30%";
        $imgUrl=get_img_file($type)."/".$okpcode.".jpg";
        $jianjie0=getjan($rowbt->jianjie1);
        $allTypeName=$cateClass->allType["allTypeName"];
        $allTypeUrl=$cateClass->allType["allTypeUrl"];
        $typeName = $cateClass->getSecondLevel($type)->secondArr["typeName"];
        $typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
        $typeUrl = get_second_url($type,$typeUrl0);
        $productUrl = get_products_url($jianjie0,$type,$typeUrl0,$pid);
?>
<div class="col-lg-2 col-md-3">
	<div class="product-single">
		<div class="product-title">
			<small><a href="<?php echo $brandCateUrl; ?>"><?php echo $brand; ?></a></small>
			<h4><a href="<?php echo $productUrl; ?>" target="_blank" title="<?php echo $series!=""?'('.$series.' series)':""; ?> <?php echo $jianjie2; ?>"><?php echo $series!=""?'('.$series.' series)':""; ?> <?php echo $jianjie2; ?></a></h4>
		</div>
		<div class="product-thumb">
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
<?php } } ?>
<?php  
function GetVideo($group){
	global $unit;
	$cateClass = new Category;
    $result_arr=json_decode(Products::GetVideoList($group,"",""));
    echo '<div class="video-play">
			<video src="static/video/'.$result_arr[0]->provideoname.'.mp4" controls width="60%"></video>
		</div>
		<div class="owl-carousel owl-theme video-nav">';
    foreach ($result_arr as $rowbt){
    	$videoName=$rowbt->provideoname;
		$videoDes=$rowbt->provideodes;
		$videoUrl="static/video/".$videoName.".mp4";
		$pid=$rowbt->pid;
		$type=$rowbt->category;
		$average=$rowbt->average;
		$jianjie1=$rowbt->jianjie1;
        $jianjie0=getjan($jianjie1);
        $jianjie2=$rowbt->jianjie2;
		$typeName = $cateClass->getSecondLevel($type)->secondArr["typeName"];
        $typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
        $productUrl = get_products_url($jianjie0,$type,$typeUrl0,$pid);
		echo '<div class="item"><video src="'.$videoUrl.'" width="90%"></video><a href="'.$productUrl.'" title="'.$videoDes.'">'.$videoDes.'</a></div>';
    }
    echo '</div>';
}
?>