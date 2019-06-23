<?php  
require_once('config.php');
require_once('DBConfig.class.php');
require_once('sql.class.php');
require_once('fun.php');
require_once("more_img_class.php");
require_once("get_category.class.php");
// require_once("SEOKeywords.class.php");
$cateClass = new Category;
$id=$_POST['id'];
if (isset($_POST)) {
	$sql = "select * from product where pid = '$id'";
	$result_arr=json_decode(Products::Execute($sql));
	$json_arr=[];
	$imgArr=[];
	foreach ($result_arr as $rowbt) {
		$imgName=$rowbt->imgmore;
        if (!empty($imgName)) {
            $img_arry=GetMoreimages::GetMoreImg($imgName);
            $count=count($img_arry);
            foreach ($img_arry as $img_name){
                if(!empty($img_name)){
                	$imgArr[]=get_img_file($rowbt->category)."/".$img_name.".jpg";
                };
            };
        } else {
        	$imgArr[]=get_img_file($rowbt->category)."/".$rowbt->okpcode.".jpg";
        };
		$comp=preg_replace('/<img[^>]*src[=\"\'\s]+[^\.]*\/([^\.]+)\.[^\"\']+[\"\']?[^>]*>/i', '', $rowbt->comp);
		$pid=$rowbt->pid;
        $type=$rowbt->category;
        $average=$rowbt->average;
        $brand=$rowbt->cs;
        $pcode=$rowbt->pcode;
        $dl=$rowbt->dl;
        $dy=$rowbt->dy;
        if ($type=='B218'|| $type=='B219') {
            $dlname="DC Outpu";
            $dyname="Input Voltage";
        } else {
            $dlname="Capacity";
            $dyname="Volt";
        }
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
		$json_arr=array("pid"=>$pid,"brand"=>$brand,"pcode"=>$pcode,"okpcode"=>$okpcode,"jianjie0"=>$jianjie0,"jianjie2"=>$jianjie2,"price"=>$price,"oldprice"=>$oldprice,"imgurl"=>$imgUrl,"imgmore"=>$imgArr,"typeName"=>$typeName,"typeUrl"=>$typeUrl,"productUrl"=>$productUrl,"comp"=>$comp,"dl"=>$dl,"dy"=>$dy,"dlname"=>$dlname,"dyname"=>$dyname,"unit"=>$unit);
	}
	echo json_encode($json_arr);
}
?>