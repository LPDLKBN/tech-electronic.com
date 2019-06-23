<?php
function checkempty($str){
if(!empty($str)){
return true;
}
else
{
return false;
}
}
function checkmail($mail){
if (preg_match("/^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$/i",$mail)) {
return true;
}
else
{
return false;
}
}

function checknum($con){
if(is_int($con)){
return true;
}
else
{
return false;
}
}

function get_ouprice($price,$pid="")
{
$price = $price/1;
return intval($price);
}

function get_old($price)
{
$price = intval($price/0.7);
return $price;
}
function get_save($oldprice,$newprice)
{
$price1=str_replace(',','',$oldprice);
$price2=str_replace(',','',$newprice);
$price3=$price1-$price2;
return number_format($price3);
}
function get_shipping($total)
{
	if($total<22)
	{$yufei=0;}
	else if($total>=22 && $total<45)
	{$yufei=7;}
	else if($total>=45 && $total<200)
	{$yufei=9;}
	else if($total>=200)
	{$yufei=16;}
	return $yufei;
}

function getpartno($cp)
{
    $cp=str_replace(","," ",$cp);
	$b=explode(" ",trim($cp));
	return $b;
}

function arrymodel($jianjie1)
{
    $jianjie1=str_replace(", "," ",$jianjie1);
    $jianjie1=str_replace(","," ",$jianjie1);
	$jianjie1=str_replace("..."," ",$jianjie1);
	$jianjie1=str_replace("*","-",$jianjie1);
	$jianjie1=str_replace("  "," ",$jianjie1);
	$arryjan=explode(";",trim($jianjie1));
	return $arryjan;    
}

function getjan($jianjie1)
{
    $jianjie1=str_replace(", "," ",$jianjie1);
    $jianjie1=str_replace(","," ",$jianjie1);
	$jianjie1=str_replace("..."," ",$jianjie1);
	$jianjie1=str_replace("#","-",$jianjie1);
	$jianjie1=str_replace("*","-",$jianjie1);
	$jianjie1=str_replace("  "," ",$jianjie1);
	$jian=explode(" ",trim($jianjie1));
	return $jian[0];    
}

