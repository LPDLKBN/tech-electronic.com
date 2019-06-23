<?php
session_start();
require_once('config.php');
require_once('DBConfig.class.php');
require_once("fun.php");
require_once("sql.class.php");
require_once("get_category.class.php");
$cateClass = new Category;
isset($_POST['animate'])?$animate=$_POST['animate']:$animate="";
isset($_POST['offprice'])?$offprice=$_POST['offprice']:$offprice=""; //折扣勾选参数
$pid=trim($_POST['pid']);
$jian=$_POST['jian'];
$gwc_shuliang=trim($_POST['gwc_shuliang']);
$gwc_procode=$_POST['gwc_procode'];
$gwc_prodes=$_POST['gwc_prodes'];
$userid=session_id();
$gwc_time=date("Y-m-d H:i:s");
$ip=getenv("REMOTE_ADDR");
isset($_POST['color'])?$color=", Color: ".$_POST['color']:$color="";
isset($_POST['size'])?$size=", Size: ".$_POST['size']:$size="";
$gwc_prodes=$gwc_prodes.$color.$size;
$gwc_id="";
$listCount="0";
$arrCartLis=json_decode(Products::GetCartListDetailNum($userid,$pid,$jian));
$listCount=count($arrCartLis);
if ($listCount!=0) {
	$gwc_id=$arrCartLis[0]->gwc_id;
};
if($gwc_shuliang>0){
Products::ExecuteGouwuche($gwc_shuliang,$gwc_id,$pid,$userid,$jian,$gwc_time,$ip,$listCount,"",$gwc_procode,$gwc_prodes);
	if ($animate!="") {
		$json_arr=[];
		$json_arr_1=[];
		$json_arr_2=[];
		$resArryCart=json_decode(Products::GetCartList($userid));
		$cartlistnum=count($resArryCart);
		$total=0;
		foreach ($resArryCart as $rs) {
			$pid=$rs->pid;
			$jianjie1=$rs->jianjie1;
			$type=$rs->category;
			$jianjie0=getjan($jianjie1);
			$price=get_ouprice($rs->pprice,$rs->pid);
			$subtotal=str_replace(',','',$price)*$rs->gwc_shuliang;
			$number=$rs->gwc_shuliang;
			//头部小购物车数据 S
			$brand=$rs->cs;
			$gwc_id=$rs->gwc_id;
			$img=get_img_file($rs->category)."/".$rs->okpcode.".jpg";
			$gwc_key=$rs->gwc_key;
			$gwc_procode=$rs->gwc_procode;
			$gwc_prodes=$rs->gwc_prodes;
			//头部小购物车数据 E 
			$typeName = $cateClass->getSecondLevel($type)->secondArr["typeName"];
        	$typeUrl0 = $cateClass->getSecondLevel($type)->secondArr["typeUrl"];
			$productUrl = get_products_url($jianjie0,$type,$typeUrl0,$pid);
			$total+=$subtotal;
			$shipping=get_shipping($total);
			$total_num=$total+$shipping;
			$json_arr_1=array('cartlistnum'=>$cartlistnum,'shipping'=>$shipping,'total'=>$total_num);
			$json_arr_2[$gwc_id]=array('price'=>$price,'subtotal'=>$subtotal,'gwc_id'=>$gwc_id,'number'=>$number,'img'=>$img,'gwc_key'=>$gwc_key,'gwc_procode'=>$gwc_procode,'gwc_prodes'=>$gwc_prodes,'brand'=>$brand,"productUrl"=>$productUrl,"unit"=>$unit);
		}
		array_push($json_arr, $json_arr_1,$json_arr_2);
		echo json_encode($json_arr);
	} else {
		$offprice!=""?$offStr = '?offprice='.$offprice:$offStr = '';
		header("location:../cart.html".$offStr);
	}
}else {
	if ($animate!="") {
		header("location:../404.html");
	} else {
		//加入购物车的数量不能为0
	echo "<script>history.go(-1)</script>";
	}
}
?>