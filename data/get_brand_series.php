<?php  
function getBrandSeries($type,$brand){
	$cateClass = new Category;
	$result_arr=json_decode(Products::GetBrandSeries($type,""));
	if (count($result_arr)!=0) { //如果系列不为空，则显示系列，否则显示型号
	foreach ($result_arr as $rowbt) {
		$brand=$rowbt->cs;
		$typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
		$result_series=json_decode(Products::GetBrandSeries($type,$brand));
?>
<ul class="product-brand clearfix">
	<li><a href="<?php echo get_series_url($type,$typeUrl0,$brand,"default",1); ?>" title="<?php echo $brand; ?>"><?php echo $brand; ?></a></li>
<?php 
		$sleSeriesArr=[];
        foreach ($result_series as $resVal) {
            $sleSeries0=$resVal->seriesadd;
            $sleSeries0=explode(",", $sleSeries0);
            foreach ($sleSeries0 as $key => $sleSeriesVal) {
            	$sleSeriesArr[]=trim(ucfirst(strtolower($sleSeriesVal)));
            };
        }
        $sleSeriesArr=array_filter(array_unique($sleSeriesArr));
        foreach ($sleSeriesArr as $series) {
?>
	<li><a href="<?php echo get_series_url($type,$typeUrl0,$brand,$series,1); ?>" title="<?php echo $series; ?>"><?php echo $series; ?></a></li>
<?php } ?>
</ul>
<?php } } else { 
	$result_arr=json_decode(Products::GetBrandJianjie($type,""));
	foreach ($result_arr as $rowbt) {
		$brand=$rowbt->cs;
		$typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
		$result_jianjie=json_decode(Products::GetBrandJianjie($type,$brand));
?>
<ul class="product-brand clearfix">
	<li><a href="<?php echo get_series_url($type,$typeUrl0,$brand,"default",1); ?>" title="<?php echo $brand; ?>"><?php echo $brand; ?></a></li>	
<?php 
	foreach ($result_jianjie as $resVal) {
		$pid=$resVal->pid;
		$jianjie0=getjan($resVal->jianjie1);
?>
	<li><a href="<?php echo get_products_url($jianjie0,$type,$typeUrl0,$pid); ?>" title="<?php echo $jianjie0; ?>"><?php echo $jianjie0; ?></a></li>
<?php } ?>
</ul>
<?php } } } 
//获取单一品牌系列 (用于头部系列展示结构生成,将生成的结构静态展示在头部，减少页面加载时间)
function getHeadBrandSeries($type,$brand,$num,$act="") { 
	$cateClass = new Category;
	$result_series=json_decode(Products::GetBrandSeries($type,$brand));
	$typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
?>
<li class="<?php echo $act=='mobile'?'':'megamenu-single'; ?>">
	<span class="mega-menu-title"><?php echo $brand; ?></span>
	<ul>
<?php 
	$sleSeriesArr=[];
        foreach ($result_series as $resVal) {
            $sleSeries0=$resVal->seriesadd;
            $sleSeries0=explode(",", $sleSeries0);
            foreach ($sleSeries0 as $key => $sleSeriesVal) {
            	$sleSeriesArr[]=trim(ucfirst(strtolower($sleSeriesVal)));
            };
        }
        $sleSeriesArr=array_filter(array_unique($sleSeriesArr));
        $i=0;
        foreach ($sleSeriesArr as $series) {
        	$i++;
        	if ($i<=$num) {
?>
		<li><a href="<?php echo get_series_url($type,$typeUrl0,$brand,$series,1); ?>" title="<?php echo $series; ?>"><?php echo $series; ?></a></li>
<?php } } ?>
	</ul>
</li>
<?php } ?>