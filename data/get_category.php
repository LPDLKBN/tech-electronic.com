<?php  
function GetCatecory($be_type,$num,$act){
	$cateClass = new Category;
	$result_arr=json_decode(Products::GetCategory($be_type,$num));
	foreach ($result_arr as $rowbt){
		$type=$rowbt->category;
        $series=$rowbt->seriesadd;
        $typeName = $cateClass->getSecondLevel($type)->secondArr["typeName"];
        $typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
        $typeUrl = get_second_url($type,$typeUrl0);
        $brandCateUrl = get_brand_url($type,$typeUrl0);
        $cateList = get_series_url($type,$typeUrl0,"default","default",1);
        if ($act==1) {
?>
<div class="cat-left-drop-menu-left">
    <a class="menu-item-heading" href="<?php echo $typeUrl; ?>"><?php echo $typeName; ?></a>
    <ul>
        <?php  //分类品牌（暂未使用）
            $result_brand=json_decode(Products::GetBrand($type,6,""));
            foreach ($result_brand as $brandrow) {
                $brand=strtolower($brandrow->cs);
                $typeUrlBrand=get_second_url($type,$typeUrl0,$brand);
        ?>
        <li><a href="<?php echo $typeUrlBrand; ?>" title="<?php echo $brand; ?>"><?php echo $brand; ?></a></li>
        <?php } ?>
    </ul>
</div>
<?php } else if ($act==2) { //搜索分类?>
    <option class="cate-item-title" value="<?php echo $type; ?>"><?php echo $typeName; ?></option>
<?php } else if ($act==3) { //列表页侧边栏分类?>
    <li><a href="<?php echo $brandCateUrl; ?>" title="<?php echo $typeName; ?>"><?php echo $typeName; ?></a></li>
<?php } else if ($act==4) { //一级菜单页面?>
<!-- Start Single-Product -->
<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
    <div class="category-wrap">
        <div class="threed-trans">
            <a href="<?php echo $typeUrl; ?>" title="<?php echo $typeName; ?>">
                <img class="primary-img" src="static/images/<?php echo strtoupper($type); ?>.jpg">
                <img class="primary-img" src="static/images/<?php echo strtoupper($type); ?>.jpg">
                <img class="primary-img" src="static/images/<?php echo strtoupper($type); ?>.jpg">
                <img class="primary-img" src="static/images/<?php echo strtoupper($type); ?>.jpg">
                <img class="primary-img" src="static/images/<?php echo strtoupper($type); ?>.jpg">
            </a>
        </div>
        <div class="category-des">
            <h5><a href="<?php echo $typeUrl; ?>" title="<?php echo $typeName; ?>"><?php echo $typeName; ?></a></h5>
        </div>                                          
    </div>
</div>
<!-- End Single-Product -->
<?php } else if ($act==5) { //暂未使用?>
    <li><a href="<?php echo $brandCateUrl; ?>" title="<?php echo $typeName; ?>"><?php echo $typeName; ?></a></li>
<?php } } } ?>