<?php
// 指定允许其他域名访问    
// header('Access-Control-Allow-Origin:*');    
// 响应类型    
header('Access-Control-Allow-Methods:GET');    
// 响应头设置    
header('Access-Control-Allow-Headers:x-requested-with,content-type');
session_start();
$userid=session_id();
require_once('config.php');
require_once('DBConfig.class.php');
require_once('sql.class.php');
require_once('fun.php');
$gwc_id=isset($_POST['id'])?$_POST['id']:"";
$gwc_shuliang=isset($_POST['number'])?$_POST['number']:"";
$action=isset($_POST['action'])?$_POST['action']:"";
$check=isset($_POST['check'])?$_POST['check']:"";
$json_arr=[];
$json_arr_0=[];
$json_arr_1=[];
$json_arr_2=[];
//排除购物车数量修改为0
if($gwc_shuliang!=0){
	Products::ExecuteGouwuche($gwc_shuliang,$gwc_id,"","","","","","",$action,"","");
}
$resArryCart=json_decode(Products::GetCartList($userid));
$cartlistnum=count($resArryCart);
$sub_total=0;
$total=0;
$shipping=0;
$total_num=0;
$goodsnum=0;
$discount=0;
foreach ($resArryCart as $rs) {
	$price=get_ouprice($rs->pprice,$rs->pid);
	$subtotal=str_replace(',','',$price)*$rs->gwc_shuliang;
	$number=$rs->gwc_shuliang;
	$goodsnum+=$number;
	//头部小购物车数据 S
	$brand=$rs->cs;
	$gwc_id=$rs->gwc_id;
	$img=get_img_file($rs->category)."/".$rs->okpcode.".jpg";
	$gwc_key=$rs->gwc_key;
	$gwc_procode=$rs->gwc_procode;
	$gwc_prodes=$rs->gwc_prodes;
	//头部小购物车数据 E
	$sub_total+=$subtotal;
	$total=$subtotal+$total;
	$shipping=get_shipping($total);
	$total_num=$total+$shipping; //商品原总价
	$json_arr_2[$gwc_id]=array('price'=>$price,'subtotal'=>$subtotal,'gwc_id'=>$gwc_id,'number'=>$number,'img'=>$img,'gwc_key'=>$gwc_key,'gwc_procode'=>$gwc_procode,'gwc_prodes'=>$gwc_prodes,'brand'=>$brand,"unit"=>$unit);
}
$discountArr=array();
if ($check=="true" && $goodsnum>=5) {
	$discountArr = getDisc($total,$goodsnum);
	$total_num = $discountArr["price"]; 
	$total_num = number_format($total_num+$shipping, 2); // 折后总价
	$discount= $discountArr["discount"];
};
$json_arr_1=array('cartlistnum'=>$cartlistnum,'subtotal'=>$sub_total,'shipping'=>$shipping,'total'=>$total_num,'discount'=>''.$discount.'');
array_push($json_arr, $json_arr_1,$json_arr_2);
echo json_encode($json_arr);
?>