function arryjan($jianjie1)
{
    $jianjie1=str_replace(", "," ",$jianjie1);
    $jianjie1=str_replace(","," ",$jianjie1);
	$jianjie1=str_replace("..."," ",$jianjie1);
	$jianjie1=str_replace("*","-",$jianjie1);
	$jianjie1=str_replace("  "," ",$jianjie1);
	$arryjan=explode(" ",trim($jianjie1));
	return $arryjan;    
}
//获取图片多图 返回数组
function GetMoreImg($imgmore)
{
	if(trim($imgmore)!=""){
	$imgarry = explode("|", $imgmore);
	return $imgarry;
	}
}
//获取图片文件夹
function get_img_file($type)
{
	if (!empty($type)) {
		if ($type=="B218" || $type=="B219") { //适配器
			$imgUrl="https://www.uk-online.co.uk/acb";
		} else if (preg_match('/A/i',$type)) { //电子产品
			$imgUrl="https://www.uk-online.co.uk/electb";
		} else {
			$imgUrl="https://www.uk-online.co.uk/ppimageb";
		}
		return $imgUrl;
	}
}
function okpcode($okpcode){
	$imgarr = explode('|',$okpcode);
	$okpcode=$imgarr[0];
	return $okpcode;
}
/*二级分类产品界面URL*//*电子产品界面*/
function get_second_url($cate,$typename,$brand="default",$page=1)
{
	$cate=strtoupper($cate);
	$typename=strtolower(str_replace(" ","-",$typename));
	if (preg_match('/A/i',$cate)) {
		$typeUrl=$cate."/".$typename."-".$page.".html";
	} else {
		$typeUrl=$cate."/".$typename."/".$brand."/default-".$page.".html";
	}
	return $typeUrl;
}
/*品牌分类产品界面URL*/
function get_brand_url($cate,$typename,$page="")
{
	$cate=strtoupper($cate);
	$typename=strtolower(str_replace(" ","-",$typename));
	if (preg_match('/A/i',$cate)) {
		$typeUrl=$cate."/".$typename."-1.html";
	} else {
		$typeUrl="brand/".$cate."/".$typename.".html";
	}
	return $typeUrl;
}
/*系列产品界面URL*/
function get_series_url($type,$typename,$brand,$series,$page)
{
	$type=strtoupper($type);
	$typename=strtolower($typename);
	$brand=strtolower($brand);
	$series=strtolower($series);
	$series=str_replace(" ","_",$series);
	$typeUrl=$type."/".$typename."/".$brand."/".$series."-".$page.".html";
	return $typeUrl;
}
/*三级级产品界面URL*/
function get_products_url($keyword,$cate,$typeUrl,$pid)
{
	$typeUrl=trim(strtolower($typeUrl));
	$keyword=trim(strtolower($keyword));
	$keyword=str_replace("(","%28",$keyword);
	$keyword=str_replace(")","%29",$keyword);
	$typeUrl=str_replace(' ','-' ,$typeUrl);
	$url=$typeUrl."/".$cate."/".$keyword."-".$pid.".html";
	return $url;
}
//博客详情路径
function get_blog_url($id)
{
	$url="article-".$id.".htm";
	return $url;
}
function re_lan($jianjie2)
{
/*$jianjie3=str_ireplace("laptop asapter for","zasilacze do laptopów",$jianjie2);*/

$jianjie2=str_ireplace("series","serie",$jianjie2);
$jianjie2=str_ireplace("for","für",$jianjie2);
$jianjie2=str_ireplace("battery","akku",$jianjie2);
$jianjie2=str_ireplace("charger","ladegerät",$jianjie2);
$jianjie2=str_ireplace("new","neu",$jianjie2); 
$jianjie2=str_ireplace("replace","ersetzen",$jianjie2);
$jianjie2=str_ireplace("power supply","netzteile",$jianjie2);
	return $jianjie2;
}
function getcolor($color)
{
$color=strtolower($color);
switch(trim($color)){
case "white":
$color="Bianco";
break;
case "silver":
$color="argento";
break;
case "orange":
$color="arancione";
break;
case "metallic silver":
$color="argento metallizzato";
break;
case "metallic grey":
$color="grigio metallizzato";
break;
case "silver grey":
$color="grigio argento";
break;
case "silver gray":
$color="grigio argento";
break;
case "grey":
$color="grigio";
break;
case "gray":
$color="grigio";
break;
case "green":
$color="verde";
break;
case "grey blue":
$color="grigio blu";
break;
case "violet":
$color="viola";
break;
case "metallic blue grey":
$color="blu metallizzato grigio";
break;
case "light pink":
$color="rosa chiaro";
break;
case "light":
$color="luce";
break;
case "light grey":
$color="grigio chiaro";
break;
case "ivory":
$color="avorio";
break;
case "black":
$color="nero";
break;
case "blue":
$color="blu";
break;
case "brown":
$color="marrone";
break;
case "dark blue":
$color="blu scuro";
break;
case "dark black":
$color="nero scuro";
break;
case "dark gray":
$color="grigio scuro";
break;
case "french grey":
$color="grigio francese";
break;
case "champagne":
$color="champagne";
break;
case "bright pink":
$color="rosa brillante";
break;
}
return $color;
}

function cutTitle($str, $len, $tail = ""){ 
	$length = strlen($str); 
	$lentail = strlen($tail); 
	$result = ""; 
	if($length > $len){ 
	$len = $len - $lentail; 
	for($i = 0;$i < $len;$i ++){ 
	if(ord($str[$i]) < 127){ 
	$result .= $str[$i]; 
	}else{ 
	$result .= $str[$i]; 
	++ $i; 
	$result .= $str[$i]; 
	} 
	} 
	$result = strlen($result) > $len ? substr($result, 0, -2) . $tail : $result . $tail; 
	}else{ 
	$result = $str; 
	} 
	return $result; 
}
function unhtml($content){
	$content=strip_tags($content);
	$content=str_replace("'","\'", $content);
	$content=str_replace("\"","\"", $content);
	return trim($content);
}
//通过购买的数量获取折扣
function getDisc($price,$num){
	if ($num>=5&&$num<10) {
		$discount=0.1*$price;
		$price=0.9*$price;
	} else if ($num>=10) {
		$discount=0.2*$price;
		$price=0.8*$price;
	} else {
		$price=$price;
	}
	$data = array("price"=>$price,"discount"=>$discount);
	return $data;
}
//截取指定内容
function limit_words($str,$words="",$limit){
	$words==""?$idx=0:$idx = stripos($str,$words);
	$newStr=substr($str,$idx,$limit);
	return $newStr;
}
?